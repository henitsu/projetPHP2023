<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajout de contact</title>
    </head>
    <body>
        <h1>Ajouter un contact</h1>
		<?php
			/// Stockage des variables de connexion
			$login = 'coco';
			$mdp = 'cocorico';
			$db = 'saisie';
			$server = 'localhost';
			
			/// Connexion au serveur MySQL
			try {
				$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
			}
			catch (Exception $e){
				die('Erreur : '.$e->getMessage());
			}
			
			/// Stockage des variables de la table
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$adresse = $_POST['adresse'];
			$cdp = $_POST['cdp'];
			$ville = $_POST['ville'];
			$tel = $_POST['tel'];
			
			///Sélection de tout le contenu de la table carnet_adresse
			$res = $linkpdo->query('SELECT nom, prenom FROM carnet_adresse WHERE nom=\''.$_POST['nom']. '\' AND prenom=\''.$_POST['prenom']. '\'');
			
			$resultat = $res->fetchAll();
			if (count($resultat) > 0) {
				
				/// Message d'information sur un contact déjà existant
				$message = $prenom.' '.$nom." existe déjà dans le carnet d'adresse. Cette personne n'a donc pas été rajoutée.";
			}
			else {
				/// Préparation de la requête
				$req = $linkpdo->prepare('INSERT INTO carnet_adresse(nom, prenom, adresse, cdp, ville, tel) VALUES(:nom, :prenom, :adresse, :codepostal, :ville, :tel)');
				
				/// Exécution de la requête
				$req -> execute(array('nom' => $nom,
										'prenom' => $prenom,
										'adresse' => $adresse,
										'codepostal' => $cdp,
										'ville' => $ville,
										'tel' => $tel));
										
				/// Message de confirmation d'ajout dans le carnet d'adresse
				$message = $nom.' '.$prenom." a bien été ajouté dans le carnet d'adresse.";
			}
			echo $message;
		?>
		
    </body>
</html>