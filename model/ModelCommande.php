<?php
	/**
	 * Created by PhpStorm.
	 * User: Yves
	 * Date: 02/12/2017
	 * Time: 22:10
	 */
	require_once(File::build_path(["model", "Model.php"]));

	/**
	 * Class ModelCommande
	 */
	class ModelCommande extends Model
	{
		/**
		 * @var string
		 */
		protected static $object = "Commande";
		/**
		 * @var string
		 */
		protected static $primary = 'idC';
		/**
		 * @var integer
		 */
		private $idC;
		/**
		 * @var string
		 */
		private $date;
		/**
		 * @var string
		 */
		private $login;

		private $prixTotal;
		/**
		 * ModelCommande constructor.
		 * @param integer $i
		 * @param string $d
		 * @param string $l
		 */
		public function __construct($i = NULL, $d = NULL, $l = NULL) {
			if (!is_null($i) && !is_null($d) && !is_null($l)) {
				$this->idC=$i;
				$this->date=$d;
				$this->login=$l;
			}
		}

		/**
		 * @return integer
		 */
		public function getIdC ()
		{
			return $this -> idC;
		}

		/**
		 * @return string
		 */
		public function getDate ()
		{
			return $this -> date;
		}

		/**
		 * @return string
		 */
		public function getLogin ()
		{
			return $this -> login;
		}

		/**
		 * @return mixed
		 */
		public function getPrixTotal ()
		{
			return $this -> prixTotal;
		}

		/**
		 * @param mixed $prixTotal
		 */
		public function setPrixTotal ($prixTotal)
		{
			$this -> prixTotal = $prixTotal;
		}



		public static function getUserOrder($login){
			$sql = "SELECT * 
					FROM Commande 
					WHERE login=:login";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"login"  => $login
			];

			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , "ModelCommande" );
			$tab=$req_prep->fetchAll ();
			return $tab;
		}

		public static function getUncompleteOrder($login){
			$sql= "SELECT idC 
				   FROM Commande 
				   WHERE login=:login and idC NOT IN 
				    (SELECT idC 
				     FROM ProduitCommande);";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"login"  => $login
			];
			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , "ModelCommande" );
			$tab=$req_prep->fetchAll ();
			if(empty($tab)){
				return FALSE;
			}
			else{
				return $tab[0];
			}
		}
		public static function getSQLPT($id){
			$sql="SELECT SUM(Produit.prix_p) as totalPrix
				  FROM Commande
				  JOIN ProduitCommande ON Commande.idC=ProduitCommande.idC
				  JOIN Produit ON ProduitCommande.idP=Produit.id_p
				  WHERE Commande.idC=:id;";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"id"  => $id
			];
			$req_prep -> execute ( $match );
			$row = $req_prep->fetch(PDO::FETCH_ASSOC);
			return $row["totalPrix"];
		}

		/**
		 * @return string
		 */
		public static function getPrimary ()
		{
			return self ::$primary;
		}

	}
	?>