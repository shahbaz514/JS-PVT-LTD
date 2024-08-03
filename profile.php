<?php
session_start();
session_abort();
include "db/db.php";
if (!isset($_SESSION['username']))
{
    header("Location: login.php");
}
include 'inc/head.php';

if ($_SESSION['role'] == 'Data Uploader')
{
    header("Location: dataUploader.php");
}
$sqlProf = mysqli_query($db, "SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$rowProf = mysqli_fetch_array($sqlProf);

?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PROFILE</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>PROFILE</h2>
                        </div>
                        <div class="body">
                            <center>

                                <?php
                                if ($rowProf['img'] == "")
                                {
                                    ?>
                                    <img src="images/user-lg.jpg" class="img-circle elevation-2" alt="<?php echo $rowProf['name']; ?>">
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <img style="width: 200px;" src="images/<?php echo $rowProf['img']; ?>" class="img-circle elevation-2" alt="<?php echo $rowProf['name']; ?>">
                                    <?php
                                }
                                ?>
                                <hr>
                                <h3>
                                    <b>
                                        <?php echo $rowProf['name']; ?>
                                    </b>
                                </h3>
                                <hr>
                            </center>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th>
                                            Username
                                        </th>
                                        <td>
                                            <?php echo $rowProf['username']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Email
                                        </th>
                                        <td>
                                            <?php echo $rowProf['email']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Role
                                        </th>
                                        <td>
                                            <?php echo $rowProf['role']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Profile Creation Date
                                        </th>
                                        <td>
                                            <?php echo $rowProf['date']; ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <center>
                                <a style="margin: 10px;" href="editProfile.php" class="btn bg-blue waves-button">
                                    <i class="material-icons">edit</i>
                                </a>
                            </center>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
include 'inc/footer.php';
?>