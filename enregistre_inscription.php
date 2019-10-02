<?php

try {
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=tpxss', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

$stmp = $bdd->query('INSERT INTO user (username, password) values ("' . $_POST["newUsername"] . '", "' . $_POST["newPassword"] . '");');


?>

<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="panda">
		<div class="ear"></div>
		<div class="face">
			<div class="eye-shade"></div>
			<div class="eye-white">
				<div class="eye-ball"></div>
			</div>
			<div class="eye-shade rgt"></div>
			<div class="eye-white rgt">
				<div class="eye-ball"></div>
			</div>
			<div class="nose"></div>
			<div class="mouth"></div>
		</div>
		<div class="body"> </div>
		<div class="foot">
			<div class="finger"></div>
		</div>
		<div class="foot rgt">
			<div class="finger"></div>
		</div>
	</div>
	<form action="enregistre_inscription.php" method="POST" class="form-example">
		<div class="hand"></div>
		<div class="hand rgt"></div>
		<h1>Compte créé !</h1>
		<a class="a-css" href="index.php">Retour</a>
	</form>
</body>

</html>