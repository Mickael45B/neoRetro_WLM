<?php 
			session_start();
			date_default_timezone_set("Europe/Paris"); 
?>
<!DOCTYPE html>
<?php 	
		include 'conectBDD.php'; 
?>
<html>

	<head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="Capture d'écran 2023-12-24 191519.png" type="image/ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Festive&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

        <title>
            neo-retro WLM
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
        <script  type ="module"  src ="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script> 
        
        <!-- <link rel="stylesheet" type="text/css" href="style_chat.css"> --><!-- GENERAL -->

        <link rel="stylesheet" type="text/css" href="01_connexion/styleGeneral.css"><!-- connexion -->
        <link rel="stylesheet" type="text/css" href="02_listedeconnectes/style_listeConnecte.css"><!-- liste de connecté -->
        <link rel="stylesheet" type="text/css" href="03_discution/style_discution.css"><!-- discution -->
	</head>
    <style>
    body {
                background: url(00_general/fondEcran/labyrintheBrique.jpg);
                margin: 0;
                height: 100vh; /* Utiliser 100vh pour prendre la hauteur complète de l'écran */
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;
            }        
            #P0_logoDeDemarageButton{
                height:100px;
            }
            #messageInfoConnexion{
        height: 40px;
    }
    </style>
	<body>
    <!-- PARTIE 00 ET PARTIE 01 ==> ----------------------------------------------------------------------------------------------------------------- LOGO DE DEMMARAGE ET FENETRE DE CONNEXION ==> -->
        <?php     
            require_once "01_connexion/Vue_partie00_01.php";
        ?>
    <!-- <== PARTIE 00 ET PARTIE 01 ----------------------------------------------------------------------------------------------------------------- <== LOGO DE DEMMARAGE ET FENETRE DE CONNEXION -->

    <!-- PARTIE 02 ==> ----------------------------------------------------------------------------------------------------------------------------------------------------- LISTE DE CONNECTES ==> -->
        <?php     
            require_once "02_listedeconnectes/Vue_partie02.php";
            ?>
    <!-- <== PARTIE 02 ----------------------------------------------------------------------------------------------------------------------------------------------------- <== LISTE DE CONNECTES -->

    <!-- PARTIE 03 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CHAT ==> -->
        <?php     
            require_once "partie03.php";
            ?>
    <!-- <== PARTIE 03 -------------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CHAT -->
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ SCRIPTS ==> -->
    <script>
        $(document).ready(function() {  

          $('#P1_app__login-button').on('click', function(){
          
            const logSaisiePseudo=$('#saisiePseudo').val();

            ajax_conontenuDynamiqueContact(logSaisiePseudo);

            function ajax_conontenuDynamiqueContact(logSaisiePseudo) {
              $.ajax({
                method: "POST",
                url: "02_listedeconnectes/listeDifferentsTypeContacts.php",
                data: { logSaisiePseudo: logSaisiePseudo},
              })
              .done(function (retour3_html) {
                //console.log(retour3_html);
                $('#contenuDynamiqueListeContact').html(retour3_html);
                
              })
              .fail(function () {
                alert("error dans ajax_conontenuDynamiqueContact");
              });
            };

          });

        });
      </script>

      <script src="01_connexion/script_connexion.js"></script><!-- script pour la fenetre de connexion -->
      <!--<script src=""></script> --><!-- pas de script pour la liste de connectes -->
      <script src="03_discution/script_discution.js"></script><!-- script pour la fenetre de discution -->
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ <== SCRIPTS -->

  </body>
</html>
