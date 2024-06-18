<?php
include_once 'login.php';
//champ de la classe
class Medicament {
    public $nom;
    public $dose;
    public $forme;
    public $fabricant;
    public $date_expiration;
    //constructor de la classe
    public function __construct($id, $nom, $dose, $forme, $fabricant, $date_expiration,) {
        $this->id = $nom;
        $this->libelle = $dose;
        $this->prix = $forme;
        $this->stock = $fabricant;
        $this->niveau = $date_expiration;
       
    }
}

$medicaments =[
    $med1= new Medicament('Doliprane', '500mg', 'Comprimé', 'Sanofi', '2023-12-12'),
    $med2= new Medicament('Ibuprofène', '200mg', 'Comprimé', 'Pfizer', '2023-12-12'),
    $med3= new Medicament('Paracétamol', '500mg', 'Comprimé', 'Sanofi', '2023-12-12'),
    $med4= new Medicament('Aspirine', '500mg', 'Comprimé', 'Bayer', '2023-12-12'),
    $med5= new Medicament('Efferalgan', '500mg', 'Comprimé', 'Sanofi', '2023-12-12'),
    $med6= new Medicament('Dafalgan', '500mg', 'Comprimé', 'Bayer', '2023-12-12'),
];
foreach($medicaments as $medicament){
    echo $medicament->nom . '<br>';
    echo $medicament->dose . '<br>';
    echo $medicament->forme . '<br>';
    echo $medicament->fabricant . '<br>';
    echo $medicament->date_expiration . '<br>';
}
?>