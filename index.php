<?php

// require_once('mail.php');

// highlight Include filesystem.

// require_once('pages/templete.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['logedin']) and $_SESSION['logedin'] == 'ok') {
    require_once('pages/templete.php');
    // echo "login";
} else {
    require_once('login.php');
    //require_once('nliLanding.php');
    // require_once('Hotel.php');
    // echo $_SESSION['logedin'] . '<br>';
    // echo "login out";
}

// calling email
// send_email('fintech2706@gmail.com', 'PSB UnIC Biz- Corporate Registration Kit');