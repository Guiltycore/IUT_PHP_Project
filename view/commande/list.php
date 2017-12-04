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
      <th class=\"mdl-data-table__cell--non-numeric\">Numero de commande</th>
      <th>Date</th> 
      <th>Prix total</th>
    </tr>
  </thead>
  <tbody>";


	foreach($tab_p as $k){
		echo "<tr>";
		echo "<td>".$k->getIdC()."</td>";
		echo "<td class=\"mdl-data-table__cell--non-numeric\">".$k->getDate()."</td>";
		echo "<td>".$k->getPrixTotal()."</td>";
		echo "</tr>";
	}
	echo "</tbody></table>";
	if($page>1){
		echo "<a href='index.php?controller=produit&action=readAll&p=".($page-1)."'>Previous</a>-";
	}
	if($page<$maxPage){
		echo "<a href='index.php?controller=produit&action=readAll&p=".($page+1)."'>Next</a>-<a href='index.php?controller=produit&action=readAll&p=".$maxPage."'>Last</a>";
	}