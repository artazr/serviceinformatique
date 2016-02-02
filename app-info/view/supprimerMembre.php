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
                    echo "Vous n'avez pas les droit nécessaires !!! ";
                    include ('../view/footer.php'); 
                }
        
         elseif($is_admin == 1)
         		{
         			?>
         			
                    		<div id="annonce">
	 	<div >
            <div class="title">
                <h2> Suppression effectué</h2>
                <br />
                <span>Vous venez de supprimer le membre <?php echo $_GET['idmembre'] ?>.</span> 
            </div>
            <div >
                    <ul>
                        <li>
                                   

<?php include ('../controller/supprimerMembreModule.php'); ?>
<br />
<div id="lienPageMessage">
 <a href='../view/Admin.php'> <button type="submit">Page Admin</button></a>
</div>
                        </li>
                    </ul> 
            </div>
        </div>
	</div>

    <br />
    
        <?php include ('footer.php');
                }
?>