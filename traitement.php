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
		
	}
	if(!$connected && $stmt->execute()) {
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
<html>
	<head>
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
			  <form action="deconnexion.php" method="POST" class="form-example">
				<div class="hand"></div>
				<div class="hand rgt"></div>
				<h1>Super tu es connecté !</h1>
				<div class="form-group">
				  
				  <button class="btn">Déconnexion </button>
				</div>
			  </form>
			  
</body>
</html>
<?php
	} else {
?>
<html>
	<head>
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
			  <form action="index.html" method="POST" class="form-example">
				<div class="hand"></div>
				<div class="hand rgt"></div>
				<h1>Nope, cherche pas</h1>
				<div class="form-group">
				  
				  <button class="btn">Retour </button>
				</div>
			  </form>
			  
</body>
</html>
<?php
	}
	
?>