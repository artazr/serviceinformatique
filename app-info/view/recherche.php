<?php include ('header.php'); ?>


    <div id="recherche">
       
            <div class="title">
                <h2>Recherche</h2>
                <span>Effectuez ici vos recherches</span> 
            </div>
            <div >
                     <form method="get" action='recherche.php'>
                <input type="text" name="q" placeholder="SEARCH"/>
                <button type="submit" name="rechercher">Rechercher</button>
                   </form>
                        <!-- Appel de la page php de contact-->
                       <?php 
                include('../model/bdd.php');

                if(isset($_GET['q']))
                {
                    $q=$_GET['q'];
                    $s=explode(" ", $q);
                    $sql="SELECT * FROM annonce";
                    $i=0;
                    foreach($s as $mot)
                    {
                        if(strlen($mot)>3)
                        {
                            if($i==0)
                            {
                                $sql.=" WHERE";
                            }
                            else
                            {
                                $sql.=" OR";
                            }
                            $sql.=" title LIKE '%$mot%' OR name LIKE '%$mot%' OR description LIKE '%$mot%'";
                            $i++;
                        }
                    }
                }
                if (isset($sql)!=0){
                        
                $req=$bdd->query($sql) or die(mysql_error());
                $count = $req->rowCount();
                echo $count." resultat(s)";

                while ($donnees = $req->fetch())
                {

                    echo'<hr>';
                    echo '<div id="recherche"> Titre de l\'annonce : <strong>'.$donnees['title'] .
                     '</strong><br /> Nom du produit : <strong>'.$donnees['name']. 
                     '</strong><br /> catégorie de produit : <strong>' .$donnees['category'] . 
                     '</strong><br /> Région de disponibilité : <strong>'.$donnees['location']. 
                     '</strong><br /> Ville où le produit est disponible : <strong>' .$donnees['city'] . 
                     '</strong><br /> Description du produit : <strong>'.$donnees['description'].'</strong></div> <br />';
                
                }
            }
            ?> 
                </form>
            </div>

       
    </div>

    <br />
    

        <?php include ('footer.php'); ?>

