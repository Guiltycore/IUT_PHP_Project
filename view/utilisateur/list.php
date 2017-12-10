<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 24/11/17
	 * Time: 10:39
	 */
	echo "<table class=\"mdl-data-table mdl-js-data-table  mdl-shadow--2dp\">
  <thead>
    <tr>
      <th class=\"mdl-data-table__cell--non-numeric\">Login</th> 
      <th class=\"mdl-data-table__cell--non-numeric\">Nom</th>
      <th class=\"mdl-data-table__cell--non-numeric\">Prénom</th>
      <th class=\"mdl-data-table__cell--non-numeric\">Page de l'utilisateur</th>
    </tr>
  </thead>
  <tbody>";
	foreach ($tab_p as $v){

		echo "<tr>";
		echo "<td class=\"mdl-data-table__cell--non-numeric\">".$v->getLogin()."</td>";
		echo "<td class=\"mdl-data-table__cell--non-numeric\">".$v->getNom()."</td>";
		echo "<td class=\"mdl-data-table__cell--non-numeric\">".$v->getPrenom()."</td>";
		echo "<td>";
		echo  "<form method=\"get\" action=\"index.php\">
					<input type='hidden' value='read' name='action'>
					<input type='hidden' value='utilisateur' name='controller'> 
					<input type='hidden' value='".$v->getLogin()."' name='login'> 
					<input type=\"submit\" value=\"Voir l'utilisateur\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
				</form>";
		echo "</td>";
		echo "</tr>";

	}

	echo "</tbody></table>";
	if($page>1){
		echo "<a href='index.php?controller=utilisateur&action=adminPanel&p=1' class=\"material-icons\">&#xE5DC;</a>";

		echo "<a href='index.php?controller=utilisateur&action=adminPanel&p=".($page-1)."' class=\"material-icons\">&#xE5CB;</a>";
	}
	if($page<$maxPage){
		echo "<a href='index.php?controller=utilisateur&action=adminPanel&p=".($page+1)."' class=\"material-icons\">&#xE5CC;</a><a href='index.php?controller=utilisateur&action=adminPanel&p=".$maxPage."' class=\"material-icons\">&#xE5DD;</a>";
	}