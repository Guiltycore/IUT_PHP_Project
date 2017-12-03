<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 17/11/17
	 * Time: 10:07
	 */
	echo "<form method=\"post\" action=\"index.php?controller=utilisateur&action=connected\">\n
			<p>\n
			<span class=\"mdl-textfield mdl-js-textfield\">

			<label for='login_id ' class=\"mdl-textfield__label\" >Login</label>\n
			<input type='text'  name='login' id='login_id' class=\"mdl-textfield__input\" required/>\n
			</span>
			<span class=\"mdl-textfield mdl-js-textfield\">
			<label for='mdp_id' class=\"mdl-textfield__label\">Mot de passe</label>\n
			<input type='password' name='mdp' id='mdp_id' class=\"mdl-textfield__input\" required>\n
			</span>
			<input type='hidden' name='controller' value='utilisateur'>
			<input type='hidden' name='action' value='connected'>\n
			</p>\n
			<input type=\"submit\" value=\"Connect\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>\n
		</form>\n";
	?>