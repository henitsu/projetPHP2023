<?php
    // Connexion à la base de données
    // $servname = "localhost";
    $servname = "phpmyadmin.alwaysdata.com"
    $dbname = "patientele_cb";
    $user = "etu";
    $pass = "iutinfo";
     
    try {
        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e) {
        die('Erreur de connexion à la base de données :: ' . $e->getMessage());
    }
?>