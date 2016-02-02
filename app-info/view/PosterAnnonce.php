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
    <div id="formulaire">
            <div class="title">
                <h2>Formulaire de mise en ligne d'annonces:</h2>
                <span>Mettez en ligne votre produit !</span> 
            </div>
<?php echo $erreur;?>
            <div >
                <!--Formulaire-->
                <form method="post" enctype='multipart/form-data' >

                   
                        
                            <input type="text" class="text" name="title" placeholder="Titre de l'annonce *" />
                        
                       
                            <input type="text" class="text" name="name" placeholder="Nom du produit *" />
                       
                       
                            <SELECT name="category" placeholder="Catégorie du produit *" >
                            <OPTION selected>-- Catégorie --
                            <OPTION>fruit
                            <OPTION>légumes
                            <OPTION>champignons
                            <OPTION>autres
                            </SELECT>
                         
                      
                            <input type="text" class="text" name="location" placeholder="Département *" />

                       
                            <input type="text" class="text" name="city" placeholder="Ville *" />


                             <input type="number" class="text2" name="prix" placeholder="prix *" />€/ 

                             <input type="number" class="text2" name="quantitee" placeholder="quantité" />Kg

                            
                      
                        
                            <textarea type="text" class="text" name="description" placeholder="   Description *"></textarea>
                            
                            <p>
                                <!--Formulaire pour la photo du produit -->
                Ajoutez une photo de votre produit (max 1Mo): <br />
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" name="fichier" /><br />
                
                
        </p>
                           
                            <br />
                            
                        
                   
                    <button type="submit" name="upload" value="Uploader">Poster</button>
                   
                        
                        <br /><br />
                

                </form>
            </div>
       
    
</div>
  
        <?php include ('footer.php'); 
                }

        
   ?>
