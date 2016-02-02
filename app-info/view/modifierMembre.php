<?php include ('header.php');
include('../model/bdd.php'); 
//On vérifie que l'utilisateur à les droits
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
              
             ?>       
  <div >
   
            <div class="title">
                <h2>Informations</h2>
                <span>Gerer les membres</span> 
            </div>
            <div id="AdminModule1">
                    <?php include ('../controller/modifierMembreModule.php'); ?>

                <form name="insertion" action="../controller/modifierMembreModuleEnvoi.php" method="POST">
           <input type="hidden" name="id" value="<?php echo $_GET['idmembre'];?>">
                   



<div>
    <!--Formulaire -->
                            <input type="text" class="text" name="nom" placeholder = "nom" value="<?php echo($info['nom']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="prenom" placeholder = "prénom" value="<?php echo($info['prenom']) ;?>" />
                        </div>
                        <div>
                            <input type="email" class="text" name="email" placeholder = "email" value="<?php echo($info['email']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="age" placeholder = "âge" value="<?php echo($info['age']) ;?>" />
                        </div>
                        <div>
                            <input type="number" class="text" name="telephone" placeholder = "téléphone" value="<?php echo($info['telephone']) ;?>" />
                        </div>


                        <button type="submit" value="modifier">Modifier</button>




                </form>
            </div>
        </div>
  </div>


<?php
    include("footer.php");
                }














