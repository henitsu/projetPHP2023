<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification RDV</title>
	<link rel="shortcut icon" href="/Donnees/patientele_icon.ico" />
    <link rel="stylesheet" href="/CSS/base.css">
    <link rel="stylesheet" href="/CSS/modifier.css">
</head>
<body>
	<?php include 'header.php';
		require 'connexionBD.php';

		try {
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$nom_usager = $_GET['nom_usager'];
				$nom_medecin = $_GET['nom_medecin'];
				$duree = $_GET['duree'];
                $dateHeure = $_GET["dateHeure"];

				$sql = "SELECT rdv.idusager, rdv.Id_Medecin, rdv.DateHeureRDV, rdv.DureeConsultationMinutes 
                FROM rdv, usager, medecin WHERE usager.Nom = :nom_usager AND medecin.Nom = :nom_medecin AND 
                rdv.DateHeureRDV = :dateHeure AND rdv.DureeConsultationMinutes = :duree ORDER BY rdv.DateHeureRDV";
				$stmt = $bdd->prepare($sql);
				$stmt->bindParam(':nom_usager', $nom_usager, PDO::PARAM_STR);
				$stmt->bindParam(':nom_medecin', $nom_medecin, PDO::PARAM_STR);
				$stmt->bindParam(':duree', $duree, PDO::PARAM_STR);
                $stmt->bindParam(':dateHeure', $dateHeure, PDO::PARAM_STR);
				$stmt->execute();
				$rdv = $stmt->fetch(PDO::FETCH_ASSOC);

				$idusager = $rdv['idusager'];
				$Id_Medecin = $rdv['Id_Medecin'];
				?>
				<h1>Modification du RDV du docteur <?php echo $nom_medecin; ?></h1>

				<div class="form">
					<form action="modifierRDV.php?idusager=<?php echo $idusager;?>&Id_Medecin=<?php echo $Id_Medecin ?>" method="post">
						<label for="nom_medecin">Nom médecin :</label>
						<select name="nom_medecin">
							<?php 
								$requete = "SELECT nom FROM medecin ORDER BY nom";
								$statement = $bdd->prepare($requete);
								$statement->execute();
								$medecins = $statement->fetchAll(PDO::FETCH_ASSOC);
								foreach ($medecins as $medecin) {
									if (strcmp($nom_medecin, $medecin['nom']) == 0) {
										echo "<option value='" . $medecin['nom'] . "' selected>" . $medecin['nom'] . "</option>";
									}
									else {
										echo "<option value='" . $medecin['nom'] . "'>" . $medecin['nom'] . "</option>";
									}
								}
							?>						
						</select>
						<br><br>

						<label for="nom_usager">Nom usager :</label>
						<select name="nom_usager">
							<?php 
								$requete = "SELECT nom FROM usager ORDER BY nom";
								$statement = $bdd->prepare($requete);
								$statement->execute();
								$usagers = $statement->fetchAll(PDO::FETCH_ASSOC);
								foreach ($usagers as $usager) {
									if (strcmp($nom_usager, $usager['nom']) == 0) {
										echo "<option value='" . $usager['nom'] . "' selected>" . $usager['nom'] . "</option>";
									}
									else {
										echo "<option value='" . $usager['nom'] . "'>" . $usager['nom'] . "</option>";
									}
								}
							?>						
						</select>
						<br><br>
						
						<label for="dateHeure">Date heure :</label>
						<input type="datetime-local" id="dateHeure" name="dateHeure" value="<?php echo $rdv['DateHeureRDV']; ?>" required><br>
                        <br><br>

                        <label for="duree">Durée :</label>
						<input type="text" id="duree" name="duree" value="<?php echo $rdv['DureeConsultationMinutes']; ?>" required><br>

						<input type="submit" value="Enregistrer les modifications">
					</form>
				</div>
				
			<?php
			} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
				$duree = $_POST['duree'];
                $dateHeure = $_POST["dateHeure"];
				$idusager = $_GET['idusager'];
				$Id_Medecin = $_GET['Id_Medecin'];
				$nom_medecin = $_POST['nom_medecin'];

				$req_id_medecin = "SELECT Id_Medecin FROM medecin WHERE Nom = :nom_medecin";
				$etat = $bdd->prepare($req_id_medecin);
				$etat->bindParam(':nom_medecin', $nom_medecin, PDO::PARAM_STR);
				$etat->execute();
				$ids = $etat->fetch(PDO::FETCH_ASSOC);
				$id = $ids['Id_Medecin'];

                $sql = "UPDATE rdv SET Id_Medecin = :Id_Medecin, dateHeureRDV = :dateHeureRDV, dureeConsultationMinutes = :dureeConsultationMinutes WHERE idusager = :idusager";
                
				$stmt = $bdd->prepare($sql);
				$stmt->bindParam(':idusager', $idusager, PDO::PARAM_STR);
				$stmt->bindParam(':Id_Medecin', $id, PDO::PARAM_STR);
				$stmt->bindParam(':dureeConsultationMinutes', $duree, PDO::PARAM_STR);
                $stmt->bindParam(':dateHeureRDV', $dateHeure, PDO::PARAM_STR);
				$stmt->execute();
				$rdv = $stmt->fetch(PDO::FETCH_ASSOC);
				
				echo 'RDV modifié avec succès';
			} else {
				echo "Méthode non autorisée";
			}
		} catch (PDOException $e) {
			echo "Erreur : " . $e->getMessage();
		}
	?>
	<button onclick="window.location.href='/PHP/affichageRDV.php'">Retour</button>
</body>