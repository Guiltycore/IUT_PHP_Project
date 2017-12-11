<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $pagetitle; ?></title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.amber-pink.min.css" />		<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
		<link rel="icon" href="./img/logo_eGoodies.png">
		<?php
		if(isset($style)){
			echo $style;
		}
		?>
	</head>
	<body>

		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs    ">
			<header class="mdl-layout__header">
				<div class="mdl-layout__header-row">
					<!-- Title -->
					<span class="mdl-layout-title"><a href="./index.php">
					<img  alt="logo" src="./img/logo_eGoodies.png" width="100" height="100"></a></span>
					<!-- Add spacer, to align navigation to the right -->
					<div class="mdl-layout-spacer"></div>
					<!-- Navigation. We hide it in small screens. -->
					<nav class="mdl-navigation mdl-layout--large-screen-only">




						<?php
							if ( !isset( $_SESSION[ "login" ] ) ) {
								echo "<form method=\"post\" action=\"index.php?controller=utilisateur&action=connected\">\n
			
			<span class=\"mdl-textfield mdl-js-textfield\">

			<label for='login_id' class=\"mdl-textfield__label\" >Login</label>\n
			<input type='text'  name='login' id='login_id' class=\"mdl-textfield__input\" required/>\n
			</span>
			<span class=\"mdl-textfield mdl-js-textfield\">
			<label for='mdp_id' class=\"mdl-textfield__label\">Mot de passe</label>\n
			<input type='password' name='mdp' id='mdp_id' class=\"mdl-textfield__input\" required>\n
			</span>
			<input type='hidden' name='controller' value='utilisateur'>
			<input type='hidden' name='action' value='connected'>\n
			
			<input type=\"submit\" value=\"Connect\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>\n
		</form>";
							}
						?>
						<a class="mdl-navigation__link" href="index.php?action=update&controller=commande"><span  class="material-icons mdl-badge mdl-badge--overlap" data-badge="<?php

							if(isset($_COOKIE['panier'])){
								$i=0;
								$tab=unserialize($_COOKIE["panier"]);
								foreach($tab as $p){
									$i+=$p;
								}
								echo $i;
							}
							else{
								echo "0";
							}
							?>">&#xE8CC;</span >
						</a>

					</nav>


				</div>
				<?php
					$fp = File ::build_path ( [ "view" , $object , "menu.php" ] );
					require $fp;
				?>
			</header>
			<div class="mdl-layout__drawer">
				<span class="mdl-layout-title">Barre de navigation</span>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="index.php">Home</a>
					<?php
						if(Session::is_admin ()){
							echo "<a class=\"mdl-navigation__link\" href='index.php?action=adminPanel&controller=utilisateur'>Panel Admin</a>";
						}
						if ( !isset( $_SESSION[ "login" ] ) ) {
							echo "<a class=\"mdl-navigation__link\" href='index.php?action=connect&controller=utilisateur'>Se connecter</a>";

							echo "<a class=\"mdl-navigation__link\" href='index.php?action=update&controller=utilisateur'>Créer compte</a>";
						}else{

							echo "<a class=\"mdl-navigation__link\" href='index.php?action=read&controller=utilisateur'>Mon compte</a>\n
								      <a class=\"mdl-navigation__link\" href=\"index.php?action=disconnect&controller=utilisateur\">Disconnect</a>";
						}
					?>
				</nav>
			</div>
			<main class="mdl-layout__content">
				<div class="page-content"><!-- Your content goes here -->

					<?php
						if(isset($_POST["message"])){
							echo "<p>".$_POST["message"]."</p>";
						}
						$filepath = File ::build_path ( [ "view" , $object , "$view.php" ] );
						require $filepath;
					?>
				</div>
			</main>
			<footer class="mdl-mega-footer">
				<div class="mdl-mega-footer__middle-section">
						Site de vente de goodies, eGoodies.com
				</div>
			</footer>
		</div>
	</body>
</html>
