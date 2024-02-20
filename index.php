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
        <link rel="shortcut icon" href="logo.png" type="image/ico">
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
	<body  id="myBody" class="myClass">
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
            require_once "03_discution/Vue_partie03.php";
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
                url: "02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.php",
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
function updateCustomProperty() {
  document.documentElement.style.setProperty('--largueur_fenetre', window.innerWidth);
      document.documentElement.style.setProperty('--hauteur_fenetre', window.innerHeight);
    }

// Mettre à jour la variable CSS personnalisée lors du chargement de la page
window.addEventListener('load', updateCustomProperty);

// Mettre à jour la variable CSS personnalisée lors du redimensionnement de la fenêtre
window.addEventListener('resize', updateCustomProperty);

</script>
      <script src=""></script><!--   pas de script pour la liste de connectes -->
      <!--<script src="03_discution/fonctionnement/script_discution.js"></script> script pour la fenetre de discution -->
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ <== SCRIPTS -->

  </body>
</html>
