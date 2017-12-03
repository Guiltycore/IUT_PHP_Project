<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:10
	 */
	if ( isset($_GET[ModelProduit::getPrimary () ]) ) {
		echo "<form method=\"post\" action=\"index.php?action=updated&controller=produit\" enctype=\"multipart/form-data\">";

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

		<label for='pic_p_id'>Image</label>
		<input type = \"file\" name = \"pic_p\" class = \"pic_p_id\" style=\"width:800px;\" >    

		<input type='hidden' name='id_p' value='".$_GET[ ModelProduit::getPrimary () ]."'>
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>";
	} else {
		echo "<form method=\"post\" action=\"index.php?action=created&controller=produit\" enctype=\"multipart/form-data\">";

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

		<label for='pic_p_id'>Image</label>
		<input type = \"file\" name = \"pic_p\" class = \"pic_p_id\" style=\"width:800px;\" >   
		
	</p>
	<p>
		<input type=\"submit\" value=\"Envoyer\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
	</p>
</fieldset>
</form>
";
	}
	?>