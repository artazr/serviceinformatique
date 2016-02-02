<?php session_start();
	try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=serviceizbinfo.mysql.db;dbname=serviceizbinfo;charset=utf8', 'serviceizbinfo', 'Alexpilote1');
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
		        die('Erreur : '.$e->getMessage());
		}
?>


