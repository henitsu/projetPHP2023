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
    <h1>Affichage des médecins</h1>
    <?php
    // Connexion à la base de données
    require 'connexionBD.php';

    $reponse = $bdd->query("SELECT * FROM medecin");
    $donnees = $reponse->fetchAll();
    echo '<h2>Les médecins :</h2>';
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Civilité</th></tr>';

    foreach ($donnees as $donnee) {
        // Affiche les résultats
        
        echo '<tr>';
        echo '<td>' . $donnee['Id_Medecin'] . '</td>';
        echo '<td>' . $donnee['Nom'] . '</td>';
        echo '<td>' . $donnee['Prenom'] . '</td>';
        echo '<td>' . $donnee['Civilite'] . '</td>';
        echo '<td><a href="modifierMedecin.php?Id_Medecin=' . $donnee['Id_Medecin'] . '&nom=' . $donnee['Nom'] . '&prenom=' . $donnee['Prenom'] 
        . '&civilite=' . $donnee['Civilite'] . '">Modifier</a> | 
        <a href="supprimerMedecin.php?id=' . $donnee['Id_Medecin'] . '&nom=' . $donnee['Nom'] . '&prenom=' . $donnee['Prenom'] 
        . '&civilite=' . $donnee['Civilite'] . '">Supprimer</a></td>';
        echo '</tr>';
        
    }
    ?>
</body>