<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/menu.css">
</head>
<body>
    <header>
        <ul>
            <li>Usagers</li>
            <li>Médecins</li>
            <li>Consultations</li>
            <li>Statistiques</li>
            <a img="/projetPHP2023/Donnees/user_account.png" alt="connexion"></a>
        </ul>
    </header>
    <main>
        <h1>Bienvenue, <?php ?></h1>
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