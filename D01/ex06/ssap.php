#!/usr/bin/php
<?php 

	function ft_split($str)
	{
		$str = trim($str);
		$tab = explode(' ', $str);
		$filter = array_filter($tab);
		return ($str);
	}
	if ($argc < 2) {
		exit();
	}
	$tab = array_merge_recursive($argv);
	unset($tab[0]);

	foreach ($tab as $key => $value) {
		var_dump(str_word_count($value, 1));
		
	}

	//var_dump($tab);


?>