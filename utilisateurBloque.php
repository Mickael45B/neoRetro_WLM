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


<?php
//utilisateurBloque.php
include 'conectBDD.php'; //connection a la BDD
date_default_timezone_set('Europe/Paris'); // Définit le fuseau horaire à Paris

// -------------------- BLOCAGE --------------------------------
    // 0= blocage temporaire : le temps que l'utilisateur change son mot de passe, son profil est bloque, au cas ou ses données de compte soit piratées.(blocage au niveau pseudo)
    // 1= 24h : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
    // 2= 15jours : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
    // 3= 30jours  : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
    // 4= 60jours  : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
    // 5= définitif  : trop d'activités annormales ont été découvertes, l'utilisateur ne pourra plus acceder au site.(blocage au niveau IP)
// -------------------- BLOCAGE --------------------------------
//$var1=$_GET['pseudo'];
//$var2=$_GET['token'];

//icone msn dessous icone inerdit -- en gros


// PARTIE XX ==> ---------------------------------------------------------------------------------------------------------------------------------------------- CE QUI EST TRAITE DANS CETTE PARTIE ==>
    // PARTIE XX.XX ==> -------------------------------------------------------------------------------------------------------------------------------------------------- RECUPERATION DES DONNEES ==>
        //Etape 01 : recuperer IP
            $ipEnCours=$_SERVER['REMOTE_ADDR'];
        //Etape 02 : chercher IP dans "repertoirebloquage"
            try {
                $sql = "SELECT * FROM  repertoirebloquage  WHERE BINARY IP=?";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array($ipEnCours));
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombreDeLignes = $stmt->rowCount();
        //Etape 03 : recuperation des donnees pour la page
            // Etape 03.01 : actif/inactif 
                $etatDuBlocage=$resultat['actif'];
            // Etape 03.01 : niv blocage
                $niveauDuBlocage=$resultat['niveau'];
            // Etape 03.01 : duree blocage
                switch ($niveauDuBlocage) {
                    case 1:
                        $dureeBlocage=25; //24heures +1h de decalage
                        break;
                    case 2:
                        $dureeBlocage=361;//360heures(15jours) +1h de decalage
                        break;
                    case 3:
                        $dureeBlocage=721;//720heures(30jours) +1h de decalage
                        break;
                    case 4:
                        $dureeBlocage=1441;//1440heures(60jours) +1h de decalage
                        break;
                    default :
                        $dureeBlocage=0;
                        break;
                }
            // Etape 03.01 : niv avertissement
                $nombreAvertisementBlocage=$resultat['avertissement'];
            // Etape 03.01 : timestamp infraction
                $timestampDuBlocage=$resultat['timestampblocage'];
            // Etape 03.01 : id pseudo avec lequel il s'est connecté
                $idUtiliseEnCoursDeBlocage=$resultat['pseudo'];
            // Etape 03.01 : nom pseudo
                try {
                    $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY ID_utilisateur=?";
                    $stmt = $bdd->prepare($sql);
                    $stmt->execute(array($idUtiliseEnCoursDeBlocage));
                } catch (Exception $e) {
                    print "Erreur ! " . $e->getMessage() . "<br/>";
                }
                $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
                $nombreDeLignes = $stmt->rowCount();
                $nomUtiliseEnCoursDeBlocage=$resultat['pseudo'];
    







    // <== PARTIE XX.XX ---------------------------------------------------------------------------------------------------------------------------------------- <== CE QUI EST TRAITE DANS CETTE PARTIE

// <== PARTIE XX ----------------------------------------------------------------------------------------------------------------------------------------------- <== CE QUI EST TRAITE DANS CETTE PARTIE

// PARTIE XX ==> ---------------------------------------------------------------------------------------------------------------------------------------------- CE QUI EST TRAITE DANS CETTE PARTIE ==>
    // PARTIE XX.XX ==> --------------------------------------------------------------------------------------------------------------------------------------- CE QUI EST TRAITE DANS CETTE PARTIE ==>

