<?php 

	function ft_is_sort($array) {
		$tmp = $array;
		sort($tmp);
		for ($i = 0; $array[$i] && $tmp[$i]; $i++) { 
			if ($array[$i] != $tmp[$i]) {
				return (false);
			}
		}
		return (true);
	}

?>