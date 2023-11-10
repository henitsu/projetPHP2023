<!DOCTYPE html>
<html>
    <head>
        <title>Modification de contact</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Modifier un contact</h1>
        <?php
		$servname = "localhost";
		$dbname = "saisie";
		$user = "coco";
		$pass = "cocorico";

		try {
			$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
			$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$nom = $_GET['nom'];
				$prenom = $_GET['prenom'];
				$adresse = $_GET['adresse'];
				$cdp = $_GET['cdp'];
				$ville = $_GET['ville'];
				$tel = $_GET['tel'];

				$sql = "SELECT * FROM carnet_adresse WHERE nom = :nom AND prenom = :prenom AND adresse = :adresse AND cdp = :cdp AND ville = :ville AND tel = :tel";
				$stmt = $dbco->prepare($sql);
				$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':cdp', $cdp, PDO::PARAM_STR);
				$stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
				$stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
				$stmt->execute();
				$contact = $stmt->fetch(PDO::FETCH_ASSOC);
				$id = $contact['id_personne'];

				?>
				<form action="modification.php?id_personne=<?php echo $id; ?>" method="post">
					<label for="nom">Nom :</label>
					<input type="text" id="nom" name="nom" value="<?php echo $contact['nom']; ?>" required><br>

					<label for="prenom">Prénom :</label>
					<input type="text" id="prenom" name="prenom" value="<?php echo $contact['prenom']; ?>" required><br>

					<label for="adresse">Adresse :</label>
					<input type="text" id="adresse" name="adresse" value="<?php echo $contact['adresse']; ?>" required><br>

					<label for="cdp">Code postal :</label>
					<input type="text" id="cdp" name="cdp" value="<?php echo $contact['cdp']; ?>" required><br>

					<label for="ville">Ville :</label>
					<input type="text" id="ville" name="ville" value="<?php echo $contact['ville']; ?>" required><br>

					<label for="tel">Téléphone :</label>
					<input type="text" id="tel" name="tel" value="<?php echo $contact['tel']; ?>" required><br>

					<input type="submit" value="Modifier le contact">
				</form>
				<?php
			} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
				$id = $_GET['id_personne'];
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$adresse = $_POST['adresse'];
				$cdp = $_POST['cdp'];
				$ville = $_POST['ville'];
				$tel = $_POST['tel'];

				$sql = "UPDATE carnet_adresse SET nom = :nom, prenom = :prenom, adresse = :adresse, cdp = :cdp, ville = :ville, tel = :tel WHERE id_personne = :id";
				$stmt = $dbco->prepare($sql);
				$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':cdp', $cdp, PDO::PARAM_STR);
				$stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
				$stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();

				echo 'Contact modifié avec succès';
			} else {
				echo "Méthode non autorisée";
			}
		} catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage();
		}
		?>
    </body>
</html>