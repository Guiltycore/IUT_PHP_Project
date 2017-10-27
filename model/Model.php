<?php
	/**
	 * Created by PhpStorm.
	 * ModelUser: yves
	 * Date: 15/09/17
	 * Time: 10:32
	 */

	class Model
	{
		public static $pdo;
		protected static $object;
		protected static $primary;

		public static function Init ()
		{
			require_once File ::build_path ( explode ( '/' , 'config/Conf.php' ) );
			self ::$pdo = new PDO( "mysql:host=" . Conf ::getHostname () . ";dbname=" . Conf ::getDatabase () , Conf ::getLogin () , Conf ::getPassword () , [ PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ] );
			self ::$pdo -> setAttribute ( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );

		}

		public static function selectAll ()
		{

			$table_name = [ "name" => static ::$object ];
			$class_name = 'Model' . ucfirst ( static ::$object );
			$sql = "SELECT * FROM " . $table_name[ "name" ];

			$req_prep = Model ::$pdo -> prepare ( $sql );
			$req_prep -> execute ();

			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , $class_name );

			return $req_prep -> fetchAll ();
		}

		public static function select ( $primary_value )
		{

			$table_name = [ "name" => static ::$object , "primary" => static ::$primary , ];
			$class_name = 'Model' . ucfirst ( static ::$object );
			$sql = "SELECT * from " . $table_name[ "name" ] . " WHERE " . $table_name[ "primary" ] . "=:nom_tag";
			$req_prep = Model ::$pdo -> prepare ( $sql );

			$values = [ "nom_tag" => $primary_value , ];
			$req_prep -> execute ( $values );

			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , $class_name );
			$tab_rep = $req_prep -> fetchAll ();
			if ( empty( $tab_rep ) ) {
				return FALSE;
			}

			return $tab_rep[ 0 ];
		}

		public static function delete ( $primary_value )
		{

			$table_name = [ "name" => static ::$object , "primary" => static ::$primary , ];
			$sql = "DELETE FROM " . $table_name[ "name" ] . " WHERE " . $table_name[ "primary" ] . "=:nom_tag";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$values = [ "nom_tag" => $primary_value , ];
			$req_prep -> execute ( $values );
		}

		public static function update ( $data )
		{

			$table_name = [ "name" => static ::$object , "primary" => static ::$primary , ];
			$class_name = 'Model' . ucfirst ( static ::$object );
			$sql = "UPDATE " . $table_name[ "name" ] . " SET ";
			foreach ( $data as $cle => $v ) {
				if ( strcmp ( $cle , $table_name[ "primary" ] ) != 0 ) {
					$sql = $sql . " " . $cle . "= :" . $cle . " ,";
				}
			}
			$sql = rtrim ( $sql , "," ) . " WHERE " . $table_name[ "primary" ] . " =:" . $table_name[ "primary" ];

			$req_prep = Model ::$pdo -> prepare ( $sql );
			$req_prep -> execute ( $data );

		}

		public static function save ( $data )
		{
			$table_name = [ "name" => static ::$object ];

			$sql1 = "INSERT INTO " . $table_name[ "name" ] . "(";
			$sql2 = ")VALUES(";
			foreach ( $data as $cle => $v ) {
				$sql1 = $sql1 . $cle . ",";
				$sql2 = $sql2 . ":" . $cle . ",";
			}
			$sql = rtrim ( $sql1 , "," ) . rtrim ( $sql2 , "," ) . ')';

			$req_prep = Model ::$pdo -> prepare ( $sql );
			$req_prep -> execute ( $data );
		}

	}

	Model ::Init ();
?>