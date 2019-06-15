<?php
	try{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=tpxss', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {die('Erreur : '.$e->getMessage());}
	
	
	$stmt = $bdd->prepare("SELECT userid FROM user WHERE username = :username AND password = :password;");
	$stmt -> bindParam(':username', $_POST["username"]);
	$stmt -> bindParam(':password', $_POST["password"]);
	$connected = false;
	
	
	if(!empty($_COOKIE["token"])) {
		$stmtVerifToken = $bdd->prepare("SELECT userid FROM user WHERE token = :token;");
		$stmtVerifToken -> bindParam(':token', $_COOKIE["token"]);
		
		if($stmtVerifToken->execute()) {
			$verifTokenRow = $stmtVerifToken->fetch();
			
			if(!empty($verifTokenRow["userid"])) {
				$connected = true;
			}
		}
		
	} else if($stmt->execute()) {
		$row = $stmt->fetch();
		if(!empty($row["userid"])) {
			
			$token = uniqid();
			
			setcookie("token", $token);
			
			printf($token);
			
			$stmt = $bdd->prepare("UPDATE user SET token = :token WHERE userid = :userid");
			$stmt -> bindParam(':userid', $row["userid"]);
			$stmt -> bindParam(':token', $token);
			$stmt->execute();
			
			$connected = true;
		}
	}
	
			
	if($connected) {
?>
	<h1>Super tu es connecté !</h1>
<?php
	} else {
?>
	<h1>Nop, cherche pas</h1>
	<a href="index.html">Retour</a>
<?php
	}
	
?>