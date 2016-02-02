<?php session_start();  ?>

<DOCTYPE html>
        
<html>
        <head>
                <meta charset="utf-8" />
                <title>GreenSwitch</title>
                <link href="../style.css" rel="stylesheet" />
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
                    <h1><a href="../view/Accueil.php">GreenSwitch</a></h1>
                    <span>Just Switch it !</span>
                </div>
            </div>
                <nav>
       
                <ul>
                
                         <li><a href="../view/Accueil.php" title="">Accueil</a></li>
                        <li><a href="../view/rechercheAvancee.php" title="">Rechercher</a></li>
 
<?php
       
        if(!isset($_SESSION["userID"]))
                {
                    echo "<li><a href=\"../view/InscriptionConnexion.php\">Inscription/Connexion</a></li>";
                }
        elseif (isset($_SESSION["userID"]) && $_SESSION["userID"])
                {
                    echo "<li><a href=\"../controller/PosterAnnonceModule.php\">Poster une annonce</a></li>";
                    echo "<li><a href=\"../view/MonCompte.php\">".$_SESSION["userPrenom"]."</a></li>";
                    if(isset($_SESSION["adminID"]) && $_SESSION["adminID"] == 1){
                        echo "<li><a href=\"../view/Admin.php\">Administration</a></li>";
                    }
                    echo "<li><a href=\"../view/deco.php\">Déconnexion</a></li>";
                    
                }

?>
                       
                </ul>
       
       </nav>
        </header>

        
        