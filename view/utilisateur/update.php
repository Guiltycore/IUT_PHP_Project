<?php
	echo "<form method=\"get\" action=\"index.php?\">";
	if ( isset($_GET[ModelUser::getPrimary ()]) ) {
		$v = ModelUser ::select ( $_GET[ModelUser::getPrimary ()]);
		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
		<label for=\"nom_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Daniel\" name=\"nom\" id=\"nom_id\" value=\"" . $v -> getNom () . "\" required/>
		<label for=\"prenom_id\">Prenom</label> :
		<input type=\"text\" placeholder=\"Ex : Yves\" name=\"prenom\" id=\"prenom_id\" value=\"" . $v -> getPrenom () . "\" required/>
		
		<label for=\"mdp_id\">Mot de passe</label> :
		<input type=\"password\" placeholder=\"Ex :Gh;]Yv < ZKM_87 ^%E\" name=\"mdp\" id=\"mdp_id\" required/>	
		<label for='mdp_conf_id'>Confirmer mot de passe</label>
		<input type='password' placeholder='Ex :Gh;]Yv<ZKM_87^%E\' name='mdp_conf' id='mdp_conf_id' required/>
		
		<label for=\"adr_id\">Adresse</label> :
		<input type=\"adresse\" placeholder=\"Ex :3 rue bibi\" name=\"adr\" id=\"adr_id\" value=\"" . $v -> getAdresse () . "\" required/>		
		
		<input type='hidden' name='login' value='".$v->getLogin()."'>
		<input type='hidden' name='action' value='updated'>
		<input type='hidden' name='controller' value='utilisateur'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>";
	} else {
		echo "
<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
		<label for=\"login_id\">Login</label> :
		<input type=\"text\" placeholder=\"Ex : daniely\" name=\"login\" id=\"login_id\" required/>
		<label for=\"nom_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Daniel\" name=\"nom\" id=\"nom_id\" required/>
		<label for=\"prenom_id\">Prenom</label> :
		<input type=\"text\" placeholder=\"Ex : Yves\" name=\"prenom\" id=\"prenom_id\" required/>
		
		<label for=\"mdp_id\">Mot de passe</label> :
		<input type=\"password\" placeholder=\"Ex : Gh;]Yv < ZKM_87 ^%E\" name=\"mdp\" id=\"mdp_id\" required/>
		<label for='mdp_conf_id'>Confirmer mot de passe</label>
		<input type='password' placeholder='Ex :Gh;]Yv<ZKM_87^%E\' name='mdp_conf' id='mdp_conf_id' required/>
		
		<input type=\"hidden\" name=\"admin\" value=\"0\" />
		<label for=\"admin_id\">Admin</label>
		<input id=\"admin_id\" type=\"checkbox\" name=\"admin\" value=\"1\" >
		
		<label for=\"adr_id\">Adresse</label> :
		<input type=\"adresse\" placeholder=\"Ex :3 rue bibi\" name=\"adr\" id=\"adr_id\" required/>
		
		<label for=\"mail_id\">Mail</label>
		<input name=\"mail\" id=\"mail_id\" type=\"email\">
		
		<input type='hidden' name='action' value='created'>
		<input type='hidden' name='controller' value='utilisateur'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>
";
	}
?>
