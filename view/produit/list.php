
<?php
	// Display of the products stored in $tab_p


	echo "<div class=\"mdl-grid\"><div class=\"mdl-cell mdl-cell--12-col\"><h1>Liste des produits</h1></div></div>";
	echo "<div class=\"mdl-grid\">";
	echo "	<div class=\"mdl-cell mdl-cell--12-col\">
			<form action=\"index.php\" method=\"get\">
				<input type='hidden' name = 'action' value = 'search'/>
				<input id=\"search\" type=\"text\" placeholder=\"Rechercher\" name=\"search\"/>
				<input id=\"search-btn\" type=\"submit\" value=\"Rechercher\" />
				<input type='hidden' name = 'controller' value = 'produit'/>
			</form>
		</div> ";


	foreach ( $tab_p as $p ) {
		echo '<a href=\' ./index.php?controller=produit&action=read&'
			.ModelProduit::getPrimary ()
			.'='
			. rawurlencode ( $p -> getID_p () )
			. '\'>'.'<div class="mdl-cell mdl-cell--6-col"><img src=\''
			.$p->getPicP()
			.'\' alt=\'Product Picture\' height="80" width="80"></a>
			<a href="index.php?action=ap&controller=produit&id_p='.$p->getID_p().'" class="material-icons" >&#xE854;</a>
			<br>
			<a href=\'./index.php?controller=produit&action=read&'
			.ModelProduit::getPrimary ()
			.'='
			. rawurlencode ( $p -> getID_p () )
			. '\'>'
			. htmlspecialchars ( $p -> getNom_p () )
			. '.</a>';

		echo '</div>';
	}
	echo "</div><div>";
	if($page>1){
		echo "<a href='index.php?controller=produit&action=".$act."' class=\"material-icons\">&#xE5DC;</a>";
		echo "<a href='index.php?controller=produit&action=".$act."&p=".($page-1)."' class=\"material-icons\">&#xE5CB;</a>";
	}
	if($page<$maxPage){
		echo "<a href='index.php?controller=produit&action=".$act."&p=".($page+1)."' class=\"material-icons\">&#xE5CC;</a><a href='index.php?controller=produit&action=".$act."&p=".$maxPage."' class=\"material-icons\">&#xE5DD;</a>";
	}
	echo "</div>";
?>
<a href="index.php?controller=produit&action=update">Créer produit</a>-<a href="index.php?controller=produit&action=generate&s=10">Generate 10 products</a>


