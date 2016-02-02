<?php include ('header.php');
include('../model/bdd.php'); 
//On vérifie si l'utilisateur à les droits
$req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE id='.$_SESSION["userID"]);

                $req->execute(array(
                    'admin' => $admin,
                        ));
                $resultat = $req->fetch();

                $is_admin = $resultat['admin'];
                

        if(isset($_SESSION["userID"])==NULL)
                {
                    echo "Vous n'avez pas les droit nécessaires !!!! ";
                    include ('../view/footer.php'); 
                }
        
         else
                {
                    ?>
                     <menu>
    <?php include ('menu.php'); ?>
</menu>
    <div id="info">
        <div >
            <div class="title">
                <h2>Mes informations</h2>
                <span>Complétez vos informations pour un profil complet !</span> 
            </div>
            <div >
                    <?php include ('../controller/MonCompteModifModule.php'); ?>
                <span>Vos informations ont été changées avec succès.</span> 
                
            </div>
        </div>
    </div>

    <br />
  
        <?php include ('footer.php'); 
                }

        
   ?>