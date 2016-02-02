<?php
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

//création des variables
$prenom = null;
$nom = null;
$email = null;
$password = null;
$password1 = null;
$age = null;
$telephone = null;

$emailconf=null;
$objet=null;
$message=null;
    //Vérification de l'existence des variables
    if (isset($_POST['prenom']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])&& !empty($_POST['password']) && !empty($_POST['password1']) && !empty($_POST['age']) && !empty($_POST['telephone']) )  
    {
        //Déclaration des variables 
        if ( $_POST['password'] == $_POST['password1'])
              $prenom     = htmlspecialchars($_POST["prenom"]);
              $nom     = htmlspecialchars($_POST["nom"]);
              $email     = htmlspecialchars($_POST["email"]);
              $password      = sha1($_POST["password"]);
              $age     = htmlspecialchars($_POST["age"]);
              $telephone      = htmlspecialchars($_POST["telephone"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO users(prenom, nom, password, email, age, telephone, date_inscription) VALUES(:prenom, :nom, :password, :email, :age, :telephone, CURDATE())');
        $req->execute(array(
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'age' => $age,
            'telephone' => $telephone,
            'password' => $password
            ));
        //Vérification de la similitude du mot de passe
        if (isset($_POST['valider']) && $_POST['password'] == $_POST['password1'])
            {
echo "Vous venez de vous inscrire, Bienvenue !! Un mail vient de vous être envoyé, 
cliquez sur le lien à l'intérieur pour confirmer votre inscription. <br />
Vous allez être redirigé dans 5 secondes . . .";
                //Envoi de mail
                  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                  {
                    $passage_ligne = "\r\n";
                  }
                  else
                  {
                    $passage_ligne = "\n";
                  }
           
				
			   $to      = $email;
		     $subject = 'Inscription GreenSwitch';
		     $message = 'Bonjour,'.$passage_ligne.'
         Nous vous envoyons ce mail pour vous souhaiter la bienvenue dans la communautée GreenSwitch.'.$passage_ligne.'
         N\'hésitez pas à aller vous connecter dès maintenant sur GreenSwitch pour profiter des annonces.
         '.$passage_ligne.$passage_ligne.'
         Cordialement,
        '.$passage_ligne.'
         L\'équipe GreenSwitch.';
		     
		//On envoi le mail
		     mail($to, $subject, $message);

             header ('Location: ../view/InscriptionConnexion.php');
	            

            }
        //Vérification de la similitude du mot de passe
       elseif (isset($_POST['valider']) && $_POST['password'] != $_POST['password1'])
        
            {
                echo"tu n'as pas rentré le même mot de passe";

            }
        else
            {
                echo"quelque chose ne vas pas !!";

            }
    }
?>