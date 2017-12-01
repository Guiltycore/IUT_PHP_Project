<?php
	// Display of the products stored in $tab_p
	echo "<br>Contenu du panier<br>";
	foreach ( $tab_p as $p ) {
		echo '<p><img src=\''.$p->getPicP().'\'height="80" width="80"><br><a href=\'./index.php?controller=produit&action=read&'.ModelProduit::getPrimary () .'=' . rawurlencode ( $p -> getID_p () ) . '\'>' . htmlspecialchars ( $p -> getNom_p () ) . '</a>.</p>';
	}
?>
<a href="index.php?controller=produit&action=update">Créer produit</a>-<a href="index.php?controller=produit&action=generate&s=10">Generate 10 products</a>
