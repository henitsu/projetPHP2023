<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="/projetPHP2023/CSS/header.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
<body>
    <header>
            <div class="menu-container">
                <div class="logo">
                    <a href="/projetPHP2023/PHP/menu.php"><img src="/projetPHP2023/Donnees/doctor.png" alt="logo"></a>
                </div>
                <div class="burger-menu" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <ul class="menuheader">
                    <li><a href="/projetPHP2023/PHP/affichagePatient.php">Usagers</a></li>
                    <li><a href="/projetPHP2023/PHP/affichageMedecin.php">Médecins</a></li>
                    <li><a href="/projetPHP2023/PHP/affichageRDV.php">Consultations</a></li>
                    <li><a href="/projetPHP2023/PHP/stats.php">Statistiques</a></li>
                    <li><a href="#" class="display-picture"><img src="https://i.pravatar.cc/85" alt="profil"></a></li>
                </ul>
            </div>
            
            <div class="card hidden">
                <ul>
                    <li>
                        <img src="/projetPHP2023/Donnees/login.svg" alt="login">
                        <a href="/projetPHP2023/PHP/profil.php">Compte</a>
                    </li>
                    <li>
                        <img src="/projetPHP2023/Donnees/logout.png" alt="logout">
                        <a href="/projetPHP2023/PHP/deconnexion.php">Se déconnecter</a>
                    </li>
                </ul>
            </div>
    </header>
    <script src="/projetPHP2023/JS/header.js"></script>
</body>
</html>