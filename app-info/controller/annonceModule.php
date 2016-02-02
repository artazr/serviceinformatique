<?php include ('../view/header.php'); ?>


	<div id="annonce">
            <div class="title">
                <h2> Annonce</h2>
                <span>Regardez le détail de l'annonce ! </span> 
            </div>
            <div>
            <?php include('../model/bdd.php'); 

//On vérifie que le bouton à bien été séléctionnée
if(isset($_POST['valider']))
{

	//On récupère toutes les annonces où l'ID correspond à l'ID transféré via le formulaire caché de la page accueil
	$reponse = $bdd->query('SELECT * FROM annonce WHERE id = '.$_POST['id']);

while($donnees = $reponse->fetch())
{

	//on récupère l'email et la photo de profil de la personne qui à posté l'annonce
	$rep = $bdd->query("SELECT email, image_name FROM users WHERE email= '".$donnees['prenomPostEmail']."'");

$resultat= $rep->fetch();

{

?>
<div>
	<hr>
<div id="annonce"> 
	<!--On affiche la photo du vendeur-->
<div id ="accueilimg2"><img src=" ../view/<?php echo $resultat['image_name'] ?>" alt="vendeur"/> </strong> 
	 </div>
	 <!--On affiche la photo du produit-->
	<div id ="accueilimg1">
	 <br /> <img src=" ../controller/<?php  echo $donnees['image_nom'] ?>" alt="produit"/> </strong></div>
	

	  <br />

<div id="descriptionAnnonce">
		Titre de l'annonce : <strong><?php echo $donnees['title'] ?> </strong>
	
	<br /> Nom du Vendeur : <strong><?php echo $donnees['prenomPost'] ?> </strong>
	<br /> Email du Vendeur : <strong><?php echo $donnees['prenomPostEmail'] ?> </strong>
	
	<br /> Nom du produit : <strong><?php echo $donnees['name'] ?> </strong>
	<br /> catégorie de produit : <strong><?php echo $donnees['category'] ?></strong>
	
	<br /> Département de disponibilité : <strong><?php echo $donnees['location'] ?> </strong>
	<br /> Ville où le produit est disponible : <strong> <?php echo $donnees['city'] ?></strong>

		<br /> PRIX et Quantité : <strong> <?php echo $donnees['prix'];?> €/ <?php echo $donnees['quantitee'];?> Kg </strong>


	
	<br /> Description du produit : <strong> <?php echo $donnees['description']?> </strong>
</div>
	
	 <?php 
	}
}
}
	 ?>


            </div>
        </div>
		<!--On crée un lien vers l'envoi de message interne-->
       <div id="lienPageMessage">
       <a href="../controller/MailModule.php"><button>envoyer un mail au vendeur</button></a>
			
       </div>
	
</div>
    <br />
    
        <?php include ('../view/footer.php'); ?>
