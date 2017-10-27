<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:46
	 */
	if ( $v !== FALSE ) {
		echo "<p>
Nom:" . $v -> getNom_p () . "
<br>Prix: " . $v -> getPrix_p () . "
<br>Description<br><br>:" . $v -> getDescription_p ();
		echo "<br><br><a href=index.php?controller=produit&action=update&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $v -> getID_p () ) . ">Update</a> <a href=index.php?controller=produit&action=delete&" . ModelProduit ::getPrimary () . "=" . rawurlencode ( $v -> getID_p () ) . ">Delete</a> </p>";
	} else {
		require File ::build_path ( [ 'view' , 'utilisateur' , 'error.php' ] );
	}