#!/usr/bin/php
<?php 

	function ft_split($str)
	{
		$str = trim($str);
		$tab = explode(' ', $str);
		$filter = array_filter($tab);
		return ($filter);
	}

	function array_shift_tab($tab)
	{
		$ret = array();
		for ($i=0; $i < count($tab); $i++) { 
			$ret[] = array_shift($tab[$i]);
		}
		return $ret;
	}

	if ($argc < 2) {
		exit();
	}
	$tab = array();
	for ($i = 1; $i < count($argv); $i++) { 
		$tab[] = ft_split($argv[$i]);
	}
	$tab_value = array();
	for ($i = 0; $i < count($tab); $i++) {
		if (count($tab[$i]) > 1) {
			for ($j = 0; $j < count($tab[$i]); $j++) { 
				$tab_value[] = ft_split($tab[$i][$j]);
			}
		}
		else
			$tab[$i] = array_shift($tab[$i]);
	}
	$ret = array_merge($tab, array_shift_tab($tab_value));
	for ($i = 0; $i < count($ret); $i++) { 
		if (is_array($ret[$i]))
		{
			$ret[$i] = array_splice($ret[$i], $i, -1);
			unset($ret[$i]);
		}
	}
	sort($ret);
	for ($i = 0; $i < count($ret); $i++) {
		if ((count($ret) - 1) == $i)
			echo $ret[$i];
		else
			echo $ret[$i]."\n";
	}

?>