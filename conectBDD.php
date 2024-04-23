<?php
// session_start();
// echo $_SERVER['REMOTE_ADDR'];


// ---------- Connection a la base de donnees ----------

if(getenv('JAWSDB_MARIA_URL')!==false){;
    $dbparts = parse_url(getenv('JAWSDB_MARIA_URL'));
    
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');
    }
    else{
      if ($_SERVER['REMOTE_ADDR']=="127.0.0.1" || $_SERVER['REMOTE_ADDR']=="::1") 
	{ 

		try
			{	
				$bdd = new PDO("mysql:host=localhost;dbname=forum; charset=utf8", "", "");
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
    }
// ---------- fin de connection a la base de donnees ----------

// Parse the DATABASE_URL to extract connection details
/*
$url = parse_url(getenv("DATABASE_URL"));

// Connect to the database using extracted details
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1); // Remove the leading slash from the path

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}*/
?>
