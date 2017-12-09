<?php
	/**
	 * Created by PhpStorm.
	 * User: Yves
	 * Date: 04/12/2017
	 * Time: 21:41
	 */
	if(isset($_SESSION["login"])){
		if(isset($_GET["p"])){

			echo "
						<!-- Tabs -->
						<div class=\"mdl-layout__tab-bar mdl-js-ripple-effect\">
							<a href=\"#fixed-tab-1\" class=\"mdl-layout__tab\">Mes informations</a>
							<a href=\"#fixed-tab-2\" class=\"mdl-layout__tab\">Modifier</a>
							<a href=\"#fixed-tab-3\" class=\"mdl-layout__tab  is-active\">Mes commandes</a>
							<a href=\"#fixed-tab-4\" class=\"mdl-layout__tab\">Supprimer</a>
						</div>";

		}else{
			echo "
						<!-- Tabs -->
						<div class=\"mdl-layout__tab-bar mdl-js-ripple-effect\">
							<a href=\"#fixed-tab-1\" class=\"mdl-layout__tab is-active\">Mes informations</a>
							<a href=\"#fixed-tab-2\" class=\"mdl-layout__tab\">Modifier</a>
							<a href=\"#fixed-tab-3\" class=\"mdl-layout__tab\">Mes commandes</a>
							<a href=\"#fixed-tab-4\" class=\"mdl-layout__tab\">Supprimer</a>
						</div>";
		}

	}