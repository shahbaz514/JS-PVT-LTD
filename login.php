<?php
session_start();
session_abort();
include "db/db.php";
if (isset($_SESSION['username']))
{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>JS Pvt LTD | Admin Panel</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet">

    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="login-page bg-white">
    <div class="login-box">
        <div class="card">
            <div class="logo header bg-blue">
                JS Pvt LTD <span style="font-weight: bold;">Admin Panel</span>
            </div>
            <div class="body">
                <form id="sign_in" action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" name="login" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">

                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['login']))
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 'Active'");
    $row = mysqli_fetch_array($sql);
    $count = mysqli_num_rows($sql);

    if ($count > 0)
    {
        @session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        if ($_SESSION['role'] == "Data Uploader")
        {
            header("Location: dataUploader.php");
        }
        elseif ($_SESSION['role'] == 'Admin Manager')
        {
            header("Location: categories.php");
        }
        else
        {
            header("Location: index.php");
        }
    }
}
?>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>