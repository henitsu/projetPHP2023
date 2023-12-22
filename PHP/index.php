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
        
            <form id="connexion" action="menu.php" method="post">
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" placeholder="identifiant">

                <label for="password">Mot de passe</label>
                <input id="password" type="password" placeholder="Ecrivez n'importe quoi">
                
                <a href="#" id="mdp">Mot de passe oublié</a>

                <label for="valider"></label>
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