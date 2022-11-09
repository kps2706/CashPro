<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation Code</title>
</head>

<body>

    <?php

    echo '<h1>' . $_SESSION['fname'] . '</h1>';

    echo '<h2>Confirmation Code</h2>';

    echo ' <p>Thanks for your registration. Your activation Code is : </p> ' . $_SESSION['activation_code'];


    ?>
</body>

</html>