<?php 

include('../model/bdd.php');

//nom:
$title = $_POST["title"] ;
//prenom:
$name = $_POST["name"] ;
//email:
$category = $_POST["category"] ;
//age:
$location = $_POST["location"];
$city = $_POST["city"];

$prix = $_POST["prix"];
$quantitee = $_POST["quantitee"];
//récupération de l'identifiant de la personne:
$id = $_POST["id"];


//On met à jour les infos de l'utilisateur
$envoimodif = $bdd -> prepare("UPDATE annonce SET title = '$title', name = '$name', category = '$category', location = '$location', city = '$city', prix='$prix', quantitee='$quantitee' WHERE id=".$id);
$envoimodif -> execute();



header ('Location: ../view/Admin.php');
?>
