<?php include ('header.php');
include('../model/bdd.php'); 

//On vérifie que l'utilisateur à les droits
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
                   ?> <menu> 
    <?php include ('menu.php'); ?>
</menu>
  <div id="info">
    <div id="AdminModule">
            <div class="title">
                <h2>Mes informations</h2>
                <span>Complétez vos informations pour un profil complet !</span> 
            </div>
            <div >
                    <?php include ('../controller/MonCompteModule.php'); ?>
                <form name="insertion" action="../view/MonCompteModif.php" method="POST" enctype='multipart/form-data'>
           <div>
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
                <br />
                
                  
                    <form method="post" action='../view/MonCompte.php'  enctype='multipart/form-data'>
                    
                      Changer de photo de profil (max 1Mo)
                      
                       <input type="file" name="profil" /><br />
                    
                     <button type="submit" name="upload" value="Uploader">Poster</button>
                  <?php include('../controller/photoprofil.php');?>

                  </form>
           </div>
            <!--On affiche la photo de profil-->
            <?php  $reponse = $bdd->query('SELECT image_name FROM users WHERE id='.$_SESSION["userID"]);
           $donnees = $reponse->fetch();
           echo '<div id="photo">';
           echo 'Image de profil';
           echo "<img src='../view/".$donnees['image_name']."'/>";
           echo '</div>';
                          ?>
        </div>
  </div>

    <br />
                
  
        <?php include ('footer.php'); 
                }

        
   ?>
    