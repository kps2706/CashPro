<?php

require_once('includes/connectdb.php');

$username = base64_decode($_GET['username']);
$email = base64_decode($_GET['email']);
$act_code = base64_decode($_GET['activation_code']);
$acc_status = 1;

// echo $username . '<br>' . $email . '<br>' . $acc_status . '<br>' . $act_code;
// echo 'Your activation code is ' .  . '<br>';
// echo 'Your email is ' .  . ' and username is ' .  . '<br>';
// echo 'Your account status is ' . base64_decode($_GET['status']);

$select_user = $pdo->prepare("SELECT * FROM tbl_users WHERE email='{$email}' AND username='{$username}' AND activation_code='{$act_code}'");

$select_user->execute();

if ($row = $select_user->fetch(PDO::FETCH_ASSOC)) {

    $update_user = $pdo->prepare("UPDATE tbl_users SET acct_status='{$acc_status}' WHERE email='{$email}' AND username='{$username}' AND activation_code='{$act_code}'");

    if ($update_user->execute()) {
        header('location:login.php');
    }
} else {
    echo "Link expire. Please try again.";
}