<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion d'un cabinet médical</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/affichage.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Affichage des patients</h1>
    <?php
   
    $servname = "localhost";
    $dbname = "patientele";
    $user = "etu1";
    $pass = "iutinfo";
    
    try {
        $bdd = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    }
    catch (Exception $e) {
        die('Erreur de connexion à la base de données :: ' . $e->getMessage());
    }    
    

    $reponse = $bdd->query("SELECT * FROM usager");
    $donnees = $reponse->fetchAll();
    echo '<h2>La patientèle :</h2>';
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Date naissance</th><th>Lieu naissance</th><th>Numéro sécurité sociale</th></tr>';

    foreach ($donnees as $donnee) {
        // Affiche les résultats
        
        echo '<tr>';
        echo '<td>' . $donnee['idusager'] . '</td>';
        echo '<td>' . $donnee['Nom'] . '</td>';
        echo '<td>' . $donnee['Prenom'] . '</td>';
        echo '<td>' . $donnee['Adresse'] . '</td>';
        echo '<td>' . $donnee['DateNaissance'] . '</td>';
        echo '<td>' . $donnee['LieuNaissance'] . '</td>';
        echo '<td>' . $donnee['NumSecu'] . '</td>';
        echo '<td><a href="modifierPatient.php?id=' . $donnee['idusager'] . '&nom=' . $donnee['Nom'] . '&prenom=' . $donnee['Prenom'] 
        . '&adresse=' . $donnee['Adresse'] . '&dateNaissance=' . $donnee['DateNaissance'] . '&lieuNaissance=' . $donnee['LieuNaissance'] 
        . '&numSecu=' . $donnee['NumSecu'] . '">Modifier</a> | 
        <a href="supprimerPatient.php?id=' . $donnee['idusager'] . '&nom=' . $donnee['Nom'] . '&prenom=' . $donnee['Prenom'] 
        . '&adresse=' . $donnee['Adresse'] . '&dateNaissance=' . $donnee['DateNaissance'] . '&lieuNaissance=' . $donnee['LieuNaissance'] 
        . '&numSecu=' . $donnee['NumSecu'] . '">Supprimer</a></td>';
        echo '</tr>';
        
    }
    ?>
</body>