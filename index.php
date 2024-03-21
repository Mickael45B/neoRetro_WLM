<?php 
  session_start();
  date_default_timezone_set("Europe/Paris"); 

  // REMARQUE ===> Cette page est a considere comme un "cadre", un "HUB", elle structure le site.

  /*
    - Nom du fichier : index.php 
    - Type : vue
    - Language(s) : HTML / PHP

    LES ATTRIBUTS/VALEURS DES BALISES SERONT ORGANISE DE LA FACON SUIVANTE :
      <... id="" class="" data-...="" value="" name="" style="" --DIVERS-- >

  */
  ?>
<!DOCTYPE html>
<?php 	
		include 'conectBDD.php'; 
?>
<html>

	<head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="bibliotheque/00_GENERAL/logo.png" type="image/ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Festive&display=swap" rel="stylesheet">

        <title>
            neo-retro WLM
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1"><meta charset="UTF-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
        <script  type ="module"  src ="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script> 
        
	</head>

	<body  id="myBody" class="myClass" data-vide="" value="" name="" style="">
    <?php

include 'conectBDD.php'; //connection a la BDD
$ipEnCours=$_SERVER['REMOTE_ADDR'];

try {
$sql = "SELECT * FROM  repertoirebloquage WHERE IP=?";
$stmt = $bdd->prepare($sql);
$stmt->execute(array($ipEnCours));
} catch (Exception $e) {
die("Erreur de base de données : " . $e->getMessage() . "<br/>");
}
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
$nombreDeLignes = $stmt->rowCount();

if ($nombreDeLignes>=1) {// si l'ip de l'utilisateur est bloqué, il est redirigé vers une autre page, l'accés au site lui sera interdit le temps de son bloquage
if ($resultat['actif']==1) {
header("Location: ../utilisateurBloque.php");
exit;
}
}



    //a decommenter apres instalation certif ssl
      if(isset($_COOKIE['pseudo_destinataire'])){
        unset($_COOKIE['pseudo_destinataire']);
      }else{
        setcookie('pseudo_destinataire', '', time()+900, '/', '', true, true);
      }
      if(isset($_COOKIE['langue_utilisateur'])){
        unset($_COOKIE['pseudo_destinataire']);
      }else{
        setcookie('langue_utilisateur', '', time()+900, '/', '', true, true);
      }
      if(isset($_COOKIE['pseudo_utilisateur'])){
        unset($_COOKIE['pseudo_utilisateur']);
      }else{
        setcookie('pseudo_utilisateur', '', time()+900, '/', '', true, true);
      }
    ?>
    <!-- PARTIE 00 ET PARTIE 01 ==> ----------------------------------------------------------------------------------------------------------------- LOGO DE DEMMARAGE ET FENETRE DE CONNEXION ==> -->
        <?php     
            require_once "01_connexion/Vue_partie00_01.php";
        ?>
    <!-- <== PARTIE 00 ET PARTIE 01 ----------------------------------------------------------------------------------------------------------------- <== LOGO DE DEMMARAGE ET FENETRE DE CONNEXION -->

    <!-- PARTIE 02 ==> ----------------------------------------------------------------------------------------------------------------------------------------------------- LISTE DE CONNECTES ==> -->
        <?= '<section id="page2"></section>'?>            
    <!-- <== PARTIE 02 ----------------------------------------------------------------------------------------------------------------------------------------------------- <== LISTE DE CONNECTES -->

    <!-- PARTIE 03 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CHAT ==> -->
        <?php     
            require_once "03_discution/Vue_partie03.php";
            ?>
    <!-- <== PARTIE 03 -------------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CHAT -->

    <!-- PARTIE 04 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------------------ LIENS ==> -->
      <!-- API -->
        <!-- Pas de fichier(s) pour cette partie -->

      <!-- fonctionnement -->
        <!-- Pas de fichier(s) pour cette partie -->

      <!-- Dynamique -->
        <!-- Pas de fichier(s) pour cette partie -->

      <!-- Style --> 
        <link rel="stylesheet" type="text/css" href="styleGeneral.css"><!-- feuille de style utilise pour toutes les pages  -->

      <!-- Animation -->
        <!-- Pas de fichier(s) pour cette partie -->
    <!-- <== PARTIE 04 ------------------------------------------------------------------------------------------------------------------------------------------------------------------ <== LIENS -->
  </body>
</html>
