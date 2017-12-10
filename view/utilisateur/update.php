<?php
	if (!is_null($u) ) {
		echo "<form method=\"post\" action=\"index.php?action=updated&controller=utilisateur\" enctype=\"multipart/form-data\">";

		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	
	
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
			<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex : Kerrigan\" name=\"nom\" id=\"nom_id\" value=\"" . $u -> getNom () . "\" required/>
			<label class=\"mdl-textfield__label\" for=\"nom_id\">Nom :</label> 
        </div>
        
		
		
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
			<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex : Sarah\" name=\"prenom\" id=\"prenom_id\" value=\"" . $u -> getPrenom () . "\" required/>
			<label class=\"mdl-textfield__label\" for=\"prenom_id\">Prenom :</label>
        </div>
        
		
		
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
		<input class=\"mdl-textfield__input\" type=\"password\" placeholder=\"Ex : MyLifeForAïur\" name=\"mdp\" id=\"mdp_id\" required/>	
			<label class=\"mdl-textfield__label\" for=\"mdp_id\">Mot de passe :</label>
        </div>
        
		
		
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
		<input class=\"mdl-textfield__input\" type=\"password\" placeholder=\"Ex : MyLifeForAïur\" name=\"mdp_conf\" id=\"mdp_conf_id\" required/>
			<label class=\"mdl-textfield__label\" for=\"mdp_conf_id\">Confirmer mot de passe :</label>
        </div>
        
		
		
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex : 3 rue Shakura\" name=\"adresse\" id=\"adr_id\" value=\"" . $u -> getAdresse () . "\" required/>		
			<label class=\"mdl-textfield__label\" for=\"adr_id\">Adresse :</label>
        </div>
        
		
		<input type=\"hidden\" name=\"login\" value=\"".$u->getLogin()."\">
	
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
	
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"login_idcr\">Login</label> :
		<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex : Zeratul\" name=\"login\" id=\"login_idcr\" required/>
		</div>
				<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"nom_id\">Nom</label> :
		<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex : Raynor\" name=\"nom\" id=\"nom_id\" required/>
		</div>
				<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"prenom_id\">Prenom</label> :
		<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex : Jim\" name=\"prenom\" id=\"prenom_id\" required/>
		</div>
				<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"mdp_idcr\">Mot de passe</label> :
		<input class=\"mdl-textfield__input\" type=\"password\" placeholder=\"Ex : EnTaroTassadar\" name=\"mdp\" id=\"mdp_idcr\" required/>
		</div>
				<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"mdp_conf_id\">Confirmer mot de passe</label>
		<input class=\"mdl-textfield__input\" type=\"password\" placeholder=\"Ex : EnTaroTassadar\" name=\"mdp_conf\" id=\"mdp_conf_id\" required/>
		</div>
				<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"adr_id\">Adresse</label> :
		<input class=\"mdl-textfield__input\" type=\"text\" placeholder=\"Ex :3 rue Adun\" name=\"adresse\" id=\"adr_id\" required/>
		</div>
				<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">

		<label class=\"mdl-textfield__label\" for=\"mail_id\">Mail</label>
		<input class=\"mdl-textfield__input\" name=\"mail\" id=\"mail_id\" type=\"email\" required>
		</div>
	
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>
";
	}
?>
