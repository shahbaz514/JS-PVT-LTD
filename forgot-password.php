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
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Jazeez Synergy | Log in</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page bg-white">
<div class="login-box">
    <div class="card">
        <div class="logo header bg-blue">
            MC Carrier On-boarding
        </div>
        <div class="body">
            <form action="forgot-password.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 p-t-5">

                    </div>
                    <div class="col-xs-6">
                        <button class="btn btn-block bg-pink waves-effect"
                                name="forgetPassword" type="submit">Forget Password</button>
                    </div>
                </div>

                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">

                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="login.php">Login Now</a>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['forgetPassword']))
            {
                $pass = rand();
                $sqlUp = mysqli_query($db, "UPDATE users SET password = '$pass' WHERE email = '".$_POST['email']."'");
                if ($sqlUp)
                {
                    $msg = "Your New Password is " . $pass;
                    mail($_POST['email'], "New Password For ADC MBL Portal", $msg);
                }

            }
            ?>
        </div>
    </div>
</div>
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