<?php

require_once('pages/resourses/title_page.php');


?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>C-PRO | <?php echo isset($page_title) ? $page_title : 'Home'; ?></title>
    <!-- Style Sheet -->
    <?php require_once('includes/style.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">

        <!-- Top Navbar -->

        <?php require_once('includes/top-nav.php'); ?>

        <!-- Main Sidebar Container -->

        <?php require_once('includes/sidebar.php'); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php

            if ($_SESSION['logedin'] == 'ok') {

                if (!empty($_GET['route'])) {
                    // echo $_GET['route'] . '.php';

                    if (is_readable('pages/' . $_GET['route'] . '.php')) {
                        // echo 'read';
                        require_once($_GET['route'] . '.php');
                    } elseif (is_readable($_GET['route'] . '.php')) {
                        require_once($_GET['route'] . '.php');
                    } else {
                        require_once('404.php');
                    }
                } else {
                    require_once('dashBoard.php');
                }
            } else {
                require_once('login.php');
            } ?>

        </div>


        <!-- Main Footer -->
        <?php require_once('includes/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php require_once('includes/script.php'); ?>
</body>

</html>