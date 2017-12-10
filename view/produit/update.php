<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:10
	 */
	if (isset( $_GET[ ModelProduit ::getPrimary() ] )) {
		echo "<form class='mdl-grid c' method=\"post\" action=\"index.php?action=updated&controller=produit\" enctype=\"multipart/form-data\">";

		$v = ModelProduit ::select( $_GET[ ModelProduit ::getPrimary() ] );
		echo "<fieldset>
	<legend>Mettre à jour le produit :</legend>
	<p>
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
            <input class=\"mdl-textfield__input\" placeholder=\"Ex : Patate\" type=\"text\" name=\"nom_p\" id=\"nom_p_id\" value=\"" . $v -> getNom_p() . "\" required>
             <label class=\"mdl-textfield__label\" for=\"nom_p_id\">Nom</label>
        </div>
        
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
            <textarea class=\"mdl-textfield__input\" placeholder=\"Ex : Ce produit est utile !\" name=\"description_p\" type=\"text\" rows= \"5\" id=\"description_p_id\" required/>" . $v -> getDescription_p() . "</textarea>
            <label class=\"mdl-textfield__label\" for=\"description_p_id\">Description</label>
        </div>
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--12-col\">
            <input class=\"mdl-textfield__input\" placeholder=\"35\"value=\"" . $v -> getPrix_p() . "\" name=\"prix_p\" type=\"text\" pattern=\"-?[0-9]*(\.[0-9]+)?\" id=\"prix_p_id\" required>
            <label class=\"mdl-textfield__label\" for=\"prix_p_id\">Prix</label>
            <span class=\"mdl-textfield__error\">Ceci n'est pas un nombre !</span>
        </div>
        <div class='mdl-cell mdl-cell--12-col'>
		
			<label for='pic_p_id'>Image</label>
			<input type = \"file\" name = \"pic_p\" class = \"pic_p_id\"  >  
		</div>  

		<input type='hidden' name='id_p' value='" . $_GET[ ModelProduit ::getPrimary() ] . "'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>";
	} else {
		echo "<form class='mdl-grid c' method=\"post\" action=\"index.php?action=created&controller=produit\" enctype=\"multipart/form-data\">";

		echo "
<fieldset>
	<legend>Créer produit :</legend>
	<p>
		
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
            <input class=\"mdl-textfield__input\" type=\"text\" name=\"nom_p\" id=\"nom_p_id\" required>
             <label class=\"mdl-textfield__label\" for=\"nom_p_id\">Nom</label>
        </div>
		
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
            <textarea class=\"mdl-textfield__input\" name=\"description_p\" type=\"text\" rows= \"5\" id=\"description_p_id\" required/></textarea>
            <label class=\"mdl-textfield__label\" for=\"description_p_id\">Description</label>
        </div>
		<div class=\"mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col\">
            <input class=\"mdl-textfield__input\"  name=\"prix_p\" type=\"text\" pattern=\"-?[0-9]*(\.[0-9]+)?\" id=\"prix_p_id\" required>
            <label class=\"mdl-textfield__label\" for=\"prix_p_id\">Prix</label>
        </div>
		<div class='mdl-cell mdl-cell--12-col'>
		
			<label for='pic_p_id'>Image</label>
			<input type = \"file\" name = \"pic_p\" class = \"pic_p_id\"  >  
		</div> 
		
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>
";
		if(Session::is_admin()){

			echo "<p><form method='get' action='index.php'> 
						
						<input type = \"hidden\" name = \"s\" value='10'>
						<input type = \"hidden\" name = \"action\" value='generate'>
  						<input type = \"hidden\" name = \"controller\" value='produit'>


</form> ";
		}
	}
?>