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
        <div >
            <div class="title">
                <h2>Mes Messages</h2>
                <span>Regardez si vous avez de nouveaux messages !</span> 
            </div>
            <div >
                    <ul>
                        <li>
                            <?php include ('../controller/MessageRecuModule.php'); ?>
                        </li>
                    </ul> 
            </div>
        </div>
    </div>

    <br />
                
  
        <?php include ('footer.php'); 
                }

        
   ?>
    
