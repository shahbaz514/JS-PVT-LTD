<?php
session_start();
session_abort();
include "db/db.php";
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}
if ($_SESSION['role'] != 'Data Uploader')
{
    header("Location: index.php");
}
include 'inc/head.php';

if (isset($_GET['id']))
{
    $sqlDel = mysqli_query($db, "DELETE FROM data_uploader WHERE id = '".$_GET['id']."'");
    if ($sqlDel)
    {
        echo "<script>window.open('dataUploader.php', '_self')</script>";
    }
}
?>
    <section style="margin-top: 100px;">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DATA UPLOADER</h2>
            </div>
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                DATA UPLOADER FOR IMAGES
                            </h2>
                        </div>
                        <div class="body">
                            <form action="dataUploader.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <input type="file" name="img" title="Select Image fILE" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <center>
                                            <input type="submit" name="uploadImg" value="Upload Image File" class="btn btn-warning">
                                        </center>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['uploadImg']))
                            {
                                $temp = explode(".", $_FILES["img"]["name"]);
                                $newfilename = $_SESSION['username'] . '.' . rand() . '.' . end($temp);
                                $sqlU = mysqli_query($db, "INSERT INTO `data_uploader`(`username`, `file_name`, `file_type`) VALUES ('".$_SESSION['username']."','$newfilename','Image')");
                                if ($sqlU)
                                {

                                    $move = move_uploaded_file($_FILES["img"]["tmp_name"], "upImages/" . $newfilename);
                                    if ($move)
                                    {
                                        echo "<script>window.open('dataUploader.php', '_self')</script>";
                                    }

                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                DATA UPLOADER FOR DOCUMENTS
                            </h2>
                        </div>
                        <div class="body">
                            <form action="dataUploader.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <input type="file" name="doc" title="Select Doc fILE" class="form-control" accept="application/pdf">
                                    </div>
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <center>
                                            <input type="submit" name="uploadDoc" value="Upload Doc File" class="btn btn-warning">
                                        </center>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['uploadDoc']))
                            {
                                $temp = explode(".", $_FILES["doc"]["name"]);
                                $newfilename = $_SESSION['username'] . '.' . rand() . '.' . end($temp);
                                $sqlU = mysqli_query($db, "INSERT INTO `data_uploader`(`username`, `file_name`, `file_type`) VALUES ('".$_SESSION['username']."','$newfilename','Document')");
                                if ($sqlU)
                                {

                                    $move = move_uploaded_file($_FILES["doc"]["tmp_name"], "upDoc/" . $newfilename);
                                    if ($move)
                                    {
                                        echo "<script>window.open('dataUploader.php', '_self')</script>";
                                    }

                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-top: 20px;">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                UPLOADED DATA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>File Name</th>
                                        <th>File Type</th>
                                        <th>Uploaded BY</th>
                                        <th>Uploaded Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>File Name</th>
                                        <th>File Type</th>
                                        <th>Uploaded BY</th>
                                        <th>Uploaded Date</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                    $sqlUsers = mysqli_query($db, "SELECT * FROM data_uploader WHERE username = '".$_SESSION['username']."' ORDER BY id DESC");
                                    while ($rowUser = mysqli_fetch_array($sqlUsers))
                                    {
                                        ?>
                                        <tr>
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
                                                <a class="btn btn-info" href="dataUploader.php?id=<?php echo $rowUser['id']; ?>">
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