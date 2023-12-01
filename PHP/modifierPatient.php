<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification patient</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/modifierPatient.css">
</head>
<body>

    <h1>Modification des informations de [nom prenom]</h1>

    <?php
		$servname = "localhost";
		$dbname = "patientele";
		$user = "etu1";
		$pass = "iutinfo";

		try {
			$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
			$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$nom = $_GET['nom'];
				$prenom = $_GET['prenom'];
				$adresse = $_GET['adresse'];
				$dateNaissance = $_GET['dateNaissance'];
				$lieuNaissance = $_GET['lieuNaissance'];
				$numSecu = $_GET['NumSecu'];

				$sql = "SELECT * FROM carnet_adresse WHERE nom = :nom AND prenom = :prenom AND adresse = :adresse AND codepostal = :codepostal AND ville = :ville AND tel = :tel";
				$stmt = $dbco->prepare($sql);
				$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':lieuNaissance', $lieuNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':numSecu', $numSecu, PDO::PARAM_STR);
				$stmt->execute();
				$usager = $stmt->fetch(PDO::FETCH_ASSOC);
				$id = $usager['ID_Usager'];

				?>
				<form action="modification.php?ID_Usager=<?php echo $id; ?>" method="post">
					<label for="nom">Nom :</label>
					<input type="text" id="nom" name="nom" value="<?php echo $usager['nom']; ?>" required><br>

					<label for="prenom">Prénom :</label>
					<input type="text" id="prenom" name="prenom" value="<?php echo $usager['prenom']; ?>" required><br>

					<label for="adresse">Adresse :</label>
					<input type="text" id="adresse" name="adresse" value="<?php echo $usager['adresse']; ?>" required><br>

					<label for="codepostal">Date naissance :</label>
					<input type="text" id="dateNaissance" name="dateNaissance" value="<?php echo $usager['dateNaissance']; ?>" required><br>

					<label for="ville">Lieu naissance :</label>
					<input type="text" id="lieuNaissance" name="lieuNaissance" value="<?php echo $usager['lieuNaissance']; ?>" required><br>

					<label for="tel">Numéro de sécurité sociale :</label>
					<input type="text" id="numSecu" name="numSecu" value="<?php echo $usager['NumSecu']; ?>" required><br>

					<input type="submit" value="Modifier l'usager">
				</form>
				<?php
			} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
				$id = $_GET['ID_Usager'];
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$adresse = $_POST['adresse'];
				$dateNaissance = $_POST['dateNaissance'];
				$lieuNaissance = $_POST['lieuNaissance'];
				$numSecu = $_POST['NumSecu'];

				$sql = "UPDATE carnet_adresse SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, ville = :ville, tel = :tel WHERE ID_Personne = :id";
				$stmt = $dbco->prepare($sql);
				$stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':lieuNaissance', $lieuNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':numSecu', $numSecu, PDO::PARAM_STR);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				$stmt->execute();

				echo 'Usager modifié avec succès';
			} else {
				echo "Méthode non autorisée";
			}
		} catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage();
		}
	?>

</body>