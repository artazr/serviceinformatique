<?php include ('header.php'); ?>


	<div id="annonce">
	 	<div >
            <div class="title">
                <h2> Annonce</h2>
                <span>Regardez le détail de l'annonce ! </span> 
            </div>
            <div >
                    <ul>
                        <li>
                            <!-- On inclu la page annonce Module-->
                            <?php include ('../controller/annonceModule.php'); ?>
                        </li>
                    </ul> 
            </div>
        </div>
	</div>

    <br />
    
        <?php include ('footer.php'); ?>

