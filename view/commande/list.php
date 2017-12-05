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
      <th>Page de la commande</th>
    </tr>
  </thead>
  <tbody>";


	foreach($tab_p as $k){
		echo "<tr>";
		echo "<td>".$k->getIdC()."</td>";
		echo "<td class=\"mdl-data-table__cell--non-numeric\">".$k->getDate()."</td>";
		echo "<td>".$k->getPrixTotal()."</td>";
		echo "<td><form method=\"get\" action=\"index.php\">
					<input type='hidden' value='read' name='action'>
					<input type='hidden' value='commande' name='controller'> 
					<input type='hidden' value='".$k->getIdC()."' name='idC'> 
					<input type=\"submit\" value=\"Voir commande\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>\n


</form></td>";
		echo "</tr>";
	}
	echo "</tbody></table>";
	if($page>1){
		echo "<a href='index.php?controller=utilisateur&action=read&p=1' class=\"material-icons\">&#xE5DC;</a>";

		echo "<a href='index.php?controller=utilisateur&action=read&p=".($page-1)."' class=\"material-icons\">&#xE5CB;</a>";
	}
	if($page<$maxPage){
		echo "<a href='index.php?controller=utilisateur&action=read&p=".($page+1)."' class=\"material-icons\">&#xE5CC;</a><a href='index.php?controller=utilisateur&action=read&p=".$maxPage."' class=\"material-icons\">&#xE5DD;</a>";
	}