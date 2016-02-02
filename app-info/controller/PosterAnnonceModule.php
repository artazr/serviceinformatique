<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');


$erreur = "remplissez bien tous les champs ;)";



    //Vérification de l'existence des variables
    if (isset($_POST['upload']))  
    {
              $title     = htmlspecialchars($_POST["title"]);
              $name     = htmlspecialchars($_POST["name"]);
              $category     = htmlspecialchars($_POST["category"]);
              $location      = htmlspecialchars($_POST["location"]);
              $city      = htmlspecialchars($_POST["city"]);
              $prix = htmlspecialchars($_POST["prix"]);
              $quantitee = htmlspecialchars($_POST["quantitee"]);
              $description      = htmlspecialchars($_POST["description"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO annonce(title, name, prenomPost, prenomPostEmail, category, location, city, prix, quantitee, description, date_mise_en_ligne, image_nom) VALUES(:title, :name, :prenomPost, :prenomPostEmail, :category, :location, :city, :prix, :quantitee, :description, CURDATE(), :image_nom)');

        if (!empty($_POST['title']) && !empty($_POST['name']) && !empty($_POST['category']) && 
          !empty($_POST['location']) && !empty($_POST['city']) && !empty($_POST['prix']) && !empty($_POST['description']) )
            {
                $req->execute(array(
            'title' => $title,
            'name' => $name,
            'prenomPost'=>$_SESSION['userPrenom'],
            'prenomPostEmail'=>$_SESSION['userMail'],
            'category' => $category,
            'location' => $location,
            'city' => $city,
            'prix'=> $prix,
            'quantitee' => $quantitee,
            'description'=> $description,
            'image_nom'=>$_FILES['fichier']['name']
            )); 

                $erreur = "Votre Annonce à bien été Postée ! ";
                
               //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                //$extension_upload = strtolower( strrchr($_FILES['fichier']['name'], '.'));
                   
              //if ( in_array($extension_upload,$extensions_valides) ) 
              // {
                          //On déplace la photo du produit
                          if(move_uploaded_file($_FILES['fichier']['tmp_name'], $_FILES['fichier']['name']))
                          {
                              //On vérifie si le titre ou le nom de l'annonce ne correspond pas à un mot recherché par un utilisateur
                                //dans la page et la table recherche annonce
                              $reponse = $bdd->query('SELECT * FROM recherche_annonce ');
                              $donnees = $reponse->fetch();
                            if($donnees['recherche_annonce']==$title || $donnees['recherche_annonce']==$name )
                                {
                                  //On envoi le mail à l'utilisateur qui a fait la recherche pour l'avertir qu'une annonce à été postée
                                  // et qui concerne ça recherche
                                  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                                        {
                                          $passage_ligne = "\r\n";
                                        }
                                        else
                                        {
                                          $passage_ligne = "\n";
                                        }
                                  $to      = $donnees['email'];
                                 $subject = 'Annonce postée suceptible de vous interresser';
                                 $message = 'Un annonce à été postée sur notre site et est suceptible de vous interresser'.$passage_ligne.'
                                 Rendez vous sur greenswitch !! ';
                                
                                    mail ($destinataire, $sujet, $message); // on envois le mail   
                                }
                          }
                          else
                          {
                             
                              $erreur= "fichier non enregistré";
                          }
                        
               // }
            }
    }
    include('../view/PosterAnnonce.php');
?>