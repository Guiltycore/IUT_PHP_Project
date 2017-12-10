<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:46
	 */
	if ( $product !== FALSE ) {
		echo "<p><img src='".$product->getPicP()."'><br>
Nom:" . $product -> getNom_p () . "
<br>Prix: " . $product -> getPrix_p () . "€
<br>Description:<br><br>" . $product -> getDescription_p ();
		echo "<form method=\"get\" action=\"index.php\" id='panier'>

<input type='hidden' value='produit' name='controller'>

<input type='hidden' value='ap' name='action'>

<input type='hidden' value='".$product->getId_p()."' name='id_p'>
</form>
                    
                    <button type=\"submit\" form=\"panier\" class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\">
                        <i class=\"material-icons\">&#xE854;</i>
                    </button>";
		if(Session::is_admin ()){
			echo "<br><br><a href=index.php?controller=produit&action=update&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $product -> getID_p () ) . ">Update</a> <a href=index.php?controller=produit&action=delete&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $product -> getID_p () ) . ">Delete</a> </p>";
		}




	} else {
		require File ::build_path ( [ 'view' , 'utilisateur' , 'error.php' ] );
	}
	?>