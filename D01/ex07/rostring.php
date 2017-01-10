#!/usr/bin/php
<?php 

	function ft_split($str)
	{
		$str = trim($str);
		$tab = explode(' ', $str);
		$filter = array_filter($tab);
		return ($filter);
	}

	function ft_swap(&$a, &$b)
	{
		$temp = $a;
		$a = $b;
		$b = $temp;
	}

	function ft_echo_tab($tab)
	{
		for ($i = 0; $i < count($tab); $i++) { 
			if ((count($tab) - 1) == $i)
				echo $tab[$i];
			else
				echo $tab[$i]." ";
		}
		echo "\n";
	}

	if ($argc < 2) {
		exit();
	}
	$ret = ft_split($argv[1]);
	$ret = array_reverse($ret);
	ft_swap($ret[0], $ret[1]);
	ft_echo_tab($ret);
?>