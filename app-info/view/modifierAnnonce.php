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
                <span>Gerer les annonces</span> 
            </div>
            <div id="AdminModule1">
                    <?php include ('../controller/modifierAnnonceModule.php'); ?>

                <form name="insertion" action="../controller/modifierAnnonceModuleEnvoi.php" method="POST">
           <input type="hidden" name="id" value="<?php echo $_GET['idannonce'];?>">
                   



<div>
    <!--Formulaire -->
                            <input type="text" class="text" name="title" placeholder = "title" value="<?php echo($info['title']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="name" placeholder = "name" value="<?php echo($info['name']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="category" placeholder = "category" value="<?php echo($info['category']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="location" placeholder = "location" value="<?php echo($info['location']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="city" placeholder = "city" value="<?php echo($info['city']) ;?>" />
                        </div>
                        <div>
                            <input type="number" class="text2" name="prix" placeholder = "prix" value="<?php echo($info['prix']) ;?>" />€/
                        </div>
                        <div>
                            <input type="text" class="text2" name="quantitee" placeholder = "quantitee" value="<?php echo($info['quantitee']) ;?>" />Kg
                        </div>
                        


                        <button type="submit" value="modifier">Modifier</button>




                </form>
            </div>
        </div>
  </div>


<?php
    include("footer.php");
                }














