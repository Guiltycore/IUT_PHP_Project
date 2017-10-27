<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pagetitle; ?></title>
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
			<p style="border: 1px solid black;text-align:right;padding-right:1em;">
				Site de covoiturage de eGoodies.com
			</p>
		</footer>
	</body>
</html>