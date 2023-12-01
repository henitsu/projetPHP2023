<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification patient</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/modifierPatient.css">
</head>
<body>
	<?php include 'header.php'; ?>

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
				$numSecu = $_GET['numSecu'];

				$sql = "SELECT * FROM usager WHERE Nom = :Nom AND Prenom = :Prenom AND Adresse = :Adresse AND DateNaissance = :DateNaissance AND LieuNaissance = :LieuNaissance AND NumSecu = :NumSecu";
				$stmt = $dbco->prepare($sql);
				$stmt->bindParam(':Nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':Prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':Adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':DateNaissance', $dateNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':LieuNaissance', $lieuNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':NumSecu', $numSecu, PDO::PARAM_STR);
				$stmt->execute();
				$usager = $stmt->fetch(PDO::FETCH_ASSOC);
				$id = $usager['idusager'];

				?>
				<div class="form">
					<form action="modifierPatient.php?idusager=<?php echo $id; ?>" method="post">
						<label for="Nom">Nom :</label>
						<input type="text" id="nom" name="Nom" value="<?php echo $usager['Nom']; ?>" required><br>

						<label for="prenom">Prénom :</label>
						<input type="text" id="prenom" name="Prenom" value="<?php echo $usager['Prenom']; ?>" required><br>

						<label for="adresse">Adresse :</label>
						<input type="text" id="adresse" name="Adresse" value="<?php echo $usager['Adresse']; ?>" required><br>

						<label for="codepostal">Date naissance :</label>
						<input type="text" id="dateNaissance" name="DateNaissance" value="<?php echo $usager['DateNaissance']; ?>" required><br>

						<label for="ville">Lieu naissance :</label>
						<input type="text" id="lieuNaissance" name="LieuNaissance" value="<?php echo $usager['LieuNaissance']; ?>" required><br>

						<label for="tel">Numéro de sécurité sociale :</label>
						<input type="text" id="numSecu" name="NumSecu" value="<?php echo $usager['NumSecu']; ?>" required><br>

						<input type="submit" value="Modifier l'usager">
					</form>
				</div>
				
				<?php
			} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
				$id = $_GET['idusager'];
				$nom = $_POST['Nom'];
				$prenom = $_POST['Prenom'];
				$adresse = $_POST['Adresse'];
				$dateNaissance = $_POST['DateNaissance'];
				$lieuNaissance = $_POST['LieuNaissance'];
				$numSecu = $_POST['NumSecu'];

				$sql = "UPDATE usager SET Nom = :Nom, Prenom = :Prenom, Adresse = :Adresse, DateNaissance = :DateNaissance, LieuNaissance = :LieuNaissance, NumSecu = :NumSecu WHERE idusager = :idusager";
				$stmt = $dbco->prepare($sql);
				$stmt->bindParam(':Nom', $nom, PDO::PARAM_STR);
				$stmt->bindParam(':Prenom', $prenom, PDO::PARAM_STR);
				$stmt->bindParam(':Adresse', $adresse, PDO::PARAM_STR);
				$stmt->bindParam(':DateNaissance', $dateNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':LieuNaissance', $lieuNaissance, PDO::PARAM_STR);
				$stmt->bindParam(':NumSecu', $numSecu, PDO::PARAM_STR);
				$stmt->bindParam(':idusager', $id, PDO::PARAM_INT);
				$stmt->execute();

				echo 'Usager modifié avec succès';
			} else {
				echo "Méthode non autorisée";
			}
		} catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage();
		}
	?>
	<button onclick="window.location.href='/projetPHP2023/PHP/affichage.php'">Retour</button>

</body>