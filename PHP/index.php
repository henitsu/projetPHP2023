
<?php

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
        
            <form action="menu.php" method="post">
                <label for="identifiant">Identifiant</label>
                <input type="text" id="identifiant" placeholder="identifiant">
                <label>Mot de passe</label>
                <input type="password">
                <a href="#" id="mdp">Mot de passe oublié</a>
                <input id="valider" type="submit" value="Se connecter">
            </form>
        </div>

        <div id="partieDroite">
            <h1>Gestionnaire d'un cabinet médical</h1>
            <img src="/projetPHP2023/Donnees/docteur.jpg" alt="docteur">
        </div>
    </div>

</body>
</html>