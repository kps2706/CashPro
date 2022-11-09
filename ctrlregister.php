<?php

require_once('includes/connectdb.php');

require_once('mail.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// To off warning message
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['btn_register'])) {
    $fname = $_POST['fname_txt'];
    $email = $_POST['email_txt'];
    $username = $_POST['username_txt'];
    $password = $_POST['password_txt'];
    $cnf_pass = $_POST['cnf_password_txt'];
    $acct_status = 0;

    // echo $username . $password;

    if ($password != $cnf_pass) {

        echo "Enter password and confirm password is not same";
    } else {

        $select_email = $pdo->prepare("SELECT * FROM tbl_users WHERE email='{$email}'");

        $select_email->execute();

        $select_username = $pdo->prepare("SELECT * FROM tbl_users WHERE username='{$username}'");

        $select_username->execute();

        if ($row = $select_email->fetch(PDO::FETCH_ASSOC)) {

            echo "User is already register";
        } elseif ($row = $select_username->fetch(PDO::FETCH_ASSOC)) {
            echo "Username is not availabel";
        } else {
            // echo "Allowed for register. All good";
            $activation_code_db = rand(100000, 999999);
            $_SESSION['act_code'] = base64_encode($activation_code_db);

            $message = "<html>

            <head>
                <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800;900&display=swap' rel='stylesheet'>
                <style>
                *{margin:0;padding:0}body{font-family:poppins}h3{padding:48px;text-align:right}.greet{margin-bottom:40px}.message,.regard{margin-bottom:32px}#testimonials{text-align:left;padding:48px;border:solid #9e9e9e;margin:32px;box-shadow:5px 10px #0000ff1c}.logo{font-size:32px;padding-bottom:0;box-shadow:5px 10px;color:#00f}
                </style>
            
            </head>
            
            <body>
            
                <h3 class='logo'>CASHPRO</h3>
            
                <section id='testimonials'>
                    <h4 class='greet'>Dear " . $fname .   "</h4>
            
                    <p class='message'>Thanks for your registration.</p>
            
                    <p class='message'><strong>" . $_SESSION['act_code'] . "</strong> is the OTP for your Cash Pro :: Financial System Management. Please
                        do not share this OTP with anyone for security reasons.</p>
            
                    <div class='message'>
            
                        <p class='message'>Please click on below link to active your account.</p>
            
                        <a href='http://192.168.1.6/cashpro/activationpage.php?activation_code=" . $_SESSION['act_code'] . "&email=" . base64_encode($email) . "&username=" . base64_encode($username) . "&status=" . base64_encode(0) . "'>http://localhost/cashpro/activationpage.php?activation_code=" . $_SESSION['act_code'] . "&email=" . base64_encode($email) . "&username=" . base64_encode($username) . "&status=" . base64_encode(0) . "</a>
            
                    </div>
            
            
                    <h4 class='regard'>Warms Regards,</h4>
            
                    <h4 class='regard_l'>Cash Pro Team</h4>
            
                    </h1>
            
                </section>
            </body>
            
            </html>";

            // Preparing message file for mail

            $file = fopen("msg.txt", "w+");

            fwrite($file, $message);

            fclose($file);


            // Preparing mail to send user for activation

            require_once('mail.php');

            // calling mail funtion
            send_email($email, 'Welcome onboard : CASH PRO');


            // echo $activation_code_db;

            // echo "INSERT INTO tbl_users (username, password, name, userrole, email,activation_code, acct_status) VALUES('{$username}','{$password}','{$fname}','User','{$email}','{$activation_code_db}','{$acct_status}')" . '<br>';



            $reg_user = $pdo->prepare("INSERT INTO tbl_users (username, password, name, userrole, email,activation_code, acct_status) VALUES('{$username}','{$password}','{$fname}','User','{$email}','{$activation_code_db}','{$acct_status}')");


            if ($reg_user->execute()) {
                echo "User Registered, Please login";

                header('location:login.php');
            } else {
                echo "Error occurred";
            }
        }
    }
}