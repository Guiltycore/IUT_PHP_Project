<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pagetitle; ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<header>
			<nav>
				<ul id="liste">
					<li>
						<a href="index.php">Home</a>
					</li>
					<?php
						if ( !isset( $_SESSION[ "login" ] ) ) {
							echo "<li><a href=\"index.php?action=connect&controller=utilisateur\">Connect</a></li>\n<li><a href='index?action=update&controller=utilisateur'>Créer compte</a></li>";
						}
						else {
							echo "<li><a href=\"index.php?action=disconnect&controller=utilisateur\">Disconnect</a></li>";
						}
					?>

				</ul>
			</nav>
		</header>
		<?php
			$filepath = File ::build_path ( [ "view" , $object , "$view.php" ] );
			require $filepath;
		?>
		<footer>
			<p>
				Site de covoiturage de eGoodies.com
			</p>
		</footer>
	</body>
</html>
