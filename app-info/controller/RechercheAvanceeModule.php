<?php
        include('../model/bdd.php');
        
        if(isset($_GET['category']) || isset($_GET['words']) || isset($_GET['cities']) || isset($_GET['department']))
        {
            $words=$_GET['words'];
            $city=$_GET['cities'];
            $department=$_GET['department'];
            $w=explode(" ", $words);
            $c=explode(" ", $city);
            $d=explode(" ", $department);
            $v=explode(" ", $vendeur);
            $category=$_GET['category'];
            $vendeur =$_GET['vendeur'];
            $sql="SELECT * FROM annonce";
            $i=0;
            
        if($words != "")
        {
            foreach($w as $word)
            {
                if(strlen($word)>3)
                {
                    if($i==0)
                    {
                        $sql.=" WHERE";
                    }
                    else
                    {
                        $sql.=" OR";
                    }
                    $sql.=" title LIKE '%$word%' OR name LIKE '%$word%' OR description LIKE '%$word%'";
                    $i++;
                }
            }
        }
           
            if($category != "category")
            {
                if($i==0)
                {
                    $sql.=" WHERE";
                } 
                else
                {
                    $sql.=" AND";
                }

                $sql.=" category LIKE '%$category%'";
                $i++;
            }

            if($department != "")
        {
            foreach($d as $department)
            {
                if(strlen($department)>3)
                {
                    if($i==0)
                    {
                        $sql.=" WHERE";
                    }
                    else
                    {
                        $sql.=" AND";
                    }
                    $sql.=" location LIKE '%$department%'";
                    $i++;
                }
            }
        }
           
            if($vendeur != "")
        {
            foreach($v as $vendeur)
            {
                if(strlen($vendeur)>3)
                {
                    if($i==0)
                    {
                        $sql.=" WHERE";
                    }
                    else
                    {
                        $sql.=" AND";
                    }
                    $sql.=" prenomPost LIKE '%$prenomPost%'";
                    $i++;
                }
            }
        }

         if($city != "")
        {
            foreach($c as $city)
            {
                if(strlen($city)>3)
                {
                    if($i==0)
                    {
                        $sql.=" WHERE";
                    }
                    else
                    {
                        $sql.=" AND";
                    }
                    $sql.=" city LIKE '%$city%'";
                    $i++;
                }
            }
        }
            
        
        if (isset($sql)!=0)
        {

    
            $req=$bdd->query($sql) or die(mysql_error());
            $count = $req->rowCount();
            echo $count." resultat(s)";

            while ($donnees = $req->fetch())
            {

                echo'<hr>';

                ?>
                <div id="accueil"> 
        Titre de l'annonce : <strong><?php echo $donnees['title'] ?> </strong>
    
    <br /> Nom du produit : <strong><?php echo $donnees['name'] ?> </strong>
    <br /> catégorie de produit : <strong><?php echo $donnees['category'] ?></strong>
    
    <br /> Département de disponibilité : <strong><?php echo $donnees['location'] ?> </strong>
    <br /> Ville où le produit est disponible : <strong> <?php echo $donnees['city'] ?></strong>

    <br /> PRIX et Quantitée: <strong> <?php echo $donnees['prix'] ?> € / <?php echo $donnees['quantitee'] ?>Kg</strong>

    
</div>
    <div id ="accueilimg">
     <br /> <img src=" ../controller/<?php  echo $donnees['image_nom'] ?>"/> </strong>
     <br />
     <br />
    </div>
    <!--On fait un lien vers la page annonce avec le trasfert de l'Id de l'annonce concerné en caché-->
    <div id ="lienPageAnnonce">
        <form method="post" action="../controller/annonceModule.php" >
     <input type="hidden" name="id" value= "<?php echo($donnees['id']) ;?>" />
     <button type="submit" name="valider">Détail de l'annonce</button>
    </form> <br />
</div>
<?php

            }
        }
        }
    ?>