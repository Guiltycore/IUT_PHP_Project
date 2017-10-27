
<?php
	// Display of the products stored in $tab_p
	echo "<br>Liste des produits<br>";
	foreach ( $tab_p as $p ) {
		echo '<p> <a href=\'./index.php?controller=produit&action=read&'.ModelProduit::getPrimary () .'=' . rawurlencode ( $p -> getID_p () ) . '\'>' . htmlspecialchars ( $p -> getNom_p () ) . '</a>.</p>';

	}
?>
<a href="index.php?controller=produit&action=update">Créer produit</a>

