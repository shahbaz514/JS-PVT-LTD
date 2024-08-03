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

if (isset($_GET['id']))
{
    $sqlDel = mysqli_query($db, "DELETE FROM data_uploader WHERE id = '".$_GET['id']."'");
    if ($sqlDel)
    {
        echo "<script>window.open('allFiles.php', '_self')</script>";
    }
}

include 'inc/head.php';
?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>UPLOADED FILE APPROVALS</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                UPLOADED FILE APPROVALS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>File Name</th>
                                        <th>File Type</th>
                                        <th>Uploaded BY</th>
                                        <th>Uploaded Date</th>
                                        <th>Open File</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>File Name</th>
                                        <th>File Type</th>
                                        <th>Uploaded BY</th>
                                        <th>Uploaded Date</th>
                                        <th>Open File</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    $i = 0;
                                    $sqlUsers = mysqli_query($db, "SELECT * FROM data_uploader ORDER BY id DESC");
                                    while ($rowUser = mysqli_fetch_array($sqlUsers))
                                    {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i; ?>.
                                            </td>
                                            <td>
                                                <?php
                                                if ($rowUser['file_type'] == 'Image')
                                                {
                                                    ?>
                                                    <a target="_blank" href="upImages/<?php echo $rowUser['file_name'] ; ?>"><?php echo $rowUser['file_name'] ; ?></a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a target="_blank" href="upDoc/<?php echo $rowUser['file_name'] ; ?>"><?php echo $rowUser['file_name'] ; ?></a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $rowUser['file_type'] ; ?></td>
                                            <td><?php echo $rowUser['username'] ; ?></td>
                                            <td><?php echo $rowUser['date'] ; ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="fileView.php?id=<?php echo $rowUser['id']; ?>">
                                                    <i class="material-icons">preview</i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="allFiles.php?id=<?php echo $rowUser['id']; ?>">
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
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