<?php 

include('../model/bdd.php');

//nom:
$nom = $_POST["nom"] ;
//prenom:
$prenom = $_POST["prenom"] ;
//email:
$email = $_POST["email"] ;
//age:
$age = $_POST["age"];
$telephone = $_POST["telephone"];
//récupération de l'identifiant de la personne:
$id = $_POST["id"];



//On met à jour ses infos
$envoimodif = $bdd -> prepare("UPDATE users SET nom = '$nom', prenom = '$prenom', email = '$email', age = '$age', telephone = '$telephone'WHERE id=".$_SESSION["userID"]);
$envoimodif -> execute();


?>