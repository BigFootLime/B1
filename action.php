<?php 
//$_get
$name = $_POST['name'];
// echo 'Hello ' . $name;

if(isset($_POST['name'])){
    echo 'Hello ' . htmlspecialchars($_POST['name']);
} else{
    echo 'Bonjour inconnu';
}
?>