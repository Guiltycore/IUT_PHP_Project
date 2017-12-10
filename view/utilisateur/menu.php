<?php
	/**
	 * Created by PhpStorm.
	 * User: Yves
	 * Date: 04/12/2017
	 * Time: 21:41
	 */

	if(isset($_SESSION["login"])&&$view=="detail"){
		if(isset($_GET["p"])){

			echo "
						<!-- Tabs -->
						<div class=\"mdl-layout__tab-bar mdl-js-ripple-effect\">
							<a href=\"#fixed-tab-1\" class=\"mdl-layout__tab\">Informations</a>
							<a href=\"#fixed-tab-2\" class=\"mdl-layout__tab\">Modifier</a>
							<a href=\"#fixed-tab-3\" class=\"mdl-layout__tab  is-active\">Commandes</a>
							<a href=\"#fixed-tab-4\" class=\"mdl-layout__tab\">Supprimer</a>
						</div>";

		}else{
			echo "
						<!-- Tabs -->
						<div class=\"mdl-layout__tab-bar mdl-js-ripple-effect\">
							<a href=\"#fixed-tab-1\" class=\"mdl-layout__tab is-active\">Informations</a>
							<a href=\"#fixed-tab-2\" class=\"mdl-layout__tab\">Modifier</a>
							<a href=\"#fixed-tab-3\" class=\"mdl-layout__tab\">Commandes</a>
							<a href=\"#fixed-tab-4\" class=\"mdl-layout__tab\">Supprimer</a>
						</div>";
		}

	}else if(isset($_SESSION["login"])&&$view=="paneladmin"){
		if(isset($_GET["p"])){

			echo "
						<!-- Tabs -->
						<div class=\"mdl-layout__tab-bar mdl-js-ripple-effect\">
							<a href=\"#fixed-tab-1\" class=\"mdl-layout__tab\">Créer Produit</a>
							<a href=\"#fixed-tab-2\" class=\"mdl-layout__tab\">Créer utilisateur</a>
							<a href=\"#fixed-tab-3\" class=\"mdl-layout__tab  is-active\">Liste utilisateurs</a>
						</div>";

		}else{
			echo "
						<!-- Tabs -->
						<div class=\"mdl-layout__tab-bar mdl-js-ripple-effect\">
							<a href=\"#fixed-tab-1\" class=\"mdl-layout__tab is-active\">Créer Produit</a>
							<a href=\"#fixed-tab-2\" class=\"mdl-layout__tab\">Créer utilisateur</a>
							<a href=\"#fixed-tab-3\" class=\"mdl-layout__tab\">Liste utilisateurs</a>
						</div>";
		}
	}