<?php
	if (!is_null($u) ) {
		echo "<form method=\"post\" action=\"index.php?action=updated&controller=utilisateur\" enctype=\"multipart/form-data\">";

		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
		<label for=\"nom_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Kerrigan\" name=\"nom\" id=\"nom_id\" value=\"" . $u -> getNom () . "\" required/>
		<label for=\"prenom_id\">Prenom</label> :
		<input type=\"text\" placeholder=\"Ex : Sarah\" name=\"prenom\" id=\"prenom_id\" value=\"" . $u -> getPrenom () . "\" required/>
		
		<label for=\"mdp_id\">Mot de passe</label> :
		<input type=\"password\" placeholder=\"Ex : MyLifeForAïur\" name=\"mdp\" id=\"mdp_id\" required/>	
		<label for=\"mdp_conf_id\">Confirmer mot de passe</label>
		<input type=\"password\" placeholder=\"Ex : MyLifeForAïur\" name=\"mdp_conf\" id=\"mdp_conf_id\" required/>
		
		<label for=\"adr_id\">Adresse</label> :
		<input type=\"adresse\" placeholder=\"Ex : 3 rue Shakura\" name=\"adresse\" id=\"adr_id\" value=\"" . $u -> getAdresse () . "\" required/>		
		
		<input type=\"hidden\" name=\"login\" value=\"".$u->getLogin()."\">
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>";
	} else {
		echo "<form method=\"post\" action=\"index.php?action=created&controller=utilisateur\" enctype=\"multipart/form-data\">";

		echo "
<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
		<label for=\"login_id\">Login</label> :
		<input type=\"text\" placeholder=\"Ex : Zeratul\" name=\"login\" id=\"login_id\" required/>
		<label for=\"nom_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Raynor\" name=\"nom\" id=\"nom_id\" required/>
		<label for=\"prenom_id\">Prenom</label> :
		<input type=\"text\" placeholder=\"Ex : Jim\" name=\"prenom\" id=\"prenom_id\" required/>
		
		<label for=\"mdp_id\">Mot de passe</label> :
		<input type=\"password\" placeholder=\"Ex : EnTaroTassadar\" name=\"mdp\" id=\"mdp_id\" required/>
		<label for=\"mdp_conf_id\">Confirmer mot de passe</label>
		<input type=\"password\" placeholder=\"Ex : EnTaroTassadar\" name=\"mdp_conf\" id=\"mdp_conf_id\" required/>
		
		<label for=\"adr_id\">Adresse</label> :
		<input type=\"adresse\" placeholder=\"Ex :3 rue Adun\" name=\"adresse\" id=\"adr_id\" required/>
		
		<label for=\"mail_id\">Mail</label>
		<input name=\"mail\" id=\"mail_id\" type=\"email\">
		
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>
";
	}
?>
