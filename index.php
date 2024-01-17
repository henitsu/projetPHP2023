<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Gestion d'un cabinet médical</title>
    <link rel="shortcut icon" href="/projetPHP2023/Donnees/patientele_icon.ico" />
    <link rel="stylesheet" href="/projetPHP2023/CSS/base.css">
    <link rel="stylesheet" href="/projetPHP2023/CSS/index.css">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="/projetPHP2023/PHP/menu.php" method="post">
				<h1>Authentification</h1>
				<input name="identifiant" type="text" placeholder="Identifiant" />
				<input type="password" placeholder="Mot de passe" />
				<p>Entrez n'importe quel mot de passe</p>
				<button>Se connecter</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Gestion d'un cabinet médical</h1>
					<img src="/projetPHP2023/Donnees/doctor.png" alt="docteur">
				</div>
			</div>
		</div>
	</div>
</body>
</html>