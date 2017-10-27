
<?php

require_once(File::build_path(["model", "Model.php"]));

class ModelProduit extends Model {

    static protected $object = "produit";
    protected static $primary = 'id_p';
    private $id_p;
    private $nom_p;
    private $description_p;
    private $prix_p;

    // getter ID Produit
    public function getID_p() {
        return $this->id_p;
    }

    // setter ID Produit
    public function setID_p($id_p2) {
        $this->id_p = $id_p2;
    }

    // getter NOM Produit
    public function getNom_p() {
        return $this->nom_p;
    }

    // setter NOM Produit
    public function setNom_p($nom_p2) {
        $this->nom_p = $nom_p2;
    }

    // getter DESCRIPTION Produit
    public function getDescription_p() {
        return $this->description_p;
    }

    // setter DESCRIPTION Produit
    public function setDescription_p($description_p2) {
        $this->description_p = $description_p2;
    }

    // getter PRIX Produit
    public function getPrix_p() {
        return $this->prix_p;
    }

    // setter PRIX Produit
    public function setPrix_p($prix_p2) {
        $this->prix_p = $prix_p2;
    }

    // CONSTRUCTEUR Produit
    public function __construct($i = NULL, $n = NULL, $d = NULL, $p = NULL) {
        if (!is_null($i) && !is_null($n) && !is_null($d) && !is_null($p)) {

            $this->id_p = $i;
            $this->nom_p = $n;
            $this->description_p = $d;
            $this->prix_p = $p;
        }
    }

}
?>
