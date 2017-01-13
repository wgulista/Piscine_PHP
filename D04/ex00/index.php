<?php 
	session_start();
	if (isset($_GET) && isset($_GET['submit']) && $_GET['submit'] == 'OK')
	{
		$_SESSION["login"] = $_GET['login'] ? $_GET['login'] ; "";
		$_SESSION["passwd"] = $_GET['passwd'] ? $_GET['passwd'] : "";
	}
?><html>
	<body>
		<form action="index.php" method="GET">
			<label for="login">Identifiant :</label>
			<input type="text" name="login" value="<?php echo isset($_SESSION["login"]) ? $_SESSION["login"] : ""; ?>">
			<label for="passwd">Mot de passe :</label>
			<input type="password" name="passwd" value="<?php echo isset($_SESSION["passwd"]) ? $_SESSION["passwd"] : ""; ?>">
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>