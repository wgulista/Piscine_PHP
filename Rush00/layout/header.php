<?php
	if (session_status() !== PHP_SESSION_ACTIVE)
		session_start();
	if (strstr(getcwd(), "administration")) {
		include dirname(getcwd())."/app/bdd.php";
		include dirname(getcwd())."/app/user.php";
	} else {
		include "./app/bdd.php";
		include "./app/user.php";
	}

?><!DOCTYPE html>
<html>
<head>
	<title>Minishop</title>
	<?php if (strstr(getcwd(), "administration")): ?>
	<link rel="stylesheet" href="<?php echo dirname(dirname($_SERVER['SCRIPT_NAME'])); ?>/layout/css/style.css">
	<?php else: ?>
		<link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/layout/css/style.css">
	<?php endif; ?>
</head>
<body>
	<div class="main">
		<header>
			<div class="container">
				<?php if (strstr(getcwd(), "administration")): ?>
				<div class="logo"><a href="../index.php">Minishop</a></div>
				<nav>
					<?php if (estConnecte() && estAdmin()): ?>
						<a href="index.php">Admin</a>
						<a href="../logout.php">Se deconnecter</a>
					<?php endif; ?>
				</nav>
				<?php else: ?>
				<div class="logo"><a href="index.php">Minishop</a></div>
				<nav>
					<a href="index.php">Accueil</a>
					<a href="panier.php">Panier</a>
					<?php if (!estConnecte()): ?>
					<a href="inscription.php">S'inscrire</a>
					<?php elseif(estConnecte() && estAdmin()): ?>
						<a href="./administration/index.php">Admin</a>
						<a href="profil.php">Profil</a>
						<a href="logout.php">Se deconnecter</a>
					<?php else: ?>
					<a href="../profil.php">Profil</a>
					<a href="logout.php">Se deconnecter</a>
					<?php endif; ?>
				</nav>
				<?php endif; ?>
			</div>
		</header>
		<section>
			<?php
				if (isset($_SESSION['flash']['connect'])) {
					echo "<div class='flash'>".$_SESSION['flash']['connect']."</div>";
					unset($_SESSION['flash']['connect']);
				}
			?>
			<div class="container">
