<?php
    // récupération du nom et prénom de la secrétaire connectée
    session_start();
    $login = $_SESSION['identifiant'];

    $pdo = new PDO("mysql:host=localhost;dbname=patientele", "etu1", "iutinfo");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT nom, prenom FROM secretaire WHERE Login = '$login'";
    $result = $pdo->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    echo $row['prenom'] . " " . $row['nom'];
?>