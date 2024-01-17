<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion d'un cabinet médical</title>
    <link rel="shortcut icon" href="/projetPHP2023/Donnees/patientele_icon.ico" />
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/affichage.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Affichage des consultations</h1>
    <div class="creer">
        Ajouter une nouvelle consultation : <strong><a href="/projetPHP2023/PHP/creationRDV.php">Ajouter</a></strong>
    </div>
    <?php

    require 'connexionBD.php';

    // Vérifier s'il y a un message dans la variable de session
    if(isset($_SESSION['message'])){
        echo '<p>' . $_SESSION['message'] . '</p>';
        // Supprimer le message de la variable de session pour éviter qu'il ne soit affiché à chaque chargement de la page
        unset($_SESSION['message']);
    }

    $reponseTri = $bdd->query("SELECT DISTINCT Nom FROM Medecin");
    $medecins = $reponseTri->fetchAll();
    echo '<form action="affichageRDV.php" method="post">';
    echo '<label for="medecin">Trier par médecin : </label>';
    echo '<select name="medecin" id="medecin">';
    echo '<option value="tous">Tous</option>';
    foreach ($medecins as $medecin) {
        echo '<option value="' . $medecin['Nom'] . '">' . $medecin['Nom'] . '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="Trier">';
    echo '</form>';

    $donnees = array();
    if (isset($_POST['medecin'])) {
        if ($_POST['medecin'] != 'tous') {
            $reponse = $bdd->query(
                "SELECT DISTINCT Usager.nom nom_usager, Medecin.nom nom_medecin, RDV.DateHeureRDV, RDV.DureeConsultationMinutes
                FROM RDV, Usager, Medecin
                WHERE RDV.idusager = Usager.idusager AND Medecin.Id_Medecin = RDV.Id_Medecin AND Medecin.Nom = '" . $_POST['medecin'] . "'
                ORDER BY 2, 3");
            $donnees = $reponse->fetchAll();
        }
        else {
            $reponse = $bdd->query(
                "SELECT DISTINCT Usager.nom nom_usager, Medecin.nom nom_medecin, RDV.DateHeureRDV, RDV.DureeConsultationMinutes
                FROM RDV, Usager, Medecin
                WHERE RDV.idusager = Usager.idusager AND Medecin.Id_Medecin = RDV.Id_Medecin");
            $donnees = $reponse->fetchAll();
        }
    } 
    else {
        $reponse = $bdd->query(
            "SELECT DISTINCT Usager.nom nom_usager, Medecin.nom nom_medecin, RDV.DateHeureRDV, RDV.DureeConsultationMinutes
            FROM RDV, Usager, Medecin
            WHERE RDV.idusager = Usager.idusager AND Medecin.Id_Medecin = RDV.Id_Medecin");
        $donnees = $reponse->fetchAll();
    }
    
    
    echo '<table border="1">';
    echo '<tr><th>Nom médecin</th><th>Nom patient</th><th>Date/heure</th><th>Durée (en minutes)</th><th>Action</th></tr>';

    foreach ($donnees as $donnee) {
        // Affiche les résultats
        
        echo '<tr>';
        echo '<td>' . $donnee['nom_medecin'] . '</td>';
        echo '<td>' . $donnee['nom_usager'] . '</td>';
        echo '<td>' . date('d/m/Y - H:i', strtotime($donnee['DateHeureRDV'])) . '</td>';
        echo '<td>' . $donnee['DureeConsultationMinutes'] . '</td>';
        echo '<td><a href="modifierRDV.php?nom_usager=' . $donnee['nom_usager'] . '&nom_medecin=' . $donnee['nom_medecin'] . '&dateHeure=' . $donnee['DateHeureRDV'] 
        . '&duree=' . $donnee['DureeConsultationMinutes'] . '">Modifier</a> | 
        <a href="supprimerRDV.php?nom_usager=' . $donnee['nom_usager'] . '&nom_medecin=' . $donnee['nom_medecin'] . '&dateHeure=' . $donnee['DateHeureRDV'] 
        . '&duree=' . $donnee['DureeConsultationMinutes'] . '">Supprimer</a></td>';
        echo '</tr>';
        
    }
    ?>
</body>
