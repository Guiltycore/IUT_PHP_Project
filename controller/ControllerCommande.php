<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 03/12/17
	 * Time: 00:31
	 */
	require_once ( File ::build_path ( [ "model" , "ModelCommande.php" ] ) );
	require_once ( File ::build_path ( [ "model" , "ModelProduitCommande.php" ] ) );

	class ControllerCommande
	{
		protected static $listMax=4;
		public static function readAll ($p)
		{
			if(isset($_SESSION["login"])){
				$tab=ModelCommande::getUserOrder($_SESSION["login"]);

				$page=$p;
				$maxPage=count ($tab)/self::$listMax;
				$tab_p= array ();
				for($i=self::$listMax*($p-1);$i<self::$listMax*$p&&$i<count ($tab);++$i){
					$tab_p[]=$tab[$i];
				}

				$object = 'commande';
				$view = 'list';
				$pagetitle = 'Liste des commandes';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}else{
				ControllerUtilisateur::connect ();
			}
		}
		public static function read ( $login ,$p)
		{
			$l=$login;
			//TODO
			$tab = ModelProduitCommande::getProductListBO($login);
			$listM=10;
			$page=$p;
			$maxPage=count ($tab)/$listM;
			$tab_p= array ();
			for($i=$listM*($p-1);$i<$listM*$p&&$i<count ($tab);++$i){
				$tab_p[serialize (ModelProduit::select($tab[$i]->getIdP()))]=$tab[$i]->getQuantity();
			}
			$object = 'commande';
			$view = 'detail';
			$pagetitle = 'Détail du produit.';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function delete ( $login )
		{
			self::readAll (1);

		}
		public static function update ( $imma )
		{
			$tab_p=[];
			if (isset($_COOKIE['panier'])) {
				$tab=unserialize($_COOKIE["panier"]);
				foreach ($tab as $k=>$v){
					$tab_p[serialize(ModelProduit::select($k))]=$v;
				}
			}
			$object = 'commande';
			$view = 'update';
			$pagetitle = 'Panier';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
		public static function updated ( $data )
		{
			self::readAll (1);
		}
		public static function created ( $data )
		{
			if(isset($_SESSION["login"])){
				ModelCommande::save (["date"=> date("Y-m-d",time()),"login"=>$_SESSION["login"]]);
				$c=ModelCommande::getUncompleteOrder($_SESSION["login"]);
				foreach($data as $k=>$v){
					ModelProduitCommande::save (["idC"=>($c->getIdC()),"idP"=>$k,"quantity"=>$v]);
				}
				setcookie("panier","",time()-1);
				ControllerProduit::readAll(1);
			}else{
				ControllerUtilisateur::connect ();
			}


		}
	}
	?>