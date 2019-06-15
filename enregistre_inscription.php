<?php 
		
			try{
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=tpxss', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(Exception $e) {die('Erreur : '.$e->getMessage());}

			$stmp = $bdd->query('INSERT INTO user (username, password) values ("'.$_POST["newUsername"].'", "'.$_POST["newPassword"].'");');
			
			
?>
