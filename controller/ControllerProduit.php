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
		protected static $object;
		public static function readAll ()
		{
			$tab_v = ModelProduit ::selectAll ();     //appel au modèle pour gerer la BD
			$object = 'produit';
			$view = 'list';
			$pagetitle = 'Liste des produits';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function read ( $login )
		{
			$v = ModelProduit ::select ( $login );
			$object = 'produit';
			$view = 'detail';
			$pagetitle = 'Détail du produit.';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );  //"redirige" vers la vue
		}
		public static function delete ( $login )
		{
			ModelProduit ::delete ( $login );
			$tab_v = ModelProduit ::selectAll ();
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
			ModelProduit ::update ( $data );
			$object = 'produit';
			$view = 'updated';
			$pagetitle = 'Liste des produits';
			$tab_v = ModelProduit ::selectAll ();
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
		public static function created ( $data )
		{
			ModelProduit ::save ( $data );
			$tab_v = ModelProduit ::selectAll ();
			$object = 'produit';
			$view = 'created';
			$pagetitle = 'Liste des produits';
			require ( File ::build_path ( [ 'view' , 'view.php' ] ) );
		}
	}