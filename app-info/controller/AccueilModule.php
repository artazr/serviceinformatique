<?php include('../model/bdd.php');

//On vas chercher toutes las annonces triées par ID dans la bdd
$reponse = $bdd->query('SELECT * FROM annonce ORDER BY id DESC');

while($donnees = $reponse->fetch())
{
	//on récupère l'email de la personne qui à posté l'annonce
	$rep = $bdd->query("SELECT email FROM users WHERE email= '".$donnees['prenomPostEmail']."'");

$resultat= $rep->fetch();
?>
	<hr>
	<!--On affcihe le résultat-->
<div id="accueil"> 
		Titre de l'annonce : <strong><?php echo $donnees['title'] ?> </strong>
	
	<br /> Nom du produit : <strong><?php echo $donnees['name'] ?> </strong>
	<br /> catégorie de produit : <strong><?php echo $donnees['category'] ?></strong>
	
	<br /> Département de disponibilité : <strong><?php echo $donnees['location'] ?> </strong>
	<br /> Ville où le produit est disponible : <strong> <?php echo $donnees['city'] ?></strong>

	<br /> PRIX et Quantité: <strong> <?php echo $donnees['prix'] ?> € / <?php echo $donnees['quantitee'] ?>Kg</strong>

</div>
	<div id ="accueilimg">
	 <br /> <img src=" ../controller/<?php  echo $donnees['image_nom'] ?>"/> </strong>
	 <br />
	 <br />
	</div>
	<!--On fait un lien vers la page annonce avec le trasfert de l'Id de l'annonce concerné en caché-->
	<div id ="lienPageAnnonce">
	 	<form method="post" action="../controller/annonceModule.php" >
	 <input type="hidden" name="id" value= "<?php echo($donnees['id']) ;?>" />
	 <button type="submit" name="valider">Détail de l'annonce</button>
	</form> <br />
</div>

	 <?php	

}

$reponse->closeCursor();


?>

