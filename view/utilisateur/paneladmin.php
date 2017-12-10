<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 10/12/17
	 * Time: 02:32
	 */
	if(isset($_GET["p"])){

		echo "<section class=\"mdl-layout__tab-panel\" id=\"fixed-tab-1\">";
	}
	else{

		echo "<section class=\"mdl-layout__tab-panel is-active\" id=\"fixed-tab-1\">";
	}
	echo " <div class=\"page-content\">";
	require File::build_path([ "view" , "produit" , "update.php"]);

	echo"
</div>
            </section>
            <section class=\"mdl-layout__tab-panel\" id=\"fixed-tab-2\">
      <div class=\"page-content\">";
	require File::build_path([ "view" , "utilisateur" , "update.php"]);

	if(isset($_GET["p"])){

		echo "</div>
    </section><section class=\"mdl-layout__tab-panel is-active\" id=\"fixed-tab-3\">
      <div class=\"page-content\">";
	}
	else{

		echo "</div>
    </section><section class=\"mdl-layout__tab-panel\" id=\"fixed-tab-3\">
      <div class=\"page-content\">";
	}
	require File::build_path([ "view" , "utilisateur" , "list.php"]);
	echo "</div>
    </section>";
