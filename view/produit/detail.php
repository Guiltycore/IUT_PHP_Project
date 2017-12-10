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
		if(Session::is_admin ()){
			echo "<br><br><a href=index.php?controller=produit&action=update&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $product -> getID_p () ) . ">Update</a> <a href=index.php?controller=produit&action=delete&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $product -> getID_p () ) . ">Delete</a> </p>";
		}
	} else {
		require File ::build_path ( [ 'view' , 'utilisateur' , 'error.php' ] );
	}
	?>