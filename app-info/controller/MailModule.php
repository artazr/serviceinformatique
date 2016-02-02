<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');
    //Vérification de l'existence des variables
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['emaildestinataire'])&& !empty($_POST['objet']) && !empty($_POST['message']) )  
    {
                    //Déclaration des variables 
              $nom     = htmlspecialchars($_POST["nom"]);
              $email     = htmlspecialchars($_POST["email"]);
              $emaildestinataire     = htmlspecialchars($_POST["emaildestinataire"]);
              $objet      = htmlspecialchars($_POST["objet"]);
              $message      = htmlspecialchars($_POST["message"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO messages(nom, email, emaildestinataire, objet, message) VALUES(:nom, :email, :emaildestinataire, :objet, :message )');
        $req->execute(array(
            'nom' => $nom,
            'email' => $email,
            'emaildestinataire' => $emaildestinataire,
            'objet' => $objet,
            'message' => $message
            )); 
            
                
                $info = "Votre message à bien été envoyé ! ";
            }
        else
            {
                $info = "Tu as du oublié de remplir un champ.";

            }
    

    include('../view/newmessage.php');


?>