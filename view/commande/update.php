<?php
	// Display of the products stored in THE PANIER

	if (count($tab_p)>0) {
		echo "Contenu du panier
";
		echo "<form method=\"get\" action=\"index.php\">";
		echo "<input type='hidden' value='commande' name='controller'>";
		echo "<input type='hidden' value='delete' name='action'>";


		echo "<input type='hidden' value='null' name='idC'>";
		echo "<input type='submit' value='Réinitialiser le panier' class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">";
		echo "</form><br>";
		echo "<form method=\"post\" action=\"index.php?action=created&controller=commande\">";
		echo "<table class=\"mdl-data-table mdl-js-data-table  mdl-shadow--2dp\">
  <thead>
    <tr>
      <th class=\"mdl-data-table__cell--non-numeric\">Produit</th>
      <th>Quantitée</th>
      <th>Prix unitaire</th>
    </tr>
  </thead>
  <tbody>
";
		foreach ( $tab_p as $k=>$p ) {
			$l=unserialize($k);
			echo '<tr>'
				.'<td class="mdl-data-table__cell--non-numeric"><a href=\'./index.php?controller=produit&action=read&' .ModelProduit::getPrimary () .'=' . rawurlencode ( $l -> getID_p () ) . '\'>'
				.'<img src=\'' .$l->getPicP() .'\' alt=\'Product Picture\' height="80" width="80"></a>'
				. htmlspecialchars ( $l -> getNom_p () )
				. '</td>'
				.'<td>'
				.'<input type="number" name="'.$l->getID_p().'" value="'.$p.'">'.'</td>'
				.'<td>'.$l->getPrix_p().'€</td>'
				.'</tr>';
		}
		echo "</tbody></table>";
		echo "<br>";
		echo "<input type=\"submit\" name=\"createorupdate\" value=\"Mettre à jour le panier\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">";
		if(isset($_SESSION["login"])){
			echo "&nbsp;<input type=\"submit\" name=\"createorupdate\" value=\"Commander\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\">";
		}
		echo "</form>";

	}
	else {
		echo "Votre panier est vide !";
	}
	
?>
