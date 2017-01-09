#!/usr/bin/php
<?php 

	echo "Entrez un nombre: ";
	while ($in = fgets(STDIN))
	{
		$in = trim($in);
		$number = intval($in);
		if (!is_numeric($in)) {
			echo "'$in' n'est pas un chiffre";
		} elseif ($number % 2 == 0) {
			echo "Le chiffre ".$in." est Pair";
		} else {
			echo "Le chiffre ".$in." est Impair";
		}
		echo "\n";
		echo "Entrez un nombre :";
	}
	echo "\n";

?>