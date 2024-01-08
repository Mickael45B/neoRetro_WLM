<?php
// session_start();
// echo $_SERVER['REMOTE_ADDR'];


// ---------- Connection a la base de donnees ----------

if ($_SERVER['REMOTE_ADDR']=="127.0.0.1" || $_SERVER['REMOTE_ADDR']=="::1") 
	{ 

		try
			{	
				$bdd = new PDO("mysql:host=localhost;dbname=forum", "***", "***"); // modifiez les "***" selon votre cas
				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(Exception $e)	{die($erreur_sql='Erreur connect bd: '.$e->getMessage());}

	} 
else 
	{

		try
			{	
				$bdd = new PDO("mysql:host=localhost;dbname= forum", "login bd ", "pass");
				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(Exception $e)	{die($erreur_sql='Erreur connect bd: '.$e->getMessage());}

	}
// ---------- fin de connection a la base de donnees ----------


?>