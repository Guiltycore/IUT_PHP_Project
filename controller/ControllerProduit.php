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
			$page=$p;
			$maxPage=count ($tab)/self::$listMax;
			$tab_p= array ();
			for($i=self::$listMax*($p-1);$i<self::$listMax*$p&&$i<count ($tab);++$i){
				$tab_p[]=$tab[$i];
			}
			$object = 'produit';
			$view = 'list';
			$pagetitle = 'Liste des produits';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function read ( $login )
		{
			$p = ModelProduit ::select ( $login );
			$object = 'produit';
			$view = 'detail';
			$pagetitle = 'Détail du produit.';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function delete ( $login )
		{
			ModelProduit ::delete ( $login );
			$tab_p = ModelProduit ::selectAll ();
			$object = 'produit';
			$view = 'delete';
			$pagetitle = 'Produit supprimé';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
		public static function update ( $imma )
		{
			$object = 'produit';
			$view = 'update';
			$pagetitle = 'Produit update';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
		public static function updated ( $data )
		{
			$uploadfile = './img/'.basename($_FILES['pic_p']['name']);
			if (isset($_FILES['pic_p'])&&move_uploaded_file($_FILES['pic_p']['tmp_name'], $uploadfile)) {
				$data['pic_p']=$uploadfile;
			}
			ModelProduit ::update ( $data );
			self::readAll (1);
		}
		public static function created ( $data )
		{
			$uploadfile = './img/'.basename($_FILES['pic_p']['name']);
			if (isset($_FILES['pic_p'])&&move_uploaded_file($_FILES['pic_p']['tmp_name'], $uploadfile)) {
				$data['pic_p']=$uploadfile;
			}
			ModelProduit ::save ( $data );
			self::readAll (1);

		}
		public static function generate($size){
			for($i=0;$i<$size;++$i){
				ModelProduit ::save (["nom_p"=>self::generateRandomString (30),"description_p"=>' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque scelerisque neque lacus, pellentesque aliquet eros fringilla quis. Aliquam id massa ligula. Sed ultricies nisl sed ultrices vulputate. Sed sodales vel tortor non ultrices. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pretium vitae dolor malesuada mattis. Fusce non blandit diam, non imperdiet nunc. ',"prix_p"=>rand (0,100)]);
			}
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
			if (!isset($_COOKIE['panier'])) {	//creation du panier (si inexistant)
				echo "<p>test</p>";
				setcookie("panier", "idp", time()+60); 
			}
			self::readAll (1);


		}
	}
