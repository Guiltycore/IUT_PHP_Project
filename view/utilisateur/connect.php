<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 17/11/17
	 * Time: 10:07
	 */
	echo "<form method=\"get\" action=\"index.php\">\n
			<p>\n
			<label for='login_id'>Login</label> :\n
			<input type='text'  name='login' id='login_id_id' required/>\n
			<label for='mdp_id'>Mot de passe</label>\n
			<input type='password' name='mdp' id='mdp_id' required>\n
			<input type='hidden' name='controller' value='utilisateur'>
			<input type='hidden' name='action' value='connected'>\n
			</p>\n
			<input type=\"submit\" value=\"Connect\"/>\n
		</form>\n";
	?>