<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 24/11/17
	 * Time: 10:38
	 */
	echo "<section class=\"mdl-layout__tab-panel is-active\" id=\"fixed-tab-1\">
      <div class=\"page-content\">";
	echo "
	<h1>Information du compte:</h1>
	<div>
	Login:{$u->getLogin()}<br>
	Nom:{$u->getNom()}<br>
	Prenom:{$u->getPrenom()}<br>
	Adresse:{$u->getAdresse()}<br>
	
	Mail:{$u->getMail()}<br>
	Status:";
	if($u->getAdmin()){
		echo "Admin";
	}
	else{
		echo "Utilisateur";
	}


	echo"</div></div>
            </section><section class=\"mdl-layout__tab-panel\" id=\"fixed-tab-2\">
      <div class=\"page-content\">";
	require File::build_path([ "view" , "utilisateur" , "update.php"]);
	echo "</div>
    </section><section class=\"mdl-layout__tab-panel\" id=\"fixed-tab-3\">
      <div class=\"page-content\">";
	require File::build_path([ "view" , "commande" , "list.php"]);
	echo "</div>
    </section><section class=\"mdl-layout__tab-panel\" id=\"fixed-tab-4\">
      <div class=\"page-content\">";
	echo "<form method=\"post\" action=\"index.php\">
		<input type=\"hidden\" name=\"action\" value=\"delete\">
		<input type=\"hidden\" name=\"controller\" value=\"utilisateur\">
			<input type=\"submit\" value=\"Supprimer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>\n


</form>";
	echo "</div>
    </section>";
	echo "";

?>