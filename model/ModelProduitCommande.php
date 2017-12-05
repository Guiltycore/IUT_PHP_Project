<?php
	/**
	 * Created by PhpStorm.
	 * User: Yves
	 * Date: 02/12/2017
	 * Time: 22:22
	 */
	require_once(File::build_path(["model", "Model.php"]));

	class ModelProduitCommande extends Model
	{
		protected static $object = "ProduitCommande";
		protected static $primary = 'idPC';
		private $idPC;
		private $idC;

		private $idP;

		private $quantity;


		public function __construct($i = NULL, $id = NULL, $idp = NULL,$q=NULL) {
			if (!is_null($i) && !is_null($id) && !is_null($idp) && !is_null($q)) {
				$this->idPC=$i;
				$this->idC=$id;
				$this->idP=$idp;
				$this->Quantité=$q;
			}
		}


		public function getProductListBO($idc){
			$sql = "SELECT * 
					FROM Commande 
					WHERE idC=:idC";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"idc"  => $idc
			];

			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , "ModelProduitCommande" );
			$tab=$req_prep->fetchAll ();
			return !empty($tab);
		}

		/**
		 * @return null
		 */
		public function getIdC ()
		{
			return $this -> idC;
		}

		/**
		 * @return null
		 */
		public function getIdP ()
		{
			return $this -> idP;
		}

		/**
		 * @return mixed
		 */
		public function getQuantity ()
		{
			return $this -> quantity;
		}

	}
?>