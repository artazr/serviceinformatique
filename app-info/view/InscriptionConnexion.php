<?php include ('header.php');?>

        <div id="inscription">
            <div class="title">
                <h2>Inscrivez-vous !</h2>
                <span>Inscription gratuite et rapide !</span> 
            </div>
            <div>
                <!-- Formulaire d'inscription-->
                <form method="post" action="../controller/InscriptionModule.php">
                   
                        <div>
                            <input type="text" class="text" name="nom" placeholder="Nom" />
                        </div>
                        <div>
                            <input type="text" class="text" name="prenom" placeholder="Prénom" />
                        </div>
                        <div>
                            <input type="email" class="text" name="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="number" class="text" name="age" placeholder="Age" />
                        </div>
                        <div>
                            <input type="number" class="text" name="telephone" placeholder="Téléphone" />
                        </div>
                        <div>
                            <input type="password" class="text" name="password" placeholder="Mot de passe" />
                        </div>
                        <div >
                            <input type="password" class="text" name="password1" placeholder="Confirmation du mot de passe" />
                        </div>
                   
                    
                        <button type="submit" name="valider">S'Inscrire</button>
                   
                        <!-- Appel de la page php d'inscritpion -->
                        <?php include('../controller/InscriptionModule.php'); ?>
                </form>
                
            </div>
        </div>
        <div id="connexion">
            <div class="title">
                <h2>Connectez-vous !</h2>
                <span>Connectez-vous pour pouvoir échanger !</span>
            </div>
            <div>
                <!-- Formulaire de connexion-->
                <form method="post" action="../controller/ConnexionModule.php">
                    <div>
                        <div>
                            <input type="email" class="text" name="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="password" class="text" name="password" placeholder="Mot de passe" />
                        </div>
                    </div>
                    
                        <button type="submit" name="valider">Se connecter</button> 
                    
                        <!-- Appel de la page php d'inscritpion -->
                        <?php include('../controller/ConnexionModule.php'); ?>
                </form>

            </div>
        </div>
     <?php include ('footer.php'); ?>


