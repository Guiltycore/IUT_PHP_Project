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
				<ul style="list-style-type : none;">
					<li style="display : inline;padding : 0 0.5em;">
						<a href="index.php">Home</a>
					</li>
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
