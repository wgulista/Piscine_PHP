#!/usr/bin/php
<?php 
$char = 'X';
$i = 0;
while ($i < 1000)
{
	(($i != 0) && ($i % 100) == 0)
		echo "\n";
	echo $char;
	$i++;
}
echo "\n";
?>