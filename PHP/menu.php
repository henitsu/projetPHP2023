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
            <a img="/Donnees/user_account.png" alt="connexion"></a>
        </ul>
    </header>
    <main>
        <h1>Bienvenue, <?php ?></h1>
        <div class="grid">
            <div id="usagers" class="box">
                <h2>Usagers</h2>
            </div>
            <div id="medecins" class="box">
                <h2>Médecins</h2>
            </div>
            <div id="consultations" class="box">
                <h2>Consultations</h2>
            </div>
            <div id="statistiques" class="box">
                <h2>Statistiques</h2>
            </div>
        </div>
    </main>
</body>
</html>