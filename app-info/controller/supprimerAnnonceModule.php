<?php include('../model/bdd.php'); 

//On vérifie si l'utilisateur connecté à les droits
$req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE id='.$_SESSION["userID"]);

                $req->execute(array(
                    'admin' => $admin,
  						));
                $resultat = $req->fetch();

                $is_admin = $resultat['admin'];
                

		if($is_admin == 0)
                {
                    echo "Vous n'avez pas les droit nécessaires !!!!";
                    include ('../view/footer.php'); 
                }
        
         elseif($is_admin == 1)
         		{
         			
                    	include('../model/bdd.php');

//On supprime l'utilisateur séléctionné
$user = $bdd->prepare('DELETE FROM annonce WHERE id='.$_GET['idannonce']);
$user -> execute();


                }
?>
