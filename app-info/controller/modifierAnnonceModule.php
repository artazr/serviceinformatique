<?php include('../model/bdd.php'); 
//On récupère les données de l'utilisateur qui est connecté
$req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE id='.$_SESSION["userID"]);
            
                $req->execute(array(
                    'admin' => $admin,
  						));
                $resultat = $req->fetch();

                $is_admin = $resultat['admin'];
                
        //On vérifie ses droits
		if($is_admin == 0)
                {
                    echo "Vous n'avez pas les droit nécessaires !!!! ";
                    include ('../view/footer.php'); 
                }
        
         elseif($is_admin == 1)
         		{
         			
                    
//On récupère les donnée du membre
$annonce = $bdd->prepare('SELECT * FROM annonce WHERE id='.$_GET['idannonce']);
$annonce -> execute();

$info = $annonce -> fetch();

if($_POST['modifier']){
header('location : ../view/Admin.php');
}
                }
?>
