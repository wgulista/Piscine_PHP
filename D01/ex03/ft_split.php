<?php 

function ft_split($str) {
	$tab = explode(' ', $str);
	$ret = array();
	for ($i = 0; $i < count($tab); $i++) { 
		if ($tab[$i] != NULL)
			$ret[] = $tab[$i];
	}
	sort($ret);
	return ($ret);
}

?>