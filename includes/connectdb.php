<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cashProDB', 'root', '');

    // echo "connection successful";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch (PDOException $e) {
    echo $e->getMessage();
}