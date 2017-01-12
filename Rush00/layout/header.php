<?php 
	if (session_status() !== PHP_SESSION_ACTIVE) 
		session_start();
	include "./app/bdd.php";
	include "./app/user.php";
?><!DOCTYPE html>
<html>
<head>
	<title>Minishop</title>
	<link rel="stylesheet" href="<?php echo dirname($_SERVER['SCRIPT_NAME']); ?>/layout/css/style.css">
</head>
<body>
	<div class="main">
		<header>
			<div class="container">
				<div class="logo"><a href="index.php">Minishop</a></div>
				<nav>
					<a href="index.php">Accueil</a>
					<a href="panier.php">Panier</a>
					<?php if (!estConnecte()): ?>
					<a href="inscription.php">S'inscrire</a>
					<?php else: ?>
					<a href="logout.php">Se deconnecter</a>
					<?php endif; ?>
				</nav>
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
