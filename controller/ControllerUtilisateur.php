<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 24/11/17
	 * Time: 10:35
	 */

	require_once ( File ::build_path ( [ "model" , "ModelUtilisateur.php" ] ) );
	require_once ( File ::build_path ( [ "model" , "ModelCommande.php" ] ) );

	class ControllerUtilisateur
	{

		protected static $listMax=10;
		protected static $object;
		public static function readAll ($p)
		{
			if(Session::is_admin ()){

				$tab = ModelUtilisateur ::selectAll ();     //appel au modèle pour gerer la BD

				$page=$p>0?$p:1;
				$maxPage=ceil(count ($tab)/self::$listMax);
				$tab_p= array ();
				for($i=self::$listMax*($p-1) ;$i<self::$listMax*$p&&$i<count ($tab);++$i){
					$tab_p[]=$tab[$i];
				}
				$object = 'utilisateur';
				$view = 'list';
				$pagetitle = 'Liste des utilisateurs';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
			}else{
				$_POST["message"]="Vous n'êtes pas administrateur !";
				ControllerProduit::readAll(1);
			}

		}
		public static function read ( $login,$p )
		{
			if($login===NULL&&isset( $_SESSION[ 'login' ] )){
				$u = ModelUtilisateur ::select ( $_SESSION[ 'login' ] );
				$object = 'utilisateur';
				$view = 'detail';
				$pagetitle = 'Mon compte';

				$tab=ModelCommande::getUserOrder($_SESSION["login"]);

				$page=$p>0?$p:1;
				$maxPage=ceil(count ($tab)/self::$listMax);
				$tab_p= array ();
				for($i=self::$listMax*($p-1);$i<self::$listMax*$p&&$i<count ($tab);++$i){
					$tab[$i]->setPrixTotal($tab[$i]->getSQLPT($tab[$i]->getIdC()));
					$tab_p[]=$tab[$i];

				}


				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
			else if(Session::is_user ($login) ||Session::is_admin ()) {
				$tab=ModelCommande::getUserOrder($login);

				$page=$p>0?$p:1;
				$maxPage=ceil(count ($tab)/self::$listMax);
				$tab_p= array ();
				for($i=self::$listMax*($p-1);$i<self::$listMax*$p&&$i<count ($tab);++$i){
					$tab[$i]->setPrixTotal($tab[$i]->getSQLPT($tab[$i]->getIdC()));
					$tab_p[]=$tab[$i];
				}
				$u = ModelUtilisateur ::select ( $login );
				$object = 'utilisateur';
				$view = 'detail';
				$pagetitle = 'Détail du utilisateur.';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
			}else{
				$_POST["message"]="Connectez vous avant !";

				ControllerUtilisateur::connect ();
			}
		}
		public static function delete ( $login )
		{
			if(Session::is_user ($login)||Session::is_admin ()){

				ModelUtilisateur ::delete ( $login );
				if(Session::is_user($login)){
					session_unset ();
					session_destroy ();
					setcookie ( session_name () , '' , time () - 1 );
				}
				$_POST["message"]="Utilisateur supprimé !";

				ControllerProduit::readAll (1);

			}else{
				$_POST["message"]="Vous n'avez pas les droits pour supprimer cet utilisateur!";

				ControllerProduit::readAll (1);

			}
		}
		public static function update ( $imma )
		{
			$u=NULL;
			if((is_null ($imma)&&!isset($_SESSION["login"]))||Session::is_admin ()){
				$object = 'utilisateur';
				$view = 'update';
				$pagetitle="User creation";
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );

			}else if(!Session::is_user ($imma)&&!Session::is_admin ()){
				$_POST["message"]="Vous n'avez pas les droits pour mettre à jour cet utilisateur!";

				ControllerProduit::readAll (1);
			}
			else{
				$u = ModelUtilisateur ::select ( $_SESSION[ 'login' ] );
				$object = 'utilisateur';
				$view = 'update';
				$pagetitle = 'User update';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
		}
		public static function updated ( $data )
		{
			if((Session::is_admin ()||Session::is_user ($data["login"]))&&strcmp ( $data[ "mdp" ] , $data[ "mdp_conf" ] ) == 0){
				unset($data[ "mdp_conf" ]);
				$data[ "mdp" ] = Security ::chiffrer ( $data[ "mdp" ] );
				ModelUtilisateur ::update ( $data );
				$_POST["message"]="Utilisateur mis à jour  !";

			}else{
				if(strcmp ( $data[ "mdp" ] , $data[ "mdp_conf" ] )){
					$_POST["message"]="Mauvaise combinaison de mot de passe!";
				}
				else{
					$_POST["message"]="Vous n'avez pas les droits pour mettre à jour cet utilisateur! ";
				}
			}
			self::read ($data["login"],1);
		}
		public static function created ( $data )
		{
			if(strcmp ( $data[ "mdp" ] , $data[ "mdp_conf" ] ) == 0	&& filter_var ($data["mail"],FILTER_VALIDATE_EMAIL)!==FALSE) {
				unset($data[ "mdp_conf" ]);
				$data[ "mdp" ] = Security ::chiffrer ( $data[ "mdp" ] );
				$data["nonce"] = Security::generateRandomHex ();
				$data["solde"]=0;
				$data["admin"]=0;
				ModelUtilisateur ::save ( $data );
				mail($data["mail"],
					"Validate your account",
					"Here is a link inorder to validate your account http://php.yvesdaniel.fr/index.php?login=".$data["login"]."&nonce=".$data["nonce"]."&controller=utilisateur&action=validate");
				$_POST["message"]="Compte crée!";

			}else{
				$_POST["message"]="Erreur: Les mots de pass ne correspondent pas, ou le mail est invalide.";

			}
			ControllerProduit::readAll (1);

		}
		public static function connect ()
		{
			if ( !isset( $_SESSION[ "login" ] ) ) {
				$object = 'utilisateur';
				$view = 'connect';
				$pagetitle = 'Connection à la page utilisateur';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
			else {
				$_POST["message"]="Salopio ! Tu es déjà connecté";

				ControllerProduit ::readAll (1);
			}
		}
		public static function connected ( $login , $mdp )
		{
			if ( !isset( $_SESSION[ "login" ] )) {
				$g=ModelUtilisateur::select ($login);
				if ( ModelUtilisateur ::checkPassword ( $login , $mdp )&&is_null ($g->getNonce())) {
					$_SESSION[ "login" ] = $g -> getLogin ();
					$_SESSION[ "admin" ] = $g -> getAdmin ();
					$_POST["message"]="Bienvenue ".$g->getLogin()." !";

					ControllerProduit ::readAll (1);
				}
				else {
					$_POST["message"]="Mauvais mot de passe !";
					$object = 'utilisateur';
					$view = 'connect';
					$pagetitle = 'Connection à la page utilisateur';
					require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
				}
			}
			else {
				$_POST["message"]="Vous êtes déjà connecté ! ";

				ControllerProduit ::readAll (1);
			}
		}
		public static function disconnect ()
		{
			if ( isset( $_SESSION[ "login" ] ) ) {
				session_unset ();
				session_destroy ();
				setcookie ( session_name () , '' , time () - 1 );
			}
			else{
				$_POST["message"]="Tu es déjà connecté...!";

			}
			ControllerProduit ::readAll (1);
		}
		public static function validate($login,$nonce){
			if(ModelUtilisateur::checkValidity ($login,$nonce)){
				$u=ModelUtilisateur::select ($login);
				$data=[
					"login"=>$u->getLogin(),
					"nonce"=>NULL
				];
				ModelUtilisateur::update ($data);
				ControllerProduit::readAll (1);
				$_POST["message"]="Bravo ! Vous êtes validé !";

			}
			else{
				$_POST["message"]="Validation impossible";

				ControllerProduit::readAll (1);
			}
		}
		public static function adminPanel($p){
			if(Session::is_admin ()){
				if(Session::is_admin ()){
					$u=NULL;
					$tab = ModelUtilisateur ::selectAll ();     //appel au modèle pour gerer la BD

					$page=$p>0?$p:1;
					$maxPage=ceil(count ($tab)/self::$listMax);
					$tab_p= array ();
					for($i=self::$listMax*($p-1) ;$i<self::$listMax*$p&&$i<count ($tab);++$i){
						$tab_p[]=$tab[$i];
					}
					$object = 'utilisateur';
					$view = 'paneladmin';
					$pagetitle = 'Panel Admin';
					require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
				}
			}else{
				$_POST["message"]="Hors de mon domaine , roturier!";

				ControllerProduit::readAll (1);
			}
		}

	}
	?>
