<?php session_start();  ?>
<?php include('model/bdd.php'); ?>
<DOCTYPE html>
        
<html>
        <head>
                <meta charset="utf-8" />
                <title>GreenSwitch</title>
                <link href="style.css" rel="stylesheet" />
                <link rel="stylesheet" type="text/css" href="style_carrousel3.css"/>
  
<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
                <script src="js_carrousel3.js" type="text/javascript"></script>
                
        
                <script language="javascript"></script>

                <script src="js/jquery.min.js"></script>
                <script src="js/jquery.dropotron.min.js"></script>
                <script src="js/jquery.scrolly.min.js"></script>
                <script src="js/jquery.onvisible.min.js"></script>
                <script src="js/skel.min.js"></script>
                <script src="js/skel-layers.min.js"></script>
                <script src="js/init.js"></script>
                <script src="js/popupccm.js"></script>
        </head>
        <body>
<header>
            <div>
                <div id="logo">
                    <h1><a href="view/Accueil.php">GreenSwitch</a></h1>
                    <span>Just Switch it !</span>
                </div>
            </div>
                <nav>
       
                <ul>
                
                         <li><a href="view/Accueil.php" title="">Accueil</a></li>
                        <li><a href="view/rechercheAvancee.php" title="">Rechercher</a></li>
 
    <?php
       
        if(!isset($_SESSION["userID"]))
                {
                    echo "<li><a href=\"view/InscriptionConnexion.php\">Inscription/Connexion</a></li>";
                }
        elseif (isset($_SESSION["userID"]) && $_SESSION["userID"])
                {
                    echo "<li><a href=\"controller/PosterAnnonceModule.php\">Poster une annonce</a></li>";
                    echo "<li><a href=\"view/MonCompte.php\">".$_SESSION["userPrenom"]."</a></li>";
                    if(isset($_SESSION["adminID"]) && $_SESSION["adminID"] == 1){
                        echo "<li><a href=\"view/Admin.php\">Administration</a></li>";
                    }
                    echo "<li><a href=\"view/deco.php\">Déconnexion</a></li>";
                    
                }

    ?>
                       
                </ul>
       
        </nav>
        </header>
        

	<div id="presentation">
    <p><strong>Bonjour et bienvenue sur notre site de partage et de troc de fruits et légumes.
Vous pouvez poster des annonces sur des produits que vous voulez vendre et rechercher les produits de votre choix.</strong>
</p>
<br />
<div id="annonce">
        <div >
            <div class="title">
                <h2>Welcome</h2>
                <span>Bienvenue sur GreenSwitch !</span> 
            </div>
        </div>
    </div>
 <div id="carrousel">
        <ul>
            <li><img src="../images/photo1.jpg"/></li>
            <li><img src="../images/photo2.jpg"/></li>
            <li><img src="../images/photo3.jpg"/></li>
    </ul>
</div>
<!--On inclu le script javascript du carrousel -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>$(document).ready(function(){
        
    var $carrousel = $('#carrousel'), // on cible le bloc du carrousel
        $img = $('#carrousel img'), // on cible les images contenues dans le carrousel
        indexImg = $img.length - 1, // on définit l'index du dernier élément
        i = 0, // on initialise un compteur
        $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)

    $img.css('display', 'none'); // on cache les images
    $currentImg.css('display', 'block'); // on affiche seulement l'image courante

    $carrousel.append('<div class="controls"> <span class="prev"></span> <span class="next"></span> </div>');

    $('.next').click(function(){ // image suivante

        i++; // on incrémente le compteur

        if( i <= indexImg ){
            $img.css('display', 'none'); // on cache les images
            $currentImg = $img.eq(i); // on définit la nouvelle image
            $currentImg.css('display', 'block'); // puis on l'affiche
        }
        else{
            i = indexImg;
        }

    });

    $('.prev').click(function(){ // image précédente

         // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"

        if( i >= 0 ){
            $img.css('display', 'none');
            $currentImg = $img.eq(i);
            $currentImg.css('display', 'block');
        }
        else{
            i = 0;
        }

    });

    function slideImg(){
        setTimeout(function(){ // on utilise une fonction anonyme
                            
            if(i < indexImg){ // si le compteur est inférieur au dernier index
            i++; // on l'incrémente
        }
        else{ // sinon, on le remet à 0 (première image)
            i = 0;
        }

        $img.css('display', 'none');

        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');

        slideImg(); // on oublie pas de relancer la fonction à la fin

        }, 4000); // on définit l'intervalle à 2000 millisecondes (7s)
    }

    slideImg(); // enfin, on lance la fonction une première fois

    });
    </script>
</div>
</div>
        <br />
        
</div>
    

    <br />
    
      
 <footer>
    <hr />
    <div id="tbox1">
        
            <h3>Nous Contacter</h3>
        
        <p>Pour tout problème, vous trouverez ici les différents moyens de nous contacter.</p>
        <a href="view/NousContacter.php"><button>En savoir +</button></a>
    </div>
    <div id="tbox2">
        
            <h3>CGU</h3>
        
        <p>Les Conditions générales de vente du site sont à votre disposition si besoin est.</p>
        <a href="view/CGU.php"><button>En savoir +</button></a>
    </div>
    <div id="tbox3">
        
            <h3>Charte du site</h3>
        
        <p>La charte du site doit être connue et respectée par chaque utilisateur du site.</p>
        <a href="view/Charte.php"><button>En savoir +</button></a>
    </div>
    <div id="tbox4">
        
            <h3>FAQ</h3>
        
        <p>Vous avez des questions ? Regardez ici, les réponses y sont peut-être déjà !!</p>
        <a href="view/faq.php"><button>En savoir +</button></a>
    </div>
    </footer>
    </body>
</html>

