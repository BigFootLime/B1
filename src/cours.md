# PHP Programming Basics

---

## Table of Contents

1. [Introduction to PHP](#introduction-to-php)
2. [Basic PHP Syntax](#basic-php-syntax)
   - [PHP Tags](#php-tags)
   - [Comments in PHP](#comments-in-php)
   - [Variables and Data Types](#variables-and-data-types)
3. [Control Structures](#control-structures)
   - [If-Else Statements](#if-else-statements)
   - [Loops](#loops)
4. [Functions in PHP](#functions-in-php)
5. [Form Handling](#form-handling)
   - [Difference between GET and POST](#difference-between-get-and-post)

---

## Introduction to PHP

PHP (Hypertext Preprocessor) is a popular server-side scripting language designed specifically for web development. Created by Rasmus Lerdorf in 1994, PHP has become one of the most widely used languages for creating dynamic web pages.

---

## Basic PHP Syntax

### PHP Tags

PHP code is enclosed within special tags:

```php
<?php
// Your PHP code goes here
?>
```

**Bases**

xampp nosu fournis un environment de dévloppement PHP



Les balises PHP

```php
<?php

?>
```

```php
    //ceci est un commentaire
/**
 *ceci est un commentaire multilignes
 *
 */

$text = "Hello World!";
$nombre = 42;

// PHP supporte notamment : les strings, integers, float, booleans, arrays, objects, null0...

//$text = "Hello World!";
//$nombre = 42;

// PHP supporte notamment : les strings, integers, float, booleans, arrays, objects, null0...

//structure de contrele
//if ($nombre > 42)
//{
//    echo 'le nombre est superieur a 42';
//}   elseif (nombre ==42) {
//    #code...
//    echo 'le nombre est egale a 42';
//} else {
//    echo 'le nombre est inferieur a 42';
//}

//les boucles
echo '<br>';
for ($i=0; $i < 10; $i++) {
    #code...
    echo $i . ' ';
}

//les fonctions

//definition
function addition($a, $b) {
    return $a + $b;
}
echo '<br>';
echo addition(2, 3);
//appeler la fonction dans un autre fichier
require_once 'math.php';


/les variables superglobales

//formulaire
<form action='traitement-get.php' method="GET">
    Nom: <input type="text" name="nom">
    <input type="submit" value="envoyer">
</form>

// dans fichier traitement-get
<?php
echo $_GET['nom'];

//aussi

if (isset($_POST['nom'])) {

    echo 'Bonjour, ' . htmlspecialchars($_POST['nom']);
} else {
    echo 'bonjour l \'inconnue! ';
};


//requetes GET et POST pour les formulaires

//$_GET

//$_POST

//pour des operation qui ne modifient pas l'etat du serveurs
// (requete de recherche), privilegiez les request GET,
// pour les actuins qui modifiebt l'etat du serveur
// (mise a jours de donnes en base) utilisez POST



?>
```

```php

class Medicament {
    //champs de la classe
    public $nom;
    public $dose;
    public $forme;
    public $fabricant;
    public $date_expiration;
}

//constructeur de la classe
public function __construct ($nom, $dose,  $forme, $fabricant, $date_expiration)

{
    $this->nom = $nom
    $this->
}

// $med est une variable de type médicament
// $med est une instance de la classe Medicament


//**Tableau Dynamique**


<?php require_once ("../app/views/header-view.php"); ?>
<div class="page-container align-top">
    <div class="flex-col-container">
        <div class="filter-wrapper">
            <div class="filter-header">
                <label for="">Filtres :</label>
                <button class="button-outlined" type="submit" form="filter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </button>
            </div>
            <?php echo "<form class='form-filter-user padding-one' id='filter' action=$host/product/filter method='GET'>"; ?>

            <div class="textfield-label">
                <label for=" searchbar">Rechercher</label>
                <?php echo isset ($data["searchName"]) ? "<input type='text' name='search' id='searchbar' value=" . $data["searchName"] . ">" : "<input type='text' name='search' id='searchbar'>"; ?>
            </div>
            <div class="textfield-label">
                <label for="filterBy">Catégorie</label>

                <select name="category" id="filterBy">
                    <?php
                    echo "<option value='all'>Tous</option>";
                    foreach ($data["categories"] as $category) {
                        echo $data["filterCat"] == $category["id_cat"] ? "<option selected value=" . $category["id_cat"] . ">" . $category["name_cat"] . "</option>" : "<option value=" . $category["id_cat"] . ">" . $category["name_cat"] . "</option>";
                    }
                    ?>
                </select>
            </div>


            </form>
            <?php echo "<form class='filter-footer' action=$host/product method='GET'>"; ?>
            <button class="button-outlined" type="submit">Réinitialiser les filtres</button>
            </form>
        </div>

        <div>
            <?php echo isset ($data["error"]) ? "<span class='text-error'>" . $data["error"] . "</span>" : ""; ?>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Libellé</th>
                    <th>Prix à l'unité (€)</th>
                    <th>Stock</th>
                    <th>Niveau d'accès</th>
                    <th>Catégorie</th>
                    <?php
                    if ($_SESSION["userRole"] == 0) {
                        echo "<th>Action</th>";
                    }
                    ?>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data["products"] as $product) {
                    echo "<tr>";
                    echo "<tr>";
                    echo "<th> $product->id </th>";
                    echo "<td> $product->name </td>";
                    echo "<td> $product->price </td>";
                    echo "<td> $product->stock </td>";
                    echo "<td> $product->access_level </td>";
                    echo "<td>" . $product->category["name"] . "</td>";
                    echo "<td>";
                    if ($_SESSION["userRole"] == 0) {
                        echo "<form action=$host/product/details method='GET'>";
                        echo "<button class='button-outlined' name='id' value=$product->id>";
                        echo "<div><svg xmlns='http://www.w3.org/2000/svg'  width='20'  height='20'  viewBox='0 0 24 24'  fill='none'  stroke='currentColor'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><path d='M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4' /><path d='M13.5 6.5l4 4' /></svg></div>";
                        echo "</button>";
                        echo "</form>";
                    }
                    echo "<form action=$host/product/cart method='POST'>
                            <button class='button-outlined' name='id' value=$product->id>
                            <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='currentColor'
                                stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                                <path stroke='none' d='M0 0h24v24H0z' fill='none' />
                                <path d='M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0' />
                                <path d='M12.5 17h-6.5v-14h-2' />
                                <path d='M6 5l14 1l-.86 6.017m-2.64 .983h-10.5' />
                                <path d='M16 19h6' />
                                <path d='M19 16v6' />
                            </svg>
                            </button>
                            </form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once ("../app/views/footer-view.php"); ?>

//gestion de stock

 
<?php

class Medicament {
    public $nom;
    public $dose;
    public $forme;
    public $fabricant;
    public $date_expiration;

    public function __construct($nom, $dose, $forme, $fabricant, $date_expiration) {
        $this->nom = $nom;
        $this->dose = $dose;
        $this->forme = $forme;
        $this->fabricant = $fabricant;
        $this->date_expiration = $date_expiration;
    }
}

$medicaments = [
    new Medicament("Paracetamol", "500mg", "Comprimé", "Sanofi", "2024-12-31"),
    new Medicament("Ibuprofene", "200mg", "Capsule", "Pfizer", "2025-06-30"),
    new Medicament("Amoxicilline", "250mg", "Sirop", "GSK", "2023-09-15"),
    new Medicament("Aspirine", "100mg", "Comprimé", "Bayer", "2024-05-20"),
    new Medicament("Omeprazole", "20mg", "Gélule", "AstraZeneca", "2025-11-10"),
];

foreach ($medicaments as $medicament) {
    echo "Nom: " . $medicament->nom . "\n";
    echo "Dose: " . $medicament->dose . "\n";
    echo "Forme: " . $medicament->forme . "\n";
    echo "Fabricant: " . $medicament->fabricant . "\n";
    echo "Date d'expiration: " . $medicament->date_expiration . "\n\n";
}

?>





```

