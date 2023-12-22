<?php
    session_start();
    $login = $_SESSION['identifiant'];
    $password = $_SESSION['password'];

    $pdo = new PDO("mysql:host=localhost;dbname=patientele", "etu1", "iutinfo");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT nom, prenom FROM secretaire WHERE login = :Login";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    $secretaire = $stmt->fetch(PDO::FETCH_ASSOC);
    $nom = $secretaire['Nom'];
    $prenom = $secretaire['Prenom'];
?>