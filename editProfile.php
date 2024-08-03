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
                <h2>EDIT PROFILE</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>EDIT PROFILE</h2>
                        </div>
                        <div class="body">
                            <form action="editProfile.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <input type="file" name="img" title="Select Profile Image" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-sm-6" style="padding: 20px;">
                                        <center>
                                            <input type="submit" name="editUser" value="Edit Profile" class="btn btn-warning">
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
if (isset($_POST['editUser']))
{
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $temp = explode(".", $_FILES["img"]["name"]);
    $newfilename = $_SESSION['username'] . '.' . rand() . '.' . end($temp);

    if (empty($_FILES["img"]["name"]))
    {
        $sqlU = mysqli_query($db, "UPDATE users SET password = '$password' WHERE username = '".$_SESSION['username']."'");
        if ($sqlU)
        {
            echo "<script>window.open('profile.php', '_self')</script>";
        }
    }
    else
    {
        $sqlU = mysqli_query($db, "UPDATE users SET password = '$password', img = '$newfilename' WHERE username = '".$_SESSION['username']."'");
        if ($sqlU)
        {

            $move = move_uploaded_file($_FILES["img"]["tmp_name"], "images/" . $newfilename);
            if ($move)
            {
                echo "<script>window.open('profile.php', '_self')</script>";
            }

        }
    }
}
?>
<?php
include 'inc/footer.php';
?>