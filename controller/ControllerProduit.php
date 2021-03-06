<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 27/10/17
	 * Time: 11:04
	 */

	require_once ( File ::build_path ( [ "model" , "ModelProduit.php" ] ) );

	class ControllerProduit
	{
		protected static $listMax=4;
		protected static $object;
		public static function readAll ($p)
		{


			$tab = ModelProduit ::selectAll ();     //appel au modèle pour gerer la BD

			$page=$p>0?$p:1;

			$act="readAll";
			$maxPage=ceil(count ($tab)/self::$listMax);
			$tab_p= array ();
			for($i=self::$listMax*($p-1);$i<self::$listMax*$p&&$i<count ($tab);++$i){
				$tab_p[]=$tab[$i];
			}
			$style="<style>

			.demo-card-wide.mdl-card {
                width: 30vw;

                margin-left: auto;
                margin-right: auto;
			}
     ";
			foreach ($tab_p as $p){
				$style.="
			.demo-card-wide > .image".$p -> getID_p ()." {
                height: 7vh;
                background: url(\"".$p->getPicP()."\") center / cover;
                
	            background-repeat: no-repeat;
                background-size: 3vw 6vh;
                }\n";
			}

			$style.="</style>";
			$object = 'produit';
			$view = 'list';
			$pagetitle = 'Liste des produits';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function read ( $login,$c )
		{
			$product = ModelProduit ::select ( $login );
			$object = 'produit';
			$view = 'detail';
			$pagetitle = 'Détail du produit.';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function delete ( $login )
		{
			if(Session::is_admin ()){

				ModelProduit ::delete ( $login );
				$tab_p = ModelProduit ::selectAll ();
				$object = 'produit';
				$view = 'delete';
				$pagetitle = 'Produit supprimé';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
			else{
				$_POST["message"]="Vous n'avez pas les droits pour supprimer ce produit =)!";

				self::readAll(1);
			}
		}
		public static function update ( $imma )
		{
			if(Session::is_admin ()){

				$object = 'produit';
				$view = 'update';
				$pagetitle = 'Produit update';
				require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
			}
			else{
				$_POST["message"]="Vous n'avez pas les droits pour mettre à jour ce produit =)!";

				self::readAll (1);
			}

		}
		public static function updated ( $data )
		{
			if(Session::is_admin ()){

				if (isset($_FILES['pic_p'])&&move_uploaded_file($_FILES['pic_p']['tmp_name'], './img/'.basename($_FILES['pic_p']['name']))) {
					$data['pic_p']="./img/".basename($_FILES['pic_p']['name']);
				}
				ModelProduit ::update ( $data );
			}
			$_POST["message"]="Produit mis à jour!";

			self::readAll (1);
		}
		public static function created ( $data )
		{
			if(Session::is_admin ()) {

				if ( isset( $_FILES[ 'pic_p' ] ) && move_uploaded_file ( $_FILES[ 'pic_p' ][ 'tmp_name' ] , './img/' . basename ( $_FILES[ 'pic_p' ][ 'name' ] ) ) ) {
					$data[ 'pic_p' ] = "./img/".basename ( $_FILES[ 'pic_p' ][ 'name' ] );
				}
				ModelProduit ::save ( $data );
			}
			$_POST["message"]="Produit crée !";

			self::readAll (1);

		}
		public static function generate($size){
			if(Session::is_admin ()){
				for($i=0;$i<$size;++$i){
					ModelProduit ::save (["nom_p"=>self::generateRandomString (30),"description_p"=>' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque scelerisque neque lacus, pellentesque aliquet eros fringilla quis. Aliquam id massa ligula. Sed ultricies nisl sed ultrices vulputate. Sed sodales vel tortor non ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pretium vitae dolor malesuada mattis. Fusce non blandit diam, non imperdiet nunc. ',"prix_p"=>rand (0,100)]);
				}
			}
			$_POST["message"]="PRODUCTU GENERATU !";
			self::readAll (1);

		}
		private static function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		public static function ajouterAuPanier($idp){
			if (!isset($_COOKIE['panier'])) {
				$tab = ["".$idp=>1];
				setcookie("panier", serialize($tab), time()+3600);
			}
			else{
				$tab = unserialize($_COOKIE["panier"]);
				$var = isset($tab["".$idp])?$tab["".$idp]:0;
				$tab["".$idp]=$var + 1;
				setcookie("panier", serialize($tab), time()+3600);
			}
			$_POST["message"]="Produit ajouté!";
			self::readAll (1);
		}
		public static function search($nomproduit,$p){
			$tab = ModelProduit ::search($nomproduit);     //appel au modèle pour gerer la BD
			$act="search";
			$page=$p>0?$p:1;
			$maxPage=ceil(count ($tab)/self::$listMax);
			$tab_p= array ();
			for($i=self::$listMax*($p-1);$i<self::$listMax*$p&&$i<count ($tab);++$i){
				$tab_p[]=$tab[$i];
			}

			$style="<style>

			.demo-card-wide.mdl-card {
                width: 30vw;

                margin-left: auto;
                margin-right: auto;
			}
     ";
			foreach ($tab_p as $p){
				$style.="
			.demo-card-wide > .image".$p -> getID_p ()." {
                height: 7vh;
                background: url(\"".$p->getPicP()."\") center / cover;
                
	            background-repeat: no-repeat;
                background-size: 3vw 6vh;
                }\n";
			}

			$style.="</style>";
			$object = 'produit';
			$view = 'list';
			$pagetitle = 'Liste des produits';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue	
		}		
	}
?>
