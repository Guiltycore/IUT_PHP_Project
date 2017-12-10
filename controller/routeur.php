<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 29/09/17
	 * Time: 10:24
	 */

	session_start();
	require_once File ::build_path ( [ 'controller' , 'ControllerUtilisateur.php' ] );
	require_once File ::build_path ( [ 'controller' , 'ControllerProduit.php' ] );
	require_once File ::build_path ( [ 'controller' , 'ControllerCommande.php' ] );

	require_once ( File ::build_path ( [ "model" , "ModelProduit.php" ] ) );
	require_once ( File ::build_path ( [ "model" , "ModelUtilisateur.php" ] ) );
	require_once ( File ::build_path ( [ "model" , "ModelCommande.php" ] ) );

	// On recupère l'action passée dans l'URL
	// À remplir, voir Exercice 5.2
	// Appel de la méthode statique $action de ControllerVoiture
	if ( isset( $_GET[ 'controller' ] ) ) {

		$controller = $_GET[ 'controller' ];
		$model_class;
		$model_class = 'Model' . ucfirst ( $controller );

		$controller_class = 'Controller' . ucfirst ( $controller );

		if ( class_exists ( $controller_class ) ) {

			if ( isset( $_GET[ 'action' ] ) ) {
				$action = $_GET[ "action" ];

				switch ( $action ) {
					case "readAll":
						if(isset($_GET['p'])){
							$controller_class ::readAll ($_GET['p']);
						}else{
							$controller_class ::readAll (1);
						}
						break;
					case "read":
						if(isset($_GET[$model_class::getPrimary()])){
							if(isset($_GET['p'])){
								$controller_class ::read ($_GET[ $model_class::getPrimary ()],$_GET['p']);
							}else{
								$controller_class ::read ($_GET[ $model_class::getPrimary ()],1);
							}
						}
						else{
							if(isset($_GET['p'])){
								$controller_class ::read (NULL,$_GET['p']);
							}else{
								$controller_class ::read (NULL,1);
							}
						}
						break;
					case "create":
						$controller_class ::create ();
						break;
					case "created":
						$data= array ();
						foreach ($_POST as $k=>$v){
							if(strcmp($k,"action")!=0&& strcmp($k,"controller")!=0){
								$data+=[$k=>$v];
							}
						}
						$controller_class ::created ( $data );
						break;
					case "delete":
						$controller_class ::delete ( $_GET[ $model_class::getPrimary ()] );
						break;
					case "update":
						if(isset($_GET[ $model_class::getPrimary () ] )){
							$controller_class ::update ( $_GET[ $model_class::getPrimary ()] );

						}
						else{
							$controller_class ::update ( NULL );
						}
						break;
					case "updated":

						$data= array ();
						foreach ($_POST as $k=>$v){
							if(strcmp($k,"action")!=0&& strcmp($k,"controller")!=0){
								$data+=[$k=>$v];
							}

						}
						$controller_class ::updated ( $data );
						break;
					case "connect":
						$controller_class::connect();
						break;
					case "connected":
						$controller_class::connected($_POST["login"],$_POST["mdp"]);
						break;
					case "disconnect":
						$controller_class::disconnect();
						break;
					case "validate":
						$controller_class::validate($_GET["login"],$_GET["nonce"]);
						break;
					case "ap":
						$controller_class::ajouterAuPanier($_GET["id_p"]);
						break;
					case "panier":
						$controller_class::panier();
						break;
					case "search":
						if(isset($_GET["p"])){
							$controller_class::search($_GET["search"],$_GET["p"]);

						}else{
							$controller_class::search($_GET["search"],1);
						}
						break;
					case "adminPanel":
						if(isset($_GET["p"])){
							$controller_class::panelAdmin($_GET["p"]);

						}else{
							$controller_class::panelAdmin(1);
						}
						break;
					default:
						$controller_class ::err ();
						break;
				}
			} else {
				$controller_class ::readAll ();
			}
		} else {

			require File::build_path (["view","main","error.php"]);
		}
	} else {
		ControllerProduit::readAll (1);
	}
?>
