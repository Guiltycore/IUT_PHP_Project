<?php
	// Display of the products stored in THE PANIER
	echo "<br>Contenu du panier<br>";
	if (count($tab_p)>0) {
		//$tab = unserialize($_COOKIE["panier"]);	//à mettre dans le routeur
		foreach ( $tab_p as $k=>$p ) {
			$l=unserialize($k);
			echo '<p><a href=\'./index.php?controller=produit&action=read&'
				.ModelProduit::getPrimary ()
				.'='
				. rawurlencode ( $l -> getID_p () )
				. '\'><img src=\''
				.$l->getPicP()
				.'\' alt=\'Product Picture\' height="80" width="80"></a>
				<br>'
				. htmlspecialchars ( $l -> getNom_p () )
				. '<br>Price:'.($l->getPrix_p()*$p).'<br>Quantité:'.$p.'</p>';
		}
	}
	else {
		echo "Votre panier est vide !";
	}
	
?>
