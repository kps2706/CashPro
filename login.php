<?php

require_once('ctrllogin.php');

// To off warning message
error_reporting(E_ERROR | E_PARSE);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>C-PRO | Log in</title>

    <?php require_once('includes/style.php'); ?>

</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="100" width="100">
        </div>

        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>CASH</b>PRO</a>

            </div>

            <div class="card-body">
                <p class="login-box-msg">Sign in to access Personal Finance Management System</p>

                <form id="login_form" action="" method="post">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="txt_username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="txt_userpassword">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php

                    if (session_status() == PHP_SESSION_ACTIVE) {

                        if ($_SESSION['status'] == "valid") {


                            header('location:index.php', 3);

                            // unset($_SESSION['errormsg']);
                        } elseif ($_SESSION['status'] == "invalid") {
                        }
                    }

                    ?>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    </div>
    <!-- /.login-box -->

    <?php require_once('includes/script.php'); ?>


</body>



</html>