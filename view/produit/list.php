
<?php
	// Display of the products stored in $tab_p


	echo "<h1>Liste des produits</h1>";
	echo "<div class=\"mdl-grid c\">";
	echo "	<div class=\"mdl-cell mdl-cell--12-col\">
			<form action=\"index.php\" method=\"get\">
				<input type='hidden' name = 'action' value = 'search'/>
				<input id=\"search\" type=\"text\" placeholder=\"Rechercher\" name=\"search\"/>
				<input id=\"search-btn\" type=\"submit\" value=\"Rechercher\" />
				<input type='hidden' name = 'controller' value = 'produit'/>
			</form>
		</div> ";


	foreach ( $tab_p as $p )
	{
		echo "<div class=\"mdl-cell mdl-cell--12-col\">";
		echo"<div class=\"demo-card-wide mdl-card mdl-shadow--2dp\">
                 <div class=\"mdl-card__title image".$p -> getID_p ()."\">
                    <h6>". htmlspecialchars ( $p -> getNom_p () )."</h6>
                </div>
                <div class=\"mdl-card__supporting-text\">
                    Prix:".$p->getPrix_p()."€
				</div>
                <div class=\"mdl-card__actions mdl-card--border\">
                    <a href='./index.php?controller=produit&action=read&id_p="
			. rawurlencode ( $p -> getID_p () )
			. "' class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
                    Details du produit ". htmlspecialchars ( $p -> getNom_p () )."
                    </a>
                </div>
                <div class=\"mdl-card__menu\">";
		echo "<form method=\"get\" action=\"index.php\" id='panier".$p -> getID_p ()."'>";
		echo "<input type='hidden' value='produit' name='controller'>";
		echo "<input type='hidden' value='ap' name='action'>";

		echo "<input type='hidden' value='".$p->getID_p()."' name='id_p'>";
		echo "</form>
                    
                    <button type=\"submit\" form=\"panier".$p -> getID_p ()."\" class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\">
                        <i class=\"material-icons\">&#xE854;</i>
                    </button>
                </div>
			</div>
";
echo "</div>";




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
	if(Session::is_admin()){

		echo "<form method='get' action='index.php'> 

						<input type = \"hidden\" name = \"s\" value='10'>
						<input type = \"hidden\" name = \"action\" value='generate'>
  						<input type = \"hidden\" name = \"controller\" value='produit'>
  						<p>
						<input type=\"submit\" value=\"Générer 10 produits\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--colored\"/>
						</p>
					
</form> ";
	}
?>


