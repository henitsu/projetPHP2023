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
    <h1>Statistiques</h1>
    <?php

        require 'connexionBD.php';

        $reponseFemmesMoins25 = $bdd->query("SELECT COUNT(*) NbFemmes FROM Usager WHERE civilite = 'Mme' AND DATEDIFF(NOW(), dateNaissance) < 9125");
        $nbFemmesMoins25 = $reponseFemmesMoins25->fetchAll();

        $reponseFemmesMilieu = $bdd->query("SELECT COUNT(*) NbFemmes FROM Usager WHERE civilite = 'Mme' AND DATEDIFF(NOW(), dateNaissance) BETWEEN 9125 AND 14600");
        $nbFemmesMilieu = $reponseFemmesMilieu->fetchAll();

        $reponseFemmesPlus50 = $bdd->query("SELECT COUNT(*) NbFemmes FROM Usager WHERE civilite = 'Mme' AND DATEDIFF(NOW(), dateNaissance) > 14600");
        $nbFemmesPlus50 = $reponseFemmesPlus50->fetchAll();

        $reponseHommesMoins25 = $bdd->query("SELECT COUNT(*) AS NbHommes FROM Usager WHERE Usager.Civilite = 'M' AND DATEDIFF(NOW(), dateNaissance) < 9125");
        $nbHommesMoins25 = $reponseHommesMoins25->fetchAll();

        $reponseHommesMilieu = $bdd->query("SELECT COUNT(*) NbHommes FROM Usager WHERE civilite = 'Mme' AND DATEDIFF(NOW(), dateNaissance) BETWEEN 9125 AND 14600");
        $nbHommesMilieu = $reponseHommesMilieu->fetchAll();

        $reponseHommesPlus50 = $bdd->query("SELECT COUNT(*) NbHommes FROM Usager WHERE civilite = 'Mme' AND DATEDIFF(NOW(), dateNaissance) > 14600");
        $nbHommesPlus50 = $reponseHommesPlus50->fetchAll();
        
        echo 
        "
        <table>
            <tr>
                <td>
                    Tranche d'âge
                </td>
                <td>
                    Nombre de femmes
                </td>
                <td>
                    Nombre d'hommes
                </td>
            </tr>
            <tr>
                <td>
                    Moins de 25 ans
                </td>
                <td>
                    ". $nbFemmesMoins25[0]['NbFemmes'] . "
                </td>
                <td>
                    ". $nbHommesMoins25[0]['NbHommes'] . "
                </td>
            </tr>
            <tr>
                <td>
                    Entre 25 ans et 50 ans
                </td>
                <td>
                    ". $nbFemmesMilieu[0]['NbFemmes'] . "
                </td>
                <td>
                    ". $nbHommesMilieu[0]['NbHommes'] . "
                </td>
            </tr>
            <tr>
                <td>
                    Plus de 50 ans
                </td>
                <td>
                    ". $nbFemmesPlus50[0]['NbFemmes'] . "
                </td>
                <td>
                    ". $nbHommesPlus50[0]['NbHommes'] . "
                </td>
            </tr>
        </table><br><br>";

        $reponseNbHeuresParMedecin = $bdd->query("SELECT SUM(DureeConsultationMinutes)/60, Medecin.Nom FROM RDV, Medecin WHERE Medecin.Id_Medecin = RDV.Id_Medecin GROUP BY RDV.Id_Medecin");
        $NbHeuresConsultation = $reponseNbHeuresParMedecin->fetchAll();
        foreach($NbHeuresConsultation as $NbHeures){
            echo "Le médecin " . $NbHeures[1] . " a réalisé " . round($NbHeures[0],2) . " heures de consultation <br>";
        }

    ?>
</body>