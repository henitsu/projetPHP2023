<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="/projetPHP2023/CSS/header.css">
<body>
    <header>
        <ul class="menuheader">
            <li><a href="/projetPHP2023/PHP/menu.php">Menu principal</a></li>
            <li><a href="/projetPHP2023/PHP/affichagePatient.php">Usagers</a></li>
            <li><a href="/projetPHP2023/PHP/affichageMedecin.php">Médecins</a></li>
            <li><a href="/projetPHP2023/PHP/affichageRDV.php">Consultations</a></li>
            <li><a href="">Statistiques</a></li>
            <li><img src="/projetPHP2023/Donnees/user_account.png" alt="connexion"></li>
            <ul class="sousmenu">
                <li><a href="/projetPHP2023/PHP/profil.php">Profil</a></li>
                <li><a href="/projetPHP2023/PHP/deconnexion.php">Se déconnecter</a></li>
            </ul>
        </ul>
    </header>
    <script src="/projetPHP2023/JS/header.js"></script>
</body>
</html>