$timestamp = $timestampDuBlocage;

// Ajouter ... heures à la date
$nouvelleDate = strtotime('+'.$dureeBlocage.' hour', $timestamp);

// Formatter la nouvelle date
$nouvelleDateFormatee = date('d/m/Y H:i', $nouvelleDate);
$date = date('d/m/Y', $nouvelleDate);
$Heure = date('H:i', $nouvelleDate);

/*
echo "<h1>Vous avez été bloqué</h1><br>";
echo 'vous ne pourrez pluz vous connecter a ce site avant le :<br>'.$date.' à '.$Heure .'.<br>Untrop grand nombre d\'activités suspectes ont été détecté.
si vous souhaitez contester cette  désision, adressez un mail, en cliquant sur ce lien : <a href="mailto:michaloiret@gmail.com">Ouvrir Outlook</a>';*/
    // <== PARTIE XX.XX ---------------------------------------------------------------------------------------------------------------------------------------- <== CE QUI EST TRAITE DANS CETTE PARTIE

// <== PARTIE XX ----------------------------------------------------------------------------------------------------------------------------------------------- <== CE QUI EST TRAITE DANS CETTE PARTIE
?>
<link rel="stylesheet" type="text/css" href="../styleGeneral.css">
        <link rel="stylesheet" type="text/css" href="../01_connexion/styles/contenantStyle_partie00_01.css">
        <link rel="stylesheet" type="text/css" href="../01_connexion/styles/contenuStyle_partie00_01.css">
        <link rel="stylesheet" type="text/css" href="01_connexion/styles/style_partie00_01.css">




<div id="P1_CadreExterieur" class="P1_connexion_ASonCompte" data-vide="" value="" name="" style=""><!-- ENSEMBLE -->
    <div id="P1_Cadreinterieur" class="P1_app" data-vide="" value="" name="" style="width: 100%;"><!-- HAUT DE PAGE + CORP -->
        <div id="P1_enTete" class="P1_app__section P1_app__title" data-vide="" value="" name="" style=""><!-- HAUT DE PAGE -->
            <div id="P1_menuEntete" class="P1_app__icon P1_app__icon__expand centre_centre" data-vide="" value="" name="" style=""><></div>
            <div id="P1_titrePartie" class=" centre_centre P1_app__title--main" data-vide="" value="" name="" style="" >Bonjour , nous sommes désolé mais vous avez été bloqué</div>
            <div>
                <img id="logo_msn_Menu" class="" data-vide="" value="" name="" style="" src="../00_general/icones/fixe/logoMSN.png" alt="logo MSN">
            </div>
        </div>
        <div id="" class="" data-vide="" value="" name="" style="display: flex; justify-content: center; align-items: center;height:100%; width: 100%;">
            <div id="P1_cadreCorpConnexion2" class="P1_app__frame centre_centre" data-vide="" value="" name="" style="width: 100%; "><!-- CORP -->
            
                <div id="P1_cadreInterieurZoneSaisie" class="P1_app__login-inner centre_centre" data-vide="" value="" name="" style="width: 100%;   ">
                    <div id="containerblocage">
                        <div id="avertissement" class="image-container">
                            <img id="" class="" data-vide="" value="" name="" style="width:500px;height:500px;" src="../mise-en-garde.png">
                        </div>
                        <div id="logo" class="image-container">
                            <img id="" class="" data-vide="" value="" name="" style="width:200px;height:200px;" src="../png-clipart-aeon-wlm-people-icon-thumbnail-removebg-preview.png">
                        </div>
                        <div id="blocage"  class="image-container">
                            <img id="" class="" data-vide="" value="" name="" style="" src="../interdit.png">
                        </div>
                    </div>
                </div>
                
                <div id="toto">vous ne pourrez pluz vous connecter a ce site avant le :<br><?=$date.' à '.$Heure ?><br>Untrop grand nombre d\'activités suspectes ont été détecté.
