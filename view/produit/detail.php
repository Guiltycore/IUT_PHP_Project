<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:46
	 */
	if ( $p !== FALSE ) {
		echo "<p>
Nom:" . $p -> getNom_p () . "
<br>Prix: " . $p -> getPrix_p () . "
<br>Description:<br><br>" . $p -> getDescription_p ();
		echo "<br><br><a href=index.php?controller=produit&action=update&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $p -> getID_p () ) . ">Update</a> <a href=index.php?controller=produit&action=delete&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $p -> getID_p () ) . ">Delete</a> </p>";
	} else {
		require File ::build_path ( [ 'view' , 'utilisateur' , 'error.php' ] );
	}