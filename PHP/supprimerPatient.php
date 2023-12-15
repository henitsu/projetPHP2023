<!DOCTYPE html>
<html>
    <head>
        <title>Suppression d'un usager</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Supprimer un usager</h1>
		<?php
			$servname = "localhost"; $dbname = "patientele"; $user = "etu1"; $pass = "iutinfo";
			
			// Stockage des données saisies
			$nom = $_GET['nom'];
			$prenom = $_GET['prenom'];
			$adresse = $_GET['adresse'];
			$dateNaissance = $_GET['dateNaissance'];
			$lieuNaissance = $_GET['lieuNaissance'];
			$numSecu = $_GET['numSecu'];
			$idusager = ?;

			
			try {
				$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
				$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Utilisation de la clause WHERE avec une requête préparée
				$suppressionUsager = "DELETE FROM usager WHERE nom = :nom AND prenom = :prenom AND adresse = :adresse AND dateNaissance = :dateNaissance AND lieuNaissance = :lieuNaissance AND idusager = :idusager";
				
				// Suppression RDV
				$suppressionRDV = "DELETE FROM RDV WHERE idusager = :idusager"
				
				// Préparation des requêtes
				$stmtRDV = $dbco->prepare($suppressionRDV);
				$stmtUsager = $dbco->prepare($suppressionUsager);
				
				// Liaison des paramètres requête suppression RDV
				$stmtRDV->bindParam(':idusager', $idusager, PDO::PARAM_STR);
				
				// Liaison des paramètres requête suppression Usager
				$stmtUsager->bindParam(':nom', $nom, PDO::PARAM_STR);
				$stmtUsager->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$stmtUsager->bindParam(':adresse', $adresse, PDO::PARAM_STR);
				$stmtUsager->bindParam(':codepostal', $dateNaissance, PDO::PARAM_STR);
				$stmtUsager->bindParam(':ville', $lieuNaissance, PDO::PARAM_STR);
				$stmtUsager->bindParam(':tel', $numSecu, PDO::PARAM_STR);
				$stmtUsager->bindParam(':idusager', $idusager, PDO::PARAM_STR);

				// Exécution des requêtes
				$stmtRDV->execute();
				$stmtUsager->execute();
				
				echo $prenom . $nom . " supprimé avec succès';
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>