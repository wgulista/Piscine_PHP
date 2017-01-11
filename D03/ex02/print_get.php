<?php 

	if (isset($_GET) && !empty($_GET))
	{
		foreach ($_GET as $key => $value) {
			echo $key.": ".$value>."\n";
		}
	}

?>