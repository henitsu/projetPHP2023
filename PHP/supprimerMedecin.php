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
			$servname = "localhost"; $dbname = "patientele"; $user = "etu1"; $pass = "iutinfo";
			
			try {
				$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
				$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// Stockage de l'identifiant du médecin
				$id = $_GET['id'];			
				
				// Utilisation de la clause WHERE avec une requête préparée
				// Suppression medecin
				$suppressionMedecin = "DELETE FROM medecin WHERE Id_Medecin = :Id_Medecin";

                // Suppression usager ????
				$suppressionUsager = "DELETE FROM usager WHERE Id_Medecin = :Id_Medecin";
				
				// Suppression RDV
				$suppressionRDV = "DELETE FROM RDV WHERE Id_Medecin = :Id_Medecin";
				
				// Préparation des requêtes
				$stmtRDV = $dbco->prepare($suppressionRDV);
				$stmtMedecin = $dbco->prepare($suppressionMedecin);
                $stmtUsager = $dbco->prepare($suppressionUsager);
				
				// Liaison des paramètres requête suppression RDV
				$stmtRDV->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);

				// idem pour le medecin
				$stmtMedecin->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);

                // idem pour le medecin
				$stmtUsager->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);

				// Exécution des requêtes
				$stmtRDV->execute();
				$stmtMedecin->execute();
                $stmtUsager->execute();
				
				echo $prenom ." " . $nom . " supprimé avec succès";
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>