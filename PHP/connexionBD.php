<?php
    // Connexion à la base de données
    $servname = "localhost";
    $dbname = "patientele";
    $user = "etu1";
    $pass = "iutinfo";
     
    try {
        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e) {
        die('Erreur de connexion à la base de données :: ' . $e->getMessage());
    }
?>