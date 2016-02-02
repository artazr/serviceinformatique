<?php include ('header.php'); ?>

<h2 style=text-align:center><br>Service clientèle</h2>

<p style=text-align:center>Pour toute question, n'hésitez pas à contacter notre service clientèle en remplissant le formulaire ci-dessous.</p>

<?php echo $info; ?>
<div id ="formulaireContact">
<form method="post" action="../view/NousContacter.php">
                    
                        <!--Formulaire-->
                            <input type="text" class="text" name="email" placeholder="Votre email" />
                        
                       
                            <input type="text" class="text" name="Objet" placeholder="Objet" />

                            
                            <textarea type="text" class="text" name="Message" placeholder="Message "></textarea>

                        

                        <p style=text-align:center><button type="submit" name="Envoi" value="Envoi">Envoyer</button></p>
</form>
<?php
if ($_POST['Envoi']){
//Envoi de mail
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                  {
                    $passage_ligne = "\r\n";
                  }
                  else
                  {
                    $passage_ligne = "\n";
                  }

			   $to      = 'alexmorand26@gmail.com';
		     $subject = $_POST['Objet'];
		     $message = $_POST['Message'];
		     $header = "From:". $_POST['email']."\r\n"; 
         $header .= "Disposition-Notification-To:mon@adressemail.com"; // c'est ici que l'on ajoute la directive
		
		     mail($to, $subject, $message, $header);

             $info = "Votre message à bien été envoyé";
}
?>
</div>

<?php include ('footer.php'); ?>