<!DOCTYPE html>
<html>
    <head>
        <title>Suppression d'un RDV</title>
		<link rel="shortcut icon" href="/projetPHP2023/Donnees/patientele_icon.ico" />
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Supprimer un RDV</h1>
		<?php
			// Connexion à la base de données
			require 'connexionBD.php';
			
			try {
				// Stockage de l'identifiant de l'usager
				$idusager = $_GET['idusager'];	
                $Id_Medecin = $_GET['Id_Medecin'];
                $dateHeureRDV = $_GET['dateHeure'];		
				
				// Utilisation de la clause WHERE avec une requête préparée
				// Suppression RDV
				$suppressionRDV = "DELETE FROM RDV WHERE idusager = :idusager AND Id_Medecin = :Id_Medecin AND
                dateHeureRDV = :DateHeureRDV";
				
				// Préparation des requêtes
				$stmt = $bdd->prepare($suppressionRDV);
				
				// Liaison des paramètres requête suppression RDV
				$stmt->bindParam(':idusager', $idusager, PDO::PARAM_STR);
                $stmt->bindParam(':Id_Medecin', $Id_Medecin, PDO::PARAM_STR);
                $stmt->bindParam(':DateHeureRDV', $dateHeureRDV, PDO::PARAM_STR);

				// Exécution des requêtes
				$stmt->execute();
				
				echo "RDV du " . $dateHeureRDV . " supprimé avec succès";
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>