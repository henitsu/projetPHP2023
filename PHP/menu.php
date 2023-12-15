<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/menu.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>Bienvenue,
            <?php
                require 'connexion.php';
                $servname = "localhost";
                $dbname = "patientele";
                $user = "etu1";
                $pass = "iutinfo";
                $identifiant = new Connexion($_GET['identifiant'], $servname, $dbname, $user, $pass);
                $identifiant->affichage();
            ?>
        </h1>
        <div class="grid">
            <div id="usagers" class="box">
                <a href="/projetPHP2023/PHP/affichage.php"><h2>Usagers</h2></a>
            </div>
            <div id="medecins" class="box">
                <a href=""><h2>Médecins</h2></a>
            </div>
            <div id="consultations" class="box">
                <a href=""><h2>Consultations</h2></a>
            </div>
            <div id="statistiques" class="box">
                <a href=""><h2>Statistiques</h2></a>
            </div>
        </div>
    </main>
</body>
</html>