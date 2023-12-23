<?php
    include 'header.php';
    require 'connexionBD.php';

    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $sql = "SELECT * FROM secretaire WHERE Nom = :Nom AND Prenom = :Prenom";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':Nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':Prenom', $prenom, PDO::PARAM_STR);
    $stmt->execute();
    $secretaire = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/profil.css">
</head>
<body>
    <main>
        <h1>Profil</h1>
        <div class="grid">
            <div id="photo">
                <img src="https://i.pravatar.cc/85" alt="photo-profil">
            </div>
            <div id="nom" class="box">
                <h2>Nom</h2>
                <p><?php echo $secretaire['Nom']; ?></p>
            </div>
            <div id="prenom" class="box">
                <h2>Prénom</h2>
                <p><?php echo $secretaire['Prenom']; ?></p>
            </div>
            <div id="login" class="box">
                <h2>Login</h2>
                <p><?php echo $secretaire['Login']; ?></p>
            </div>
        </div>
    </main>
</body>