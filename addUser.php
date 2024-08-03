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
elseif ($_SESSION['role'] == 'Admin Manager')
{
    header("Location: index.php");
}
include 'inc/head.php';

?>
    <section>
        <?php include 'inc/sidebar.php'; ?>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ADD NEW USER</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                ADD NEW USER
                            </h2>
                        </div>
                        <div class="body">

                            <form action="addUser.php" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" placeholder="User Name" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6" style="margin-top: 20px;">
                                        <select name="role" id="" class="form-control" required>
                                            <option value="">--Select Role--</option>
                                            <option>Admin</option>
                                            <option>Data Uploader</option>
                                            <option>Admin Manager</option>
                                            <option>Director</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" name="addUser" value="Add New User" class="btn bg-blue waves-button btn-block">
                                    </div>
                                </div>
                            </form>


                            <?php
                            if (isset($_POST['addUser']))
                            {
                                $name = mysqli_real_escape_string($db, $_POST['name']);
                                $username = mysqli_real_escape_string($db, $_POST['username']);
                                $password = mysqli_real_escape_string($db, $_POST['password']);
                                $email = mysqli_real_escape_string($db, $_POST['email']);
                                $role = mysqli_real_escape_string($db, $_POST['role']);
                                $sqlSelectU = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
                                $count = mysqli_num_rows($sqlSelectU);
                                if ($count == 0) {
                                    $sqlAddUser = mysqli_query($db, "INSERT INTO `users`(`name`, `email`, `username`, `password`, `role`, `status`) 
                                                                    VALUES ('$name', '$email', '$username', '$password', '$role','Active')");
                                    if ($sqlAddUser) {
                                        echo "<script>window.open('allUsers.php', '_self')</script>";
                                    } else {
                                        echo "<script>alert('Take An Error! Try Again.')</script>";
                                        echo "<script>window.open('allUsers.php', '_self')</script>";
                                    }
                                }
                                else
                                {
                                    echo "<script>alert('Username Already Exit! Try Another One.')</script>";
                                    echo "<script>window.open('allUsers.php', '_self')</script>";
                                }
                            }
                            ?>

                            <style>
                                input{
                                    margin-top: 20px;
                                }
                                select{
                                    margin-top: 20px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php
include 'inc/footer.php';
?>