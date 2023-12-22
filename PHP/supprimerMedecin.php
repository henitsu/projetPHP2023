<!DOCTYPE html>
<html>
    <head>
        <title>Suppression d'un médecin
        </title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Supprimer un médecin
        </h1>
		<?php
			// Connexion à la base de données
			require 'connexion.php';
			
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
				$suppressionRDV = "DELETE FROM RDV WHERE Id_Medecin = :Id_Medecin";
				
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
				
				echo $prenom ." " . $nom . " supprimé avec succès";
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>