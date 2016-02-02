<?php include ('header.php');
include('../model/bdd.php'); 

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
                <h2>Rédiger un message</h2>
                <span>Contacter quelqu'un pour avoir de plus amples informations</span> 
            </div>
           <?php echo $info; ?>
            <div>
                <!-- Formulaire d'envoi de message-->
                <form method="post" >
                   
                        <div>
                            <input type="text" class="text" name="nom" placeholder="Nom" />
                        </div>
                        <div>
                            <input type="email" class="text" name="email" placeholder="Votre Email" />
                        </div>
                        <div>
                        
                            <input type="email" class="text" name="emaildestinataire" placeholder="Email du destinataire" value="<?php echo($_POST['prenomPostEmail']) ;?>" />
                        </div>
                        <div>
                            <input type="text" class="text" name="objet" placeholder="Objet" />
                        </div>
                        <div >
                            <textarea type="text" class="text" name="message" placeholder="Tapez votre message ici !" /></textarea>
                        </div>
                   
                    
                        <button type="submit" name="valider">Envoyer</button>
                   
                        
                      
                </form>
            </div>
        </div>     


            </div>
        

    <br />
  
        <?php include ('footer.php'); 
                }

        
   ?>