<?php
	// Display of the products stored in THE PANIER
	echo "<br>Contenu du panier<br>";
	if (!isset($_COOKIE['panier'])) {
		//$tab = unserialize($_COOKIE["panier"]);	//à mettre dans le routeur
		foreach ( $tab_p as $k=>$p ) {
			echo '<p><img src=\''
				.$p->getPicP()
				.'\' alt=\'Product Picture\' height="80" width="80">
				<br>
				<a href=\'./index.php?controller=produit&action=read&'
				.ModelProduit::getPrimary ()
				.'='
				. rawurlencode ( $p -> getID_p () )
				. '\'>'
				. htmlspecialchars ( $p -> getNom_p () )
				. '</a></p>';
		}
		
	}
	else {
		echo "Votre panier est vide !";
	}
	
?>
