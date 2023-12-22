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
    

    $reponse = $bdd->query("SELECT DISTINCT Usager.Nom idusager, Medecin.Nom Id_Medecin, RDV.DateHeureRDV, RDV.DureeConsultationMinutes FROM
     RDV, Usager, Medecin WHERE RDV.idusager = Usager.idusager AND Medecin.Id_Medecin = RDV.Id_Medecin");
    $donnees = $reponse->fetchAll();
    echo '<h2>Les consultations :</h2>';
    echo '<table border="1">';
    echo '<tr><th>ID Médecin (plutôt le nom ?)</th><th>ID Usager (idem : nom ?)</th><th>Date/heure</th><th>Durée (en minutes)</th></tr>';

    foreach ($donnees as $donnee) {
        // Affiche les résultats
        
        echo '<tr>';
        echo '<td>' . $donnee['idusager'] . '</td>';
        echo '<td>' . $donnee['Id_Medecin'] . '</td>';
        echo '<td>' . $donnee['DateHeureRDV'] . '</td>';
        echo '<td>' . $donnee['DureeConsultationMinutes'] . '</td>';
        echo '<td><a href="modifierRDV.php?idusager=' . $donnee['idusager'] . '&Id_Medecin=' . $donnee['Id_Medecin'] . '&dateHeure=' . $donnee['DateHeureRDV'] 
        . '&duree=' . $donnee['DureeConsultationMinutes'] . '">Modifier</a> | 
        <a href="supprimerRDV.php?idusager=' . $donnee['idusager'] . '&Id_Medecin=' . $donnee['Id_Medecin'] . '&dateHeure=' . $donnee['DateHeureRDV'] 
        . '&duree=' . $donnee['DureeConsultationMinutes'] . '">Supprimer</a></td>';
        echo '</tr>';
        
    }
    ?>
</body>