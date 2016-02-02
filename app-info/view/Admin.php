<?php include ('header.php');
include('../model/bdd.php'); 
//On vérifie que l'utilisateur à les droits d'accès
$req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE id='.$_SESSION["userID"]);

                $req->execute(array(
                    'admin' => $admin,
  						));
                $resultat = $req->fetch();

                $is_admin = $resultat['admin'];
                

		if($is_admin == 0)
                {
                    echo "Vous n'avez pas les droit nécessaires !!!! ";
                    include ('../view/footer.php'); 
                }
        
         elseif($is_admin == 1)
         		{
         			
                    	include ('../controller/AdminModule.php'); 
						include ('../view/footer.php'); 
                }
?>
