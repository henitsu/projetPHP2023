<?php
	$mdp = 'iutinfo';
	$login = 'etu1';
	$rep_contacts = 'repertoire_contacts';
	$server = 'localhost';
	try {
		$linkpdo = new PDO ("mysql:host=$server;dbname=$rep_contacts", $login, $mdp);
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$codepostal = $_POST['codepostal'];
	$ville = $_POST['ville'];
	$tel = $_POST['tel'];
	
	$res = $linkpdo->query('SELECT nom, prenom FROM carnet_adresse WHERE nom=\''.$_POST['nom']. '\' and prenom=\''.$_POST['prenom']. '\' ');
    $resultat = $res->fetchAll();

    if (count($resultat)>0) {  
        $message = $nom . ' fait déjà partie de la base de données, il n\'a donc pas été ajouté';
		echo $message;
    }

    else { 
		$req = $linkpdo->prepare('INSERT INTO carnet_adresse(nom, prenom, adresse, codepostal, ville, tel) 
	VALUES(:nom, :prenom, :adresse, :codepostal, :ville, :tel)');
	
		$req->execute(array('nom'=>$nom,
							'prenom'=>$prenom,
							'adresse'=>$adresse,
							'codepostal'=>$codepostal,
							'ville'=>$ville,
							'tel'=>$tel));
	}

	 ///Fermeture du curseur d'analyse des résultats
	$res->closeCursor();
	
	echo "Contact ajouté avec succès";
?>