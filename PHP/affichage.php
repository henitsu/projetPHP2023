<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion d'un cabinet médical</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/header.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/affichage.css">
</head>
<body>
    <header>
        <ul>
            <li><a href="/projetPHP2023/PHP/affichage.php">Usagers</a></li>
            <li><a href="">Médecins</a></li>
            <li><a href="">Consultations</a></li>
            <li><a href="">Statistiques</a></li>
            <a img="/projetPHP2023/Donnees/user_account.png" alt="connexion"></a>
        </ul>
    </header>
    <h1>Affichage des patients</h1>
    <?php
   
    // Connexion à la base de données (à personnaliser avec vos propres informations de connexion)
    $connexion = new mysqli('localhost', 'etu1', 'iutinfo', 'patientele');

    // Vérifie la connexion
    if ($connexion->connect_error) {
        die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
    }

    // Prépare la requête SQL
    $requete = "SELECT * FROM usager";

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
            echo '<td>' . $row['idusager'] . '</td>';
            echo '<td>' . $row['Nom'] . '</td>';
            echo '<td>' . $row['Prenom'] . '</td>';
            echo '<td>' . $row['Adresse'] . '</td>';
            echo '<td>' . $row['DateNaissance'] . '</td>';
            echo '<td>' . $row['LieuNaissance'] . '</td>';
            echo '<td>' . $row['NumSecu'] . '</td>';
            echo '<td><a href="modifierPatient.php?nom=' . $row['Nom'] . '&prenom=' . $row['Prenom'] . '&adresse=' . $row['Adresse'] . '&dateNaissance=' . $row['DateNaissance'] . '&lieuNaissance=' . $row['LieuNaissance'] . '&numSecu=' . $row['NumSecu'] . '">Modifier</a> | 
            <a href="supprimer.php?nom=' . $row['Nom'] . '&prenom=' . $row['Prenom'] . '&adresse=' . $row['Adresse'] . '&dateNaissance=' . $row['DateNaissance'] . '&lieuNaissance=' . $row['LieuNaissance'] . '&numSecu=' . $row['NumSecu'] . '">Supprimer</a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Aucun contact trouvé avec les mots-clés saisis.</p>';
    }

    // Ferme la connexion à la base de données
    $connexion->close();
    
    ?>
    <div id="menu">
        <button onclick="window.location.href='/projetPHP2023/PHP/menu.php'">Menu principal</button>
    </div>
</body>