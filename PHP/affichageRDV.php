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
    <h1>Affichage des consultations</h1>
    <div class="creer">
        Ajouter une nouvelle consultation : <a href="/projetPHP2023/PHP/creationRDV.php">Ajouter</a>
    </div>
    <?php

    require 'connexionBD.php';

    $reponse = $bdd->query(
        "SELECT DISTINCT Usager.idusager idusager, Usager.Nom nom_usager, Medecin.Id_Medecin Id_Medecin, Medecin.Nom nom_medecin, RDV.DateHeureRDV, RDV.DureeConsultationMinutes
        FROM RDV, Usager, Medecin
        WHERE RDV.idusager = Usager.idusager AND Medecin.Id_Medecin = RDV.Id_Medecin");
    $donnees = $reponse->fetchAll();
    echo '<h2>Les consultations :</h2>';
    echo '<table border="1">';
    echo '<tr><th>Nom médecin</th><th>Nom patient</th><th>Date/heure</th><th>Durée (en minutes)</th></tr>';

    foreach ($donnees as $donnee) {
        // Affiche les résultats
        
        echo '<tr>';
        echo '<td>' . $donnee['nom_medecin'] . '</td>';
        echo '<td>' . $donnee['nom_usager'] . '</td>';
        echo '<td>' . $donnee['DateHeureRDV'] . '</td>';
        echo '<td>' . $donnee['DureeConsultationMinutes'] . '</td>';
        echo '<td><a href="modifierRDV.php?nom_usager=' . $donnee['nom_usager'] . '&nom_medecin=' . $donnee['nom_medecin'] . '&dateHeure=' . $donnee['DateHeureRDV'] 
        . '&duree=' . $donnee['DureeConsultationMinutes'] . '">Modifier</a> | 
        <a href="supprimerRDV.php?nom_usager=' . $donnee['nom_usager'] . '&nom_medecin=' . $donnee['nom_medecin'] . '&dateHeure=' . $donnee['DateHeureRDV'] 
        . '&duree=' . $donnee['DureeConsultationMinutes'] . '">Supprimer</a></td>';
        echo '</tr>';
        
    }
    ?>
</body>