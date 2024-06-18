<?php
//champ de la classe
class Products {
    public $nom;
    public $dose;
    public $forme;
    public $fabricant;
    public $date_expiration;
    //constructor de la classe
    public function __construct($nom, $dose, $forme, $fabricant, $date_expiration,) {
        $this->id = $nom;
        $this->libelle = $dose;
        $this->prix = $forme;
        $this->stock = $fabricant;
        $this->niveau = $date_expiration;
       
    }
}
?>