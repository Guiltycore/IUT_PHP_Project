<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 24/11/17
	 * Time: 10:35
	 */

	require_once ( File ::build_path ( [ "model" , "ModelUtilisateur.php" ] ) );

	class ControllerUtilisateur
	{

		protected static $listMax=4;
		protected static $object;
		public static function readAll ($p)
		{

			$tab = ModelUtilisateur ::selectAll ();     //appel au modèle pour gerer la BD
			$page=$p;
			$maxPage=count ($tab)/self::$listMax;
			$tab_p= array ();
			for($i=self::$listMax*($p-1) ;$i<self::$listMax*$p&&$i<count ($tab);++$i){
				$tab_p[]=$tab[$i];
			}
			$object = 'utilisateur';
			$view = 'list';
			$pagetitle = 'Liste des utilisateurs';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function read ( $login )
		{
			if($login===NULL&&!empty( $_SESSION[ 'login' ] )){
				$u = ModelUtilisateur ::select ( $_SESSION[ 'login' ] );
				$object = 'utilisateur';
				$view = 'detail';
				$pagetitle = 'Mon compte';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
			else if(Session::is_user ($login) ||Session::is_admin ()) {

				$u = ModelUtilisateur ::select ( $login );
				$object = 'utilisateur';
				$view = 'detail';
				$pagetitle = 'Détail du utilisateur.';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
			}else{
				ControllerUtilisateur::connect ();
			}
		}
		public static function delete ( $login )
		{
			if(Session::is_user ($login)||Session::is_admin ()){

				ModelUtilisateur ::delete ( $login );
				ControllerProduit::readAll (1);

			}else{
				ControllerProduit::readAll (1);

			}
		}
		public static function update ( $imma )
		{

			if(is_null ($imma)){
				$object = 'utilisateur';
				$view = 'update';
				$pagetitle="User creation";
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );

			}else if(!Session::is_user ($imma)||!Session::is_admin ()){
				ControllerProduit::readAll (1);
			}
			else{

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
			}
			ControllerProduit::readAll (1);
		}
		public static function created ( $data )
		{
			if(strcmp ( $data[ "mdp" ] , $data[ "mdp_conf" ] ) == 0	&& filter_var ($data["mail"],FILTER_VALIDATE_EMAIL)!==FALSE) {
				unset($data[ "mdp_conf" ]);
				$data[ "mdp" ] = Security ::chiffrer ( $data[ "mdp" ] );
				$data["nonce"] = Security::generateRandomHex ();
				$data["solde"]=0;
				$data["admin"]=0;
				$from="noreply@php.yvesdaniel.fr";
				ModelUtilisateur ::save ( $data );
				mail($data["mail"],
					"Validate your account",
					"Here is a link inorder to validate your account http://php.yvesdaniel.fr/index.php?login=".$data["login"]."&nonce=".$data["nonce"]."&controller=utilisateur&action=validate",
					"From:" . $from);
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
					ControllerProduit ::readAll (1);
				}
				else {
					echo "Mauvais mot de passe.";
					$object = 'utilisateur';
					$view = 'connect';
					$pagetitle = 'Connection à la page utilisateur';
					require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
				}
			}
			else {
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
			}
			else{
				echo "Wrong login/nonce";
				ControllerProduit::readAll (1);
			}
		}

	}