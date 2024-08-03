<?php
session_start();
session_abort();
include "db/db.php";
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}
if ($_SESSION['role'] == 'Data Uploader')
{
    header("Location: dataUploader.php");
}
if (isset($_GET['cat']))
{
    $sqlGetCatData = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `categories` WHERE id = '".$_GET['cat']."'"));
}
include 'inc/head.php';
?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2 class="text-uppercase">
                    <?php
                    if (isset($_GET['cat']))
                    {
                        echo $sqlGetCatData['name'];
                    }
                    else
                    {
                        echo "Admin Manager Panel";
                    }
                    ?>
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2 class="text-uppercase">
                                <?php
                                if (isset($_GET['cat']))
                                {
                                    echo $sqlGetCatData['name'];
                                }
                                else
                                {
                                    echo "Admin Manager Panel";
                                }
                                ?>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <?php
                                if (isset($_GET['cat'])){
                                    $sqlGetSubCat = mysqli_query($db,"SELECT * FROM `categories` WHERE parent_id = '".$_GET['cat']."'");
                                    while ($rowGetSubCat = mysqli_fetch_array($sqlGetSubCat)) {
                                        ?>
                                        <div class="col-sm-3">
                                            <a href="categories.php?cat=<?php echo $rowGetSubCat['id']; ?>" class="waves-button btn bg-blue form-control">
                                                <?php
                                                echo $rowGetSubCat['name'];
                                                ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <div class="col-sm-4">
                                        <a href="allFiles.php" class="waves-button btn bg-blue form-control">
                                            Uploaded File Approvals
                                        </a>
                                    </div>
                                    <?php
                                    $sqlGetCat = mysqli_query($db, "SELECT * FROM `categories` WHERE parent_id = '0'");
                                    while ($rowGetCat = mysqli_fetch_array($sqlGetCat)) {
                                        ?>
                                        <div class="col-sm-4">
                                            <a href="categories.php?cat=<?php echo $rowGetCat['id']; ?>" class="waves-button btn bg-blue form-control">
                                                <?php
                                                echo $rowGetCat['name'];
                                                ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>File Name</th>
                                        <th>Sub Main Category</th>
                                        <th>Sub Sub Category</th>
                                        <th>Date and time </th>
                                        <th>Open File</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>File Name</th>
                                        <th>Sub Main Category</th>
                                        <th>Sub Sub Category</th>
                                        <th>Date and time </th>
                                        <th>Open File</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    $i = 0;
                                    $sqlGetData = mysqli_query($db, "SELECT * FROM data_uploader");
                                    while ($rowGetData = mysqli_fetch_array($sqlGetData))
                                    {

                                        $parent_id = "";
                                        $catGetId = @$_GET['cat'];
                                        $list = @$rowGetData['cat_id'];
                                        $previous_cat = "";
                                        $sub_sub_cat = "";
                                        $tag_array = explode(',', $list );
                                        foreach ($tag_array as $x)
                                        {
                                            if ($x == $catGetId)
                                            {
                                                $parent_id = $x;
                                            }
                                            elseif ($x > $catGetId)
                                            {
                                                $sub_sub_cat = $x;
                                                break;
                                            }
                                            elseif ($x < $catGetId)
                                            {
                                                $previous_cat = $x;
                                            }
                                        }
                                        if ($parent_id == @$_GET['cat']) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>.
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($rowGetData['file_type'] == 'Image')
                                                    {
                                                        ?>
                                                        <a target="_blank" href="upImages/<?php echo $rowGetData['file_name'] ; ?>"><?php echo $rowGetData['name'] ; ?></a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a target="_blank" href="upDoc/<?php echo $rowGetData['file_name'] ; ?>"><?php echo $rowGetData['name'] ; ?></a>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($previous_cat != null) {
                                                        $main = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM categories WHERE id = '$previous_cat'"));
                                                        echo $main['name'];
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($sub_sub_cat != null) {
                                                        $sub = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM categories WHERE id = '$sub_sub_cat'"));
                                                        echo $sub['name'];
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $rowGetData['date'] ; ?></td>
                                                <td>
                                                    <a class="btn btn-warning" href="fileView.php?id=<?php echo $rowGetData['id']; ?>">
                                                        <i class="material-icons">preview</i>
                                                    </a>
                                                </td>
                                                <td><?php echo $rowGetData['status'] ; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php
include 'inc/footer.php';
?>