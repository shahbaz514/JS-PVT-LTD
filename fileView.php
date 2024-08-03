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

if (!isset($_GET['id']))
{
    header("Location: allFiles.php");
}
else
{
    $sqlGetData = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM data_uploader WHERE id = ".$_GET['id'].""));
}

include 'inc/head.php';
?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo $sqlGetData['name']; ?> | Approval Page
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                <?php echo $sqlGetData['name']; ?> | Approval Page
                            </h2>
                        </div>
                        <div class="body">
                            <?php
                            if ($sqlGetData['file_type'] == 'Image')
                            {
                                ?>
                                <a href="upImages/<?php echo $sqlGetData['file_name'] ; ?>">
                                    <img class="img-rounded img-responsive" src="upImages/<?php echo $sqlGetData['file_name'] ; ?>" alt="<?php echo $sqlGetData['file_name'] ; ?>">
                                </a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a href="upDoc/<?php echo $sqlGetData['file_name'] ; ?>">
                                    <iframe src="upDoc/<?php echo $sqlGetData['file_name'] ; ?>" style="width: 100%; height: 450px;"></iframe>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control" placeholder="ENTER FILE NAME">
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Select Status--</option>
                                            <option>Submitted</option>
                                            <option>Review</option>
                                            <option>Objection</option>
                                            <option>Resubmission</option>
                                            <option>Approved</option>
                                            <option>Rejected</option>
                                            <option>Read Only</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-8">
                                        <?php
                                        echo showcategory(0);
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <center>
                                            <button type="submit" name="approve_file" value="Approve" class="btn btn-warning">
                                                Approve
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                            <?php
                            function showcategory($parentid)
                            {
                                $sql = "select * from categories where parent_id='".$parentid."'";
                                $result = mysqli_query($GLOBALS['db'],$sql);
                                $output ="<ul>\n";

                                while($data=mysqli_fetch_array($result))
                                {
                                    $output.="<input name='categories[]' type='checkbox' value='".$data['id']."' id='md_checkbox_".$data['id']."' class='filled-in chk-col-red' ><label for='md_checkbox_".$data['id']."'>".$data['name']."</label>\n";
                                    $output.=showcategory($data['id']);
                                }
                                $output.="</ul>";
                                return $output;
                            }

                            if (isset($_POST['approve_file']))
                            {
                                $name = mysqli_real_escape_string($db, $_POST['name']);
                                $cat_id = implode(',', $_POST['categories']);
                                $status = mysqli_real_escape_string($db, $_POST['status']);

                                $sqlUp = mysqli_query($db,"UPDATE `data_uploader` SET `name`='$name',`cat_id`='$cat_id',`status`='$status' WHERE id = ".$_GET['id']."");
                                if ($sqlUp)
                                {
                                    echo "<script>window.open('allFiles.php', '_self')</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

<?php
include 'inc/footer.php';
?>