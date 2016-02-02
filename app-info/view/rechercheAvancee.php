<?php include ('header.php'); ?>



 <div id="recherche">
       
            <div class="title">
                <h2>Recherche</h2>
                <span>Effectuez ici vos recherches par filtres !</span> 
            </div>
                
 <form method="GET" action="rechercheAvancee.php">
        <input type="text" class="text" name="words" placeholder="Titre de l'annonce" />
        <SELECT name="category" placeholder="Catégorie du produit" >
            <OPTION value="category">Catégorie
            <OPTION value="fruit">fruit
            <OPTION value="legume">légume
            <OPTION value="champignon">champignon
            <OPTION value="autre">autres
        </SELECT>   
        <input type="text" class="text" name="department" placeholder="Département"/>
        <input type="text" class="text" name="cities" placeholder="Ville"/>
        <input type="text" class="text" name="vendeur" placeholder="Vendeur"/>
        <button type="submit" id="valider">Poster</button>
    </form>
                
    <?php include('../controller/RechercheAvanceeModule.php'); ?>
                
</div>
  
                
<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            
                <script>
    $('rechercheVilles').autocomplete({source : liste});
                </script> -->
                
    <?php include ('footer.php'); ?>