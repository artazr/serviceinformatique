<?php
include('../model/bdd.php');


$resultat = null;
    //On vérifie que l'email existe et que le password et l'email ne sont pas vide
    if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['password']) )  
    {
        //On vérifie que le password existe
        if ( isset($_POST['password']))
        {
            $email = htmlspecialchars($_POST["email"]);
            // Criptage du mot de passe
            $password = sha1($_POST['password']);
            // Vérification des identifiants
                $req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE email = :email AND password = :password');
                $req->execute(array(
                    'email' => $email,
                    'password' => $password));
                $resultat = $req->fetch();

        }
        if ($resultat!=NULL) {
              //On déclare les différentes variables SESSION qui seront attitré à l'utilisateur connecté
                $_SESSION["userID"] = $resultat["id"];
                $_SESSION["userMail"] = $_POST["email"];
                $_SESSION["adminID"] = $resultat["admin"];
                $_SESSION["userPrenom"] = $resultat["prenom"];
                header ('Location: ../view/Accueil.php');
               
        }

        elseif (!$resultat)
        {
            echo "Mauvais identifiant ou mot de passe ! ";
            
        }

          
    }
?>