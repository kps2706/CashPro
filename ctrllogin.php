<?php

require_once('includes/connectdb.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// To off warning message
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['btn_login'])) {
    $username = $_POST['txt_username'];
    $password = $_POST['txt_userpassword'];
    // echo $username . $password;

    $select = $pdo->prepare("SELECT * FROM tbl_users WHERE username='{$username}' AND  password='{$password}' AND acct_status='1'");

    $select->execute();

    $row = $select->fetch(PDO::FETCH_ASSOC);

    if ($row['username'] == $username and $row['password'] == $password) {

        $_SESSION['userid'] = $row['username'];
        $_SESSION['username'] = ucwords($row['name']);
        $_SESSION['userrole'] = $row['userrole'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['logedin'] = 'ok';
        $_SESSION['welcomemessage'] = false;
        $_SESSION['lastlogin'] = $row['last_login'];


        date_default_timezone_set('Asia/Kolkata');

        $date = date("Y-m-d H:i:s");
        // echo $date;

        $update = $pdo->prepare("UPDATE tbl_users SET last_login='{$date}' WHERE username = '{$row['username']}'");

        $update->execute();

        $_SESSION['status'] = "valid";
    }

    //     elseif ($row['useremail'] == $useremail and $row['password'] == $password and $row['role'] == "User") {
    //         $_SESSION['userid'] = $row['userid'];
    //         $_SESSION['username'] = ucwords($row['username']);
    //         $_SESSION['useremail'] = $row['useremail'];
    //         $_SESSION['role'] = $row['role'];

    //          echo '<script type="text/javascript">
    //      jQuery(function validation() {
    //        swal({
    //          title: "Welcome ! ' . $_SESSION['username'] . '",
    //          text: "Details Matched",
    //          icon: "success",
    //          button: "Loading........",
    //        });

    //      });

    //     </script>';
    // header('location:index.php', 3);
    //      } 
    else {

        $_SESSION['status'] = "invalid";
    }
}