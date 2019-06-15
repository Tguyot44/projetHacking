<?php
	try{
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=root', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {die('Erreur : '.$e->getMessage());}
	
	//Traitement connexion ou récupération token en cookie
	if(false) {
?>
	<h1>Super tu es connecté !</h1>
<?
	} else {
?>
	<h1>Nop, cherche pas</h1>
	<a href="index.html">Retour</a>
<?
	}
	
?>