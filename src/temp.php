<?php
include './math.php';
// echo 'Bonjour, le monde!';
//ceci est un commentaire

/**
 * Ceci est un commentaire multi ligne
 *
 *
 */
//Pour declarer une variable PHP
$texte = "Hello World";
$nombre = 42;

// PHP supporte notamment : les strings, integers, floats, booleans, arrays, objects, null,...
//Structure de controle
//if($nombre > 42){
//    echo 'le nombre est supérieur a 42';
//} elseif ($nombre == 42){
//    #code...
//    echo 'le nombre est egal a 42';
//} else{
//    echo 'le nombre est inferieur a 42';
//}

// les boucles
for ($i=0; $i < 10; $i++) {
    echo $i . ' ';
}

//les fonctions

//definition

echo '<br>';
echo addition(43, 46);

// difference get et post 
?>
