<!DOCTYPE html>
<html>
    <head>
        <title>Suppression d'un médecin</title>
		<link rel="shortcut icon" href="/Donnees/patientele_icon.ico" />
		<link rel="stylesheet" href="/CSS/base.css">
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Supprimer un médecin
        </h1>
		<?php
			// Connexion à la base de données
			require 'connexionBD.php';
			
			try {
				// Stockage de l'identifiant du médecin
				$id = $_GET['Id_Medecin'];	
				$nom = $_GET['nom'];
				$prenom = $_GET['prenom'];		
				
				// Utilisation de la clause WHERE avec une requête préparée

				// Suppression usager ????
				$suppressionUsager = "UPDATE usager SET Id_Medecin = null WHERE Id_Medecin = :Id_Medecin";

				// Suppression medecin
				$suppressionMedecin = "DELETE FROM medecin WHERE Id_Medecin = :Id_Medecin";
				
				// Suppression RDV
				$suppressionRDV = "DELETE FROM rdv WHERE Id_Medecin = :Id_Medecin";
				
				// Préparation des requêtes
				$stmtUsager = $bdd->prepare($suppressionUsager);
				$stmtRDV = $bdd->prepare($suppressionRDV);
				$stmtMedecin = $bdd->prepare($suppressionMedecin);
				
				// Liaison des paramètres requête suppression RDV
				$stmtRDV->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);

				// idem pour le medecin
				$stmtMedecin->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);

                // idem pour le medecin
				$stmtUsager->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);

				// Exécution des requêtes
				
                $stmtUsager->execute();
				$stmtRDV->execute();
				$stmtMedecin->execute();

				// Stocker le message dans la variable de session
				$_SESSION['message'] = "Le médecin a été supprimé avec succès";;

				// Redirection vers la page d'affichage des médecins
				header('Location: /PHP/affichageMedecin.php');
				exit();
				
				echo $prenom ." " . $nom . " supprimé avec succès";
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>