si vous souhaitez contester cette  désision, adressez un mail, en cliquant sur ce lien : <a href="mailto:michaloiret@gmail.com">Ouvrir Outlook</a></div>
                
                <div id="toto2">mentions légales</div>
            </div>
        </div>

    </div>
</div>
<!-- <== PARTIE 01.01 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== FORMULAIRE -->

<!-- PARTIE 01.02 ==> ---------------------------------------------------------------------------------------------------------------------------------------------------- NOTIFICATION ==> -->
  <div id="" class="P1_app__notification" data-vide="" value="" name="" style="">
    <div id="" class="P1_app__notification__title" data-vide="" value="" name="" style="">
      <img  id="" class="P1_app__notification__title--icon" data-vide="" value="" name="" style="width:13px;" src="00_general/avatars/msn.png">
        MSN Messenger
      <span id="" class="P1_app__notification__close" data-vide="" value="" name="" style="">X</span>
    </div>
    <div id="" class="P1_app__notification__inner" data-vide="" value="" name="" style="">
      <div id="" class="P1_app__notification__user" data-vide="" value="" name="" style="">
        <div id="P1_app__notification__user--photo" class="" data-vide="" value="" name="" style="">
            <img id="" class="P1_app__notification__user--photo" data-vide="" value="" name="" style="width:50px;" src="00_general/avatars/msn.png">
        </div>
        <div id="" class="P1_app__notification__user--details" data-vide="" value="" name="" style="">
          <span id="" class="P1_notification-username" data-vide="" value="" name="" style=""></span><br>s'est connecté.
        </div>
      </div>
      <div id="" class="P1_app__notification__inner--logo" data-vide="" value="" name="" style="">
        <img id="" class="" data-vide="" value="" name="" style="" src="../00_general/icones/fixe/logoMSN.png">
      </div>
    </div>
  </div>










  <script>


function updateCustomProperty() {
  document.documentElement.style.setProperty('--largueur_fenetre', window.innerWidth);
      document.documentElement.style.setProperty('--hauteur_fenetre', window.innerHeight);
    }

// Mettre à jour la variable CSS personnalisée lors du chargement de la page
window.addEventListener('load', updateCustomProperty);

// Mettre à jour la variable CSS personnalisée lors du redimensionnement de la fenêtre
window.addEventListener('resize', updateCustomProperty);



console.log('<?= $etatDuBlocage ?>');

                if ('<?= $etatDuBlocage ?>'==1) {
                    $('#avertissement').fadeOut();
                    $('#blocage').fadeIn();console.log("cas1");
                    $('#P1_titrePartie').text('Bonjour , nous sommes désolé mais vous avez été bloqué'); 
                    
                    
                    var mail = '<a href="mailto:michaloiret@gmail.com">Ouvrir Outlook</a>';
$('#toto').html("Vous ne pourrez plus vous connecter à ce site avant le : " + '<?=$date.' à '.$Heure ?>' + ". Un trop grand nombre d'activités suspectes ont été détectées. Si vous souhaitez contester cette décision, veuillez adresser un mail en cliquant sur ce lien : " + mail);
                }else{
                    $('#avertissement').fadeIn();
                    $('#blocage').fadeOut();console.log("cas2");
                    $('#P1_titrePartie').text('Bonjour , nous vous adressont un avertissement');
                    $('#toto').text('Une activité suspecte a été détécté sur votre réseau, c\'est pourquoi nous vous adressond un avertissement, si cela devrait se reproduire nous nous verront dans l\'obligation de vous bloquer.');
                }

</script>



<style>
#P1_cadreCorpConnexion2{
    display: grid;height: 100%;
    grid-template-rows: 85% 10% 5%;



}
#P1_cadreInterieurZoneSaisie{

    grid-row: 1 / 2;
    height: 50px;
}










#containerblocage  {

display: flex;
justify-content: center;
align-items: center;
width: 100%;
height: 100%;
}
#toto{
    grid-row: 2 / 3;width: 100%;
 
}
#toto2{
    grid-row: 3 / 4;
 
}

#containerblocage div {  
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 100%;
    max-height: 100%;    
    
    }
</style>



















