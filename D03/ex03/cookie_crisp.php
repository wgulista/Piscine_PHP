<?php 

	if (isset($_GET) && !empty($_GET))
	{

		foreach ($_GET as $key => $value) {
			if ($key == 'action'){
				$action = $value;
			} else if ($key == 'name') {
				$name = $value;
			} else if ($key == 'value') {
				$val = $value;
			}
		}

		if ($action == "get")
		{
			if (!empty($name) && $_COOKIE[$name])
				echo $_COOKIE[$name]."\n";
		}
		else if ($action == "set")
		{
			if (!empty($name) && !empty($val))
				setcookie ($name, $val, time() - 3600,  "cookie.txt");
		}
		else if ($action == "del")
		{
			if (!empty($name))
				setcookie ($name, "", time() - 3600,  "cookie.txt");

		}
	}

?>