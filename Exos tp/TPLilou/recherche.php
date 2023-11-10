<!DOCTYPE html>
<html>
<head>
    <title>Recherche de Contacts</title>
</head>
<body>
    <h1>Recherche de Contacts</h1>

    <!-- Formulaire de recherche -->
    <form method="post" action="recherche.php">
        <label for="mot_cle">Mot-clé(s):</label>
        <input type="text" name="mot_cle" id="mot_cle" placeholder="Saisissez un ou plusieurs mots-clés" required>
        <input type="submit" value="Rechercher">
    </form>

    <?php
    // Vérifie si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupère les mots-clés saisis par l'utilisateur
        $motCle = $_POST['mot_cle'];

        // Connexion à la base de données (à personnaliser avec vos propres informations de connexion)
        $connexion = new mysqli('localhost', 'etu1', 'iutinfo', 'repertoire_contacts');

        // Vérifie la connexion
        if ($connexion->connect_error) {
            die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
        }

        // Prépare la requête SQL
        $requete = "SELECT * FROM carnet_adresse WHERE nom LIKE '%$motCle%' OR prenom LIKE '%$motCle%' OR adresse LIKE '%$motCle%' OR codepostal LIKE '%$motCle%' OR ville LIKE '%$motCle%' OR tel LIKE '%$motCle%'";

        // Exécute la requête
        $resultat = $connexion->query($requete);

        // Vérifie s'il y a des résultats
        if ($resultat->num_rows > 0) {
            echo '<h2>Résultats de la recherche :</h2>';
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Code postal</th><th>Ville</th><th>Tel</th></tr>';

            // Affiche les résultats
            while ($row = $resultat->fetch_assoc()) {
                echo '<tr>';
				echo '<td>' . $row['ID_Personne'] . '</td>';
                echo '<td>' . $row['nom'] . '</td>';
                echo '<td>' . $row['prenom'] . '</td>';
                echo '<td>' . $row['adresse'] . '</td>';
                echo '<td>' . $row['codepostal'] . '</td>';
                echo '<td>' . $row['ville'] . '</td>';
                echo '<td>' . $row['tel'] . '</td>';
				echo '<td><a href="modification.php?nom=' . $row['nom'] . '&prenom=' . $row['prenom'] . '&adresse=' . $row['adresse'] . '&codepostal=' . $row['codepostal'] . '&ville=' . $row['ville'] . '&tel=' . $row['tel'] . '">Modifier</a> | 
				<a href="supprimer.php?nom=' . $row['nom'] . '&prenom=' . $row['prenom'] . '&adresse=' . $row['adresse'] . '&codepostal=' . $row['codepostal'] . '&ville=' . $row['ville'] . '&tel=' . $row['tel'] . '">Supprimer</a></td>';
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
</html>
