<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:10
	 */
	echo "<form method=\"get\" action=\"index.php\">";
	if ( isset($_GET[ModelProduit::getPrimary () ]) ) {
		$v = ModelProduit ::select ( $_GET[ModelProduit::getPrimary () ] );
		echo "<fieldset>
	<legend>Mon formulaire :</legend>
	<p>
	
		<label for=\"nom_p_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Chips Lays!\" name=\"nom_p\" id=\"nom_p_id\" value=\"" . $v->getNom_p() . "\" required/>
		
		<label for=\"description_p_id\">Description</label> :
		<input type=\"textarea\" placeholder=\"Ex : Produit de Auchan ! Chipse pur!\" name=\"description_p\" id=\"description_p_id\" value=\"" . $v -> getDescription_p () . "\" required/>
		
		<label for=\"prix_p_id\">Prix</label> :
		<input type=\"text\" placeholder=\"Ex : 30€\" name=\"prix_p\" id=\"prix_p_id\" value=\"" . $v -> getPrix_p () . "\" required/>
		
		<input type='hidden' name='id_p' value='".$_GET[ ModelProduit::getPrimary () ]."'>
		<input type='hidden' name='action' value='updated'>
		<input type='hidden' name='controller' value='produit'>
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
		
		<label for=\"nom_p_id\">Nom</label> :
		<input type=\"text\" placeholder=\"Ex : Chips Lays!\" name=\"nom_p\" id=\"nom_p_id\" required/>
		
		<label for=\"description_p_id\">Description</label> :
		<input type=\"textarea\" placeholder=\"Ex : Produit de Auchan ! Chipse pur!\" name=\"description_p\" id=\"description_p_id\"  required/>
		
		<label for=\"prix_p_id\">Prix</label> :
		<input type=\"text\" placeholder=\"Ex : 30€\" name=\"prix_p\" id=\"prix_p_id\" required/>
		
		<input type='hidden' name='action' value='created'>
		<input type='hidden' name='controller' value='produit'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\"/>
	</p>
</fieldset>
</form>
";
	}