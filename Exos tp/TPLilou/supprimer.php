<!DOCTYPE html>
<html>
    <head>
        <title>Suppression de contact</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Supprimer un contact</h1>
		<?php
			$servname = "localhost"; $dbname = "repertoire_contacts"; $user = "etu1"; $pass = "iutinfo";
			
			// Stockage des données saisies
			$nom = $_GET['nom'];
			$prenom = $_GET['prenom'];
			$adresse = $_GET['adresse'];
			$codepostal = $_GET['codepostal'];
			$ville = $_GET['ville'];
			$tel = $_GET['tel'];

			
			try {
				$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
				$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				// Utilisation de la clause WHERE avec une requête préparée
				$sql = "DELETE FROM carnet_adresse WHERE nom = :nom AND prenom = :prenom AND adresse = :adresse AND codepostal = :codepostal AND ville = :ville AND tel = :tel";
				
				// Préparation de la requête
				$stmt = $dbco->prepare($sql);
				
				// Liaison des paramètres
				$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':codepostal', $codepostal, PDO::PARAM_STR);
				$stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
				$stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
				
				// Exécution de la requête
				$stmt->execute();
				
				echo 'Contact supprimé avec succès';
			} catch(PDOException $e) {
				echo "Erreur : " . $e->getMessage();
			}
		?>
		
    </body>
</html>