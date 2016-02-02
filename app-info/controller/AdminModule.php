<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

//On récupère le nom, le prénom et l'ID de tous les utilisateurs inscrit et on les trie par ID
$query = $bdd->prepare('SELECT nom, prenom, id, admin FROM users ORDER BY id DESC');
$query->execute();

   ?> <h3>Les utilisateurs</h3>
<?php
while($user = $query->fetch())
	//On les affiche
 
{
	echo'<div id="AdminModule1">';
	
    echo("Nom : <strong>".$user['nom']."</strong>  &nbsp;&nbsp;&nbsp;&nbsp;   
    	Prenom : <strong>".$user['prenom']."</strong>  &nbsp; &nbsp;&nbsp;&nbsp;  
    	ID : <strong>".$user['id']."</strong>  &nbsp; &nbsp;&nbsp;&nbsp;  
    	Admin :  <strong>".$user['admin']."</strong>");
   
   
    echo(" <a href=\"../view/modifierMembre.php?idmembre=".$user['id']."\">
    	<button>modifier</button></a> <a href=\"../view/supprimerMembre.php?idmembre=".$user['id']."\">
    	<button>supprimer</button></a>");
    echo "</div></br>";
}
?>
<hr>
<h3>Les annonces </h3>
<?php
//On récupère le nom, le prénom et l'ID de tous les utilisateurs inscrit et on les trie par ID
$query = $bdd->prepare('SELECT name, title, id FROM annonce ORDER BY id DESC');
$query->execute();

while($annonce = $query->fetch())
    //On les affiche
{
    echo'<div id="AdminModule1">';
    
    echo("Nom : <strong>".$annonce['name']."</strong>  &nbsp;&nbsp;&nbsp;&nbsp;    
        ID : <strong>".$annonce['id']."</strong>  &nbsp; &nbsp;&nbsp;&nbsp;  
        Titre de l'annonce :  <strong>".$annonce['title']."</strong>");
   
   
    echo(" <a href=\"../view/modifierAnnonce.php?idannonce=".$annonce['id']."\">
        <button>modifier</button></a> <a href=\"../view/supprimerAnnonce.php?idannonce=".$annonce['id']."\">
        <button>supprimer</button></a>");
    echo "</div></br>";
}
?>
