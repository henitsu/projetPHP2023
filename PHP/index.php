
<?php
/*
    session_start();
    $servname = "localhost";
    $dbname = "patientele";
    $user = "etu1";
    $pass = "iutinfo";

    if(isset($_SESSION['identifiant'])){
        header('Location: /projetPHP2023/PHP/menu.php');
    }else{
        header('Location: /projetPHP2023/PHP/index.php');
    }*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion d'un cabinet médical</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/index.css">
</head>
<body>

    <div id="page">

        <div id="auth">
            <h1>Authentification</h1>
        
            <form action="" method="get">
                <label id="identifiant">Identifiant</label>
                <br>
                <input type="text" placeholder="identifiant"><br><br>
                <label>Mot de passe</label><br>
                <input type="password"><br>
                <a href="#" id="mdp">Mot de passe oublié</a><br> <br>

                <input id="valider" type="button" value="Se connecter">
            </form>
        </div>

        <div id="partieDroite">
            <h1>Gestionnaire d'un cabinet médical</h1>
            <img src="/projetPHP2023/Donnees/docteur.jpg" alt="docteur">
        </div>
    </div>

</body>
</html>