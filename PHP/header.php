<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="/projetPHP2023/CSS/header.css">
<body>
    <header>
    <nav>
        <ul class="menuheader">
            <li><a href="/projetPHP2023/PHP/menu.php">Menu principal</a></li>
            <li><a href="/projetPHP2023/PHP/affichagePatient.php">Usagers</a></li>
            <li><a href="/projetPHP2023/PHP/affichageMedecin.php">Médecins</a></li>
            <li><a href="/projetPHP2023/PHP/affichageRDV.php">Consultations</a></li>
            <li><a href="">Statistiques</a></li>
            <li><a href="#" class="display-picture"><img src="https://i.pravatar.cc/85" alt="profil"></a></li>
        </ul>
        <div class="card hidden">
            <ul>
                <li><a href="/projetPHP2023/PHP/profil.php">Compte</a></li>
                <li><a href="/projetPHP2023/PHP/deconnexion.php">Se déconnecter</a></li>
            </ul>
        </div>
    </nav>
    </header>
    <script src="/projetPHP2023/JS/header.js"></script>
</body>
</html>