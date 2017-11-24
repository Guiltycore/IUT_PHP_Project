<?php
	/**
	 * Created by PhpStorm.
	 * User: yves
	 * Date: 24/11/17
	 * Time: 10:20
	 */
	require_once ( File ::build_path ( [ "model" , "Model.php" ] ) );

	class ModelUtilisateur extends Model
	{

		protected static $object = "Utilisateur";
		protected static $primary = 'login';
		private $login;
		private $mdp;
		private $adresse;
		private $solde;
		private $nom;
		private $prenom;
		private $admin;
		private $mail;
		private $nonce;

		public function __construct ( $l , $m , $a , $s , $n , $p , $ad , $ma , $n )
		{
			if ( !is_null ( $l ) && !is_null ( $m ) && !is_null ( $a ) && !is_null ( $s ) && !is_null ( $n ) && !is_null ( $p ) && !is_null ( $ad ) && !is_null ( $ma ) ) {

				$this -> login = $l;
				$this -> mdp = $m;
				$this -> adresse = $a;
				$this -> solde = $s;
				$this -> nom = $n;
				$this -> prenom = $p;
				$this -> admin = $ad;
				$this -> mail = $ma;
				$this -> nonce = $n;
			}
		}

		/**
		 * @return mixed
		 */
		public function getLogin ()
		{
			return $this -> login;
		}

		/**
		 * @return mixed
		 */
		public function getAdresse ()
		{
			return $this -> adresse;
		}

		/**
		 * @return mixed
		 */
		public function getSolde ()
		{
			return $this -> solde;
		}

		/**
		 * @return mixed
		 */
		public function getNom ()
		{
			return $this -> nom;
		}

		/**
		 * @return mixed
		 */
		public function getPrenom ()
		{
			return $this -> prenom;
		}

		/**
		 * @return mixed
		 */
		public function getAdmin ()
		{
			return $this -> admin;
		}

		/**
		 * @return mixed
		 */
		public function getMail ()
		{
			return $this -> mail;
		}

		/**
		 * @return mixed
		 */
		public function getNonce ()
		{
			return $this -> nonce;
		}

		public static function checkPassword($login,$mot_de_passe_chiffre){
			$sql = "SELECT * 
					FROM Utilisateur 
					WHERE mdp=:mdp and login=:login";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"login"  => $login ,
				"mdp" => Security::chiffrer ($mot_de_passe_chiffre)
			];
			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , 'ModelUtilisateur' );
			return !empty($req_prep->fetchAll ());
		}

		public static function checkValidity($login,$nonce){
			$sql = "SELECT * 
					FROM Utilisateur	 
					WHERE nonce=:nonce and login=:login";
			$req_prep = Model ::$pdo -> prepare ( $sql );
			$match = [
				"login"  => $login ,
				"nonce" => $nonce
			];
			$req_prep -> execute ( $match );
			$req_prep -> setFetchMode ( PDO::FETCH_CLASS , 'ModelUtilisateur' );
			return !empty($req_prep->fetchAll ());
		}

		/**
		 * @return mixed
		 */
		public function getMdp ()
		{
			return $this -> mdp;
		}




	}


?>
