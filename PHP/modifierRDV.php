<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification RDV</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/modifierPatient.css">
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

				$sql = "SELECT RDV.idusager, RDV.Id_Medecin, RDV.DateHeureRDV, RDV.DureeConsultationMinutes 
                FROM RDV, Usager, Medecin WHERE Usager.Nom = :nom_usager AND Medecin.Nom = :nom_medecin AND 
                RDV.DateHeureRDV = :dateHeure AND RDV.DureeConsultationMinutes = :duree ORDER BY RDV.DateHeureRDV";
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
						<select>
							<?php 
								echo "coucou";
								$requete = "SELECT nom FROM Medecin ORDER BY nom";
								$statement = $bdd->prepare($requete);
								$statement->execute();
								$medecins = $statement->fetchAll(PDO::FETCH_ASSOC);
								foreach ($medecins as $medecin) {
									if (strcmp($nom_medecin, $medecin['nom'])==0) {
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
						<input type="text" id="nom_usager" name="nom_usager" value="<?php echo $nom_usager; ?>" required><br>

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

                $sql = "UPDATE RDV SET idusager = :idusager, Id_Medecin = :Id_Medecin, dateHeureRDV = :dateHeureRDV, dureeConsultationMinutes = :dureeConsultationMinutes WHERE idusager = :idusager and Id_Medecin = :Id_Medecin";
                
				$stmt = $bdd->prepare($sql);
				$stmt->bindParam(':idusager', $idusager, PDO::PARAM_STR);
				$stmt->bindParam(':Id_Medecin', $Id_Medecin, PDO::PARAM_STR);
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
	<button onclick="window.location.href='/projetPHP2023/PHP/affichageRDV.php'">Retour</button>
</body>