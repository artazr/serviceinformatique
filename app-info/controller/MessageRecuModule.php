<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');
//On récupère les données de la table message
$reponse = $bdd->query('SELECT message, email, emaildestinataire, objet FROM messages ORDER BY id DESC');



while ($donnees = $reponse->fetch())
	//On vérifie que le destinataire de l'email est bien l'utilisateur connecté
	if($_SESSION['userMail']==$donnees['emaildestinataire']){
{
	//On affiche les resultats
	echo'<hr>';
	echo 'Votre Email : ' .$_SESSION['userMail'];
	echo '<div id="recu"> Vous avez reçu un message de : <strong>' .$donnees['email'] .
	'</strong><br /> Objet : <strong>'.$donnees['objet']. 
	'</strong><br /> Message : <strong>' .$donnees['message'] . 
	'</strong><br /> <br />';
}
}
$reponse->closeCursor();

?>