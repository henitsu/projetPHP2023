<?php
    session_start();
    $login = $_SESSION['identifiant'];
    $password = $_SESSION['password'];

    $pdo = new PDO("mysql:host=localhost;dbname=patientele", "etu1", "iutinfo");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>