#!/usr/bin/php
<?php  
	$i = 1;
	while ($argv[$i] != NULL)
	{
		echo trim($argv[$i])."\n";
		$i++;
	}
?>