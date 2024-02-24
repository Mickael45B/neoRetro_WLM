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

        <meta name="viewport" content="width=device-width, initial-scale=1"><meta charset="UTF-8">

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
    <?php
      if(isset($_COOKIE['pseudo_destinataire'])){
        unset($_COOKIE['pseudo_destinataire']);
      }else{
        setcookie('pseudo_destinataire', '', time()+3600, '/', '', true, true);
      }
      if(isset($_COOKIE['langue_utilisateur'])){
        unset($_COOKIE['pseudo_destinataire']);
      }else{
        setcookie('langue_utilisateur', '', time()+3600, '/', '', true, true);
      }
      if(isset($_COOKIE['pseudo_utilisateur'])){
        unset($_COOKIE['pseudo_utilisateur']);
      }else{
        setcookie('pseudo_utilisateur', '', time()+3600, '/', '', true, true);
      }
    ?>
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
  <!--<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
  <div class="file-upload">
    <input id="inputFile" type="file" name="photo"  accept="image/jpg, image/jpeg, image/png, image/gif" required>
    </div>
    <button id="bouttonphoto" type="submit" name="photoACharger">Ajouter la photo</button>
  </form>-->
  <div id="message"></div>
<script>
  $(document).ready(function() {
  //buttonP3Sound = $('#envoyerSon');    
  let bubbleContainers;
  const buttonP3Image = document.querySelector('.P3_downimage');
  //$('.P3_voice-clip');
  buttonP3Image.addEventListener('click', function (event) {
        // Supprimer la bulle si elle existe déjà
        if (bubbleContainers) {
            bubbleContainers.remove();
            bubbleContainers = null;
            return;
        }

        // Créer la bulle cliquable
        bubbleContainers = document.createElement('div');
        bubbleContainers.classList.add('bubbles-containers');

        // Positionner la bulle cliquable juste en dessous du bouton
        const buttonRecta = buttonP3Image.getBoundingClientRect();
        bubbleContainers.style.top = buttonRecta.bottom + 'px';
        bubbleContainers.style.left = buttonRecta.left + 'px';
        
        // En-tête "envoyer GIF"
        const headers = document.createElement('div');
        headers.classList.add('headers');
        headers.innerHTML = 
        `<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
          <div class="file-upload">
            <input id="inputFile" type="file" name="photo" accept="image/jpg, image/jpeg, image/png, image/gif" required>
          </div>
          <input id="nomDeLaPhot" name="photo" required placeholder="donne un nom a ton image">
          <button id="bouttonphoto" type="submit" name="photoACharger">Ajouter la photo</button>
        </form>`;
        bubbleContainers.appendChild(headers);
        // Ajouter la bulle cliquable à la page
        document.body.appendChild(bubbleContainers);

        // Gestionnaire d'événements pour fermer la bulle si l'utilisateur clique ailleurs
        document.addEventListener('click', function (event) {
            if (!bubbleContainers.contains(event.target) && event.target !== buttonP3Image) {
                bubbleContainers.remove();
                bubbleContainers = null;
            }
        });
    });
















    $('#uploadForm').submit(function(event) {// Ajout d'un gestionnaire d'événement pour détecter le changement de fichier sélectionné
      $('#inputFile').on('change', function() {
          // Accès aux fichiers sélectionnés
          var files = input.files;

          // Vérifier s'il y a des fichiers sélectionnés
          if (files.length > 0) {
              // Accéder à la taille du premier fichier sélectionné
              var taillePremierFichier = files[0].size;
              if (taillePremierFichier<=5000000) {

                event.preventDefault(); // Empêcher le formulaire de se soumettre normalement
                  var formData = new FormData(this);

                  $.ajax({
                      url: $(this).attr('action'),
                      type: 'POST',
                      data: formData,
                      processData: false,
                      contentType: false,
                      success: function(response) {
                          $('#message').html(response); // Afficher le message de succès ou d'erreur
                      },
                      error: function(xhr, status, error) {
                          console.error('Erreur lors de l\'envoi du fichier : ', error);

                      }
                    });
                statutEnvoi="Accepté";
              }else{
                statutEnvoi="Refusé";
              }
              console.log("Taille du premier fichier sélectionné : " + taillePremierFichier + " octets : il est donc : " + statutEnvoi);
          }
      });
    });
  });
</script>


<?php
/*
// Récupérer le nom du fichier
$nomFichier = 'totoPartEnVacance.jpeg';

// Chercher la position de "."
$positionPoint = strrpos($nomFichier, '.');
      // Extraire la première partie du nom du fichier
      $premierePartie = substr($nomFichier, 0, $positionPoint);

      // Générer une chaîne aléatoire pour la nouvelle première partie
      $nouvellePremierePartie = genererMotDePasse(); // Utilisez la fonction genererMotDePasse() que nous avons définie précédemment

      // Construire le nouveau nom de fichier
      $nouveauNomFichier = $nouvellePremierePartie . '.' . $extension;

      // Renommer le fichier
      $cheminAncienFichier = $cheminDossier . '/' . $nomFichier;
      $cheminNouveauFichier = $cheminDossier . '/' . $nouveauNomFichier;
      rename($cheminAncienFichier, $cheminNouveauFichier);


*/

?>
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
