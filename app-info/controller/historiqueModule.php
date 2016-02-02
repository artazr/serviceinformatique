<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

//On récupère toutes les données de la table annonce
$reponse = $bdd->query('SELECT * FROM annonce ');


echo'<strong>Mes annonces Postées</strong>';
//On affiche que les annonces qui ont été postées par la personne qui est connecté 
while ($donnees = $reponse->fetch())
	if($_SESSION['userPrenom']==$donnees['prenomPost']){
{
	//On affiche les données obtenues
	echo'<hr>';
	echo '</strong> nom de l\'annonce: <strong>'.$donnees['name']. 
	'</strong><br /> description de l\'annonce : <strong>' .$donnees['description'] . 
	'</strong><br /> <br />';
}
}
$reponse->closeCursor();

?>