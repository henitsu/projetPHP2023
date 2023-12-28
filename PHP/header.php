<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <link rel="stylesheet" href="/projetPHP2023/CSS/header.css">
<body>
    <div class="header">
        <nav>
            <img src="/projetPHP2023/Donnees/doctor.png" class="logo" alt="doctor">
            <ul>
                <li><a href="/projetPHP2023/PHP/menu.php">Menu principal</a></li>
                <li><a href="/projetPHP2023/PHP/affichagePatient.php">Usagers</a></li>
                <li><a href="/projetPHP2023/PHP/affichageMedecin.php">Médecins</a></li>
                <li><a href="/projetPHP2023/PHP/affichageRDV.php">Consultations</a></li>
                <li><a href="">Statistiques</a></li>
            </ul>
            <img src="https://i.pravatar.cc/85" class="user-pic" alt="profil">
            <div class="sub-menu-wrap">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="https://i.pravatar.cc/85" alt="profil" class="user-pic">
                        <span class="user-name"><?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']?></span>
                        <hr>
                    </div>
                    <ul>
                        <li><a href="/projetPHP2023/PHP/profil.php">Compte</a></li>
                        <li><a href="/projetPHP2023/PHP/deconnexion.php">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
            <script src="/projetPHP2023/JS/header.js"></script>
        </nav>
    </div>
</body>
</html>