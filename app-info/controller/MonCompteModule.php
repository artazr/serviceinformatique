<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

//On récupère les info de l'utilisateur connecté
$user = $bdd->prepare('SELECT prenom, nom, email, age, telephone, image_name FROM users WHERE id='.$_SESSION["userID"]);
$user->execute(array(
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'age' => $age,
            'telephone' => $telephone,
            'image_name' => $image_name
            ));

$info = $user -> fetch();
?>	
	
