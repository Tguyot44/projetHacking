<?php

if (isset($_GET['t'])) {
	
	$file = 'tokens.txt';
	
	$current = file_get_contents($file);
	
	$current .= $_GET['t'];
	
	file_put_contents($file, $current);
	
} else {
	
}

?>