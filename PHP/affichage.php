<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion d'un cabinet médical</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/affichage.css">
</head>
<body>
<h1>Affichage des patients</h1>
<?php
    // Vérifie si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Connexion à la base de données (à personnaliser avec vos propres informations de connexion)
        $connexion = new mysqli('localhost', 'etu1', 'iutinfo', 'patientele');

        // Vérifie la connexion
        if ($connexion->connect_error) {
            die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
        }

        // Prépare la requête SQL
        $requete = "SELECT * FROM USAGER";

        // Exécute la requête
        $resultat = $connexion->query($requete);

        // Vérifie s'il y a des résultats
        if ($resultat->num_rows > 0) {
            echo '<h2>Votre patientèle :</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Date naissance</th><th>Lieu naissance</th><th>Numéro sécurité sociale</th></tr>';

            // Affiche les résultats
            while ($row = $resultat->fetch_assoc()) {
                echo '<tr>';
				echo '<td>' . $row['ID_Usager'] . '</td>';
                echo '<td>' . $row['nom'] . '</td>';
                echo '<td>' . $row['prenom'] . '</td>';
                echo '<td>' . $row['adresse'] . '</td>';
                echo '<td>' . $row['dateNaissance'] . '</td>';
                echo '<td>' . $row['lieuNaissance'] . '</td>';
                echo '<td>' . $row['numSecu'] . '</td>';
				echo '<td><a href="modifierPatient.php?nom=' . $row['nom'] . '&prenom=' . $row['prenom'] . '&adresse=' . $row['adresse'] . '&dateNaissance=' . $row['dateNaissance'] . '&lieuNaissance=' . $row['lieuNaissance'] . '&numSecu=' . $row['numSecu'] . '">Modifier</a> | 
				<a href="supprimer.php?nom=' . $row['nom'] . '&prenom=' . $row['prenom'] . '&adresse=' . $row['adresse'] . '&dateNaissance=' . $row['dateNaissance'] . '&lieuNaissance=' . $row['lieuNaissance'] . '&numSecu=' . $row['numSecu'] . '">Supprimer</a></td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo '<p>Aucun contact trouvé avec les mots-clés saisis.</p>';
        }

        // Ferme la connexion à la base de données
        $connexion->close();
    }
    ?>

</body>