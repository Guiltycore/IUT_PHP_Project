
<?php
	// Display of the products stored in $tab_p



	echo "<br>Liste des produits<br>";

	foreach ( $tab_p as $p ) {
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
			. '</a>.';
		echo "<form method=\"get\" action=\"index.php?action=ap&controller=produit\">
				<input type='hidden' name='id_p' value='".$p->getID_p()."'>
				<input type=\"submit\" value=\"Ajouter au panier\"/>

		</form>
		";

		echo '</p>';
	}
	echo "<div>";
	if($page>1){
		echo "<a href='index.php?controller=produit&action=readAll&p=".($page-1)."'>Previous</a>-";
	}
	if($page<$maxPage){
		echo "<a href='index.php?controller=produit&action=readAll&p=".($page+1)."'>Next</a>-<a href='index.php?controller=produit&action=readAll&p=".$maxPage."'>Last</a>";
	}
	echo "</div>";
?>
<a href="index.php?controller=produit&action=update">Créer produit</a>-<a href="index.php?controller=produit&action=generate&s=10">Generate 10 products</a>


