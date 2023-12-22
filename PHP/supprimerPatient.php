<!DOCTYPE html>
<html>
    <head>
        <title>Suppression d'un usager</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Supprimer un usager</h1>
		<?php
			require 'connexion.php';
			
			try {
				// Stockage de l'identifiant de l'usager
				$idusager = $_GET['id'];

				// Utilisation de la clause WHERE avec une requête préparée
				// Suppression usager
				$suppressionUsager = "DELETE FROM usager WHERE idusager = :idusager";
				
				// Suppression RDV
				$suppressionRDV = "DELETE FROM RDV WHERE idusager = :idusager";
				
				// Préparation des requêtes
				$stmtRDV = $bdd->prepare($suppressionRDV);
				$stmtUsager = $bdd->prepare($suppressionUsager);
				
				// Liaison des paramètres requête suppression RDV
				$stmtRDV->bindParam(':idusager', $idusager, PDO::PARAM_STR);

				// idem pour l'usager
				$stmtUsager->bindParam(':idusager', $idusager, PDO::PARAM_STR);

				// Exécution des requêtes
				$stmtRDV->execute();
				$stmtUsager->execute();
				
				echo $prenom ." " . $nom . " supprimé avec succès";
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>