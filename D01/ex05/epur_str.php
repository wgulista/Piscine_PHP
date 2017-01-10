#!/usr/bin/php
<?php 
	if ($argc != 2) {
		exit();
	}
	$argv[1] = trim($argv[1]);
	$tab = explode(' ', $argv[1]);
	$filter = array_filter($tab);
	$argv[1] = implode(' ', $filter);
	echo $argv[1]."\n";

?>