<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/menu.css">
</head>
<body>
    <?php
        include 'header.php';
        if (!empty($_POST['identifiant'])){
            $_SESSION["identifiant"] = $_POST["identifiant"];
            $session_id = session_id();
        }
        $login = $_SESSION['identifiant'];
    ?>
    <main>
        <?php
            require 'connexion.php';
            $sql = "SELECT Nom, Prenom FROM secretaire WHERE login = :Login";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':Login', $login, PDO::PARAM_STR);
            $stmt->execute();
            $secretaire = $stmt->fetch(PDO::FETCH_ASSOC);
            $nom = $secretaire['Nom'];
            $prenom = $secretaire['Prenom'];
            echo '<h1>Bienvenue ' . $prenom . ' ' . $nom . ' !</h1>';
        ?>
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