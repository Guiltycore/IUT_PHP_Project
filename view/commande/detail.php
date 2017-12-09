<?php
	/**
	 * Created by PhpStorm.
	 * User: Yves
	 * Date: 04/12/2017
	 * Time: 22:07
	 */
	echo "<table class=\"mdl-data-table mdl-js-data-table  mdl-shadow--2dp\">
  <thead>
    <tr>
      <th class=\"mdl-data-table__cell--non-numeric\">Nom</th>
      <th>Prix unitaire</th> 
      <th>Quantité</th>
      <th>Page du produit</th>
    </tr>
  </thead>
  <tbody>";
	foreach ($tab_p as $key=>$value){
		$product=unserialize ($key);
		echo "<tr>";

		echo "<td class=\"mdl-data-table__cell--non-numeric\"><img src='"
			.$product->getPicP()
			."' alt='Product Picture' height=\"80\" width=\"80\">".$product -> getNom_p ()."</td>";
		echo "<td>".$product->getPrix_p()."</td>";
		echo "<td>".$value."</td>";
		echo "<td class=\"mdl-data-table__cell--non-numeric\"><form method=\"get\" action=\"index.php\">
					<input type='hidden' value='read' name='action'>
					<input type='hidden' value='produit' name='controller'> 
					<input type='hidden' value='".$product->getID_p()."' name='id_p'> 
					<input type=\"submit\" value=\"Voir produit\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>\n


</form></td>";
		echo "</tr>";


	}
	echo "</tbody></table>";

	if($page>1){
		echo "<a href='index.php?controller=commande&action=read&p=1&idC=".$l."' class=\"material-icons\">&#xE5DC;</a>";

		echo "<a href='index.php?controller=commande&action=read&p=".($page-1)."&idC=".$l."' class=\"material-icons\">&#xE5CB;</a>";
	}
	if($page<$maxPage){
		echo "<a href='index.php?controller=commande&action=read&p=".($page+1)."&idC=".$l."' class=\"material-icons\">&#xE5CC;</a><a href='index.php?controller=commande&action=read&p=".$maxPage."&idC=".$l."' class=\"material-icons\">&#xE5DD;</a>";
	}