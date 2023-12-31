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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style_Copie.css">

        <title>
            neo-retro WLM
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script  type ="module"  src ="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script> 
        
        <!-- <link rel="stylesheet" type="text/css" href="style_chat.css"> --><!-- GENERAL -->

        <link rel="stylesheet" type="text/css" href="01_connexion/styleGeneral.css"><!-- connexion -->
        <link rel="stylesheet" type="text/css" href="01_connexion/style_connexion.css"><!-- connexion -->
        <link rel="stylesheet" type="text/css" href="02_listedeconnectes/style_listeConnecte.css"><!-- liste de connecté -->
        <link rel="stylesheet" type="text/css" href="03_discution/style_discution.css"><!-- discution -->


	</head>

	<body>

  <?php 
      /*
        NOTES

        DONNES ...
      */
    ?>
  
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
    <!-- PARTIE 01 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->
      <?php 
        /*
          NOTES :
            - Cette partie est juste esthétique, la seule action possible sera de cliquer sur un logo.

          DONNES ENTRANTES :
            - Aucunes données provenant d'autres parties ou d'autres fichiers ne sont nécésaires au traitement de cette partie.
        */
      ?>
      <div id="P0_logoDeDemarage" >
        <a href="#" >
          <img id="P0_logoDeDemarageButton" src="00_general/icones/iconeDemarage.png" alt="demarage">
        </a>
      </div>
      <?php 
        /*
          DONNES SORTANTES
            - Aucunes données de cette partie sera utilisé par une autre partie ou un autre fichier.
        */
      ?>
    <!-- <== PARTIE 01 ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->

    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CONNEXION ==> -->
      <?php 
          /*
            NOTES :
              - Cette partie servira à l'utilisateur a se connecter, selon 3 possibilitées :
                ° En anonyme : il n'aura pas besoin de se créer un compte, mais il n'auras que la possibilité de discuter avec une personne au hasard parmis les inscrits connectés ou d'autres anonymes.
                ° créer un compte.
                ° se connecter a son compte.

            DONNES ENTRANTES :
              - Aucunes données ne sont nécésaires au traitement de cette partie.
          */
        ?>
      <div class="toggleable P0_connexion_ASonCompte" style="display:none">
        <div class="P1_app">

          <div class="P1_app__section P1_app__title">
            <span class="P1_app__icon P1_app__icon__expand"><></span>
            <span class="P1_app__title--logo">
              <img src="00_general/icones/fixe/logoMSN.png" alt="logo MSN">
            </span>
            <span class="P1_app__title--main">Messenger</span>
          </div>

          <div class="P1_app__frame">
            <div class="P1_app__section P1_app__profile">
              <img src="00_general/avatars/msn.png" style="width:100px ;height:100px ;" class="P1_app__profile--image" alt="">
            
            </div>
            <div class="P1_app__section P1_app__login">
              <div class="P1_app__login-inner">

                <label for="P1_app__login--pseudo">Pseudo:</label>
                <input id="saisiePseudo" class="P1_app__login--pseudo" name="P1_app__login--pseudo" type="text">
                <button><img id="soumettrePseudo" src="01_connexion/fleche-droite.png" style='height:14px;'></button>

                <div id="blocSaisieMail" > 
                  <label for="P1_app__login--email">@mail:</label>
                  <input id="saisieMail" class="P1_app__login--email" name="P1_app__login--email" type="text">
                  <button><img id="soumettreMail" src="01_connexion/fleche-droite.png" style='height:14px;'></button>
                </div>

                <div id="blocSaisieMDP" > 
                  <label for="P1_app__login--pass">Password:</label>
                  <input id="saisieMDP" class="P1_app__login--pass" name="P1_app__login--pass" type="password">
                  <button><img id="soumettreMDP" src="01_connexion/fleche-droite.png" style='height:14px;'></button>
                </div>

                <div id="blocSaisieConfirmMDP" > 
                  <label for="P1_app__login--confirmPass">confirmation mot de passe:</label>
                  <input id="saisieConfirmMDP" class="P1_app__login--confirmPass" name="P1_app__login--confirmPass" type="password">
                  <button ><img id="soumettreConfirmMDP" src="01_connexion/fleche-droite.png"  style='height:8px;'></button>
                </div>

                <div id="blocSaisieStatut" class="P1_app__login-inner--select"> 
                  <label for="P1_app__login--status">Status:</label>
                  <select id="listDeroulStatut" class="P1_app__login--status" name="P1_app__login--status">
                    <option value="EnLigne">En Ligne</option>
                    <option value="Occupe">Occupé</option>
                    <option value="revient">Revient Bientot</option>
                    <option value="parti">Parti</option>
                    <option value="auTel">Au telephone</option>
                    <option value="PartiManger">Parti mangé</option>
                    <option value="ApparHorsLigne">Apparaitre Hors Ligne</option>
                    <option value="HorsLigne">Hors Ligne</option>
                  </select>
                </div>

                <div id="blocSaisieLangue" class="P1_app__login-inner--select">
                  <label for="P1_app__login--status">Langue:</label>
                  <select id="listDeroulLang" class="P1_app__login--status" name="P1_app__login--Language" id="P1_app__login--Language">
                    <option value="defaut">Veuillez choisir</option>';
                    <?php 
                    include_once('01_connexion/ListeLanguagesTraduisible.php');//Liste de toutes les langue supportées par l'API de traduction de GOOGLE
                    ?>
                  </select>
                </div>
                <!-- <div class="P1_app__login-inner--checkbox">
                  <input name="P1_app__login-inner--remember-user" type="checkbox"> <label for="P1_app__login-inner--remember-user">Remember Me</label>
                </div>

                <div class="P1_app__login-inner--checkbox">
                  <input name="P1_app__login-inner--remember-email" type="checkbox"> <label for="P1_app__login-inner--remember-email">Remember my Password</label>
                </div>
                
                <div class="P1_app__login-inner--checkbox">
                  <input name="P1_app__login-inner--autologin" type="checkbox"> <label for="P1_app__login-inner--autologin">Sign me in automatically</label>
                </div> -->
              
                <div id="bocDeGlypsDeSecurite">
                <?php
                $chemin="01_connexion/iconesConnexion/";
                $finChemin="-solid.svg";
                // Table des glyphes
                try {
                  $sql = "SELECT * FROM iconesConnexionSecurite";
                  $stmt = $bdd->prepare($sql);
                  $stmt->execute();
                } catch (Exception $e) {
                  print "Erreur ! " . $e->getMessage() . "<br/>";
                }

                $nombreDeLignes = $stmt->rowCount();

                // Mélangez le tableau des chiffres de 1 à $nombreDeLignes
                $chiffres = range(1, $nombreDeLignes);
                shuffle($chiffres);

                // Sélectionnez un chiffre aléatoire pour validation
                $rand = rand(1, $nombreDeLignes);

                $ligneTableauAleatoire = 0;

                // Parcourez le tableau mélangé
                foreach ($chiffres as $chiffre) {
                  $ligneTableauAleatoire++;

                  try {
                      $sql = "SELECT * FROM iconesConnexionSecurite WHERE ID=?";
                      $stmt = $bdd->prepare($sql);
                      $stmt->execute(array($chiffre));
                  } catch (Exception $e) {
                      print "Erreur ! " . $e->getMessage() . "<br/>";
                  }

                  $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

                  // Affichez l'image
                  $classDeux="iconeSecu". $resultat['nom'];
                  echo '<a href="#" class="iconeSecu" value="' . $resultat['nom'] . '"><img id="'.$classDeux.'" src="' . $chemin . $resultat['nomFichier'] . $finChemin . '" ></a>';

                  // Si l'ID correspond à celui sélectionné aléatoirement
                  if ($resultat['ID'] == $rand) {
                      $nomGlypheAValider =$resultat['nom'];
                  }
                }
                ?>  
              </div>
              <div id="GlyphAChoisir" >cliquer sur : <span  id="glyphASelectione"><?php echo $nomGlypheAValider;?></span></div>
                

                <div id="messageInfoConnexion">
                </div>
                <button class="P1_app__login-button"  id="P1_app__login-button" type="submit" >Bienvenue</button>
              </div>
            </div>
            <!-- <div class="P1_app__section P1_app__login-link P1_app__login-link--container">
              <a class="P1_app__login-link P1_app__login-link--forgot-pass" href="">Forgot your password?</a>
              <a class="P1_app__login-link P1_app__login-link--service-status" href="">Service Status</a>
            </div>-->

            <div class="P1_app__section P1_app__footer">
              <p class="P1_app__footer--credits">MSN Messenger </p> 
            </div>
          </div>
        </div>
      </div>
      <div class="P1_app__notification">
        <div class="P1_app__notification__title">
          <img  class="P1_app__notification__title--icon" src="01_connexion/téléchargement (3).png">
            MSN Messenger
          <span class="P1_app__notification__close">X</span>
        </div>
        <div class="P1_app__notification__inner">
          <div class="P1_app__notification__user">
            <img  class="P1_app__notification__user--photo" src="01_connexion/téléchargement (4).png">
            <div class="P1_app__notification__user--details"><span class="P1_notification-username"></span><br>s'est connecté.</div>
          </div>
          <div class="P1_app__notification__inner--logo">
            <img src="00_general/icones/fixe/logoMSN.png">	
          </div>
        </div>
      </div>
      <?php 
          /* donneesUtilisateur.json
            DONNES SORTANTES
              - Valeur saisie dans "Pseudo":
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Boutton de validation "Pseudo":
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Valeur saisie dans "Mail".
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Boutton de validation "Mail":
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Valeur saisie dans "Password".
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Boutton de validation "Password":
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Valeur saisie dans "Statut".
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Boutton de validation "Statut":
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Valeur saisie dans "Langue".
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
              - Boutton de validation "Langue":
                ° Fichier " ....php " : Verification de la disponibilité du Pseudo
          */
        ?>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CONNEXION -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- LISTE DE CONNECTES ==> -->
    <div  class="ListeDesContacts toggleable" style="display:none" >
      <div class="P2_main">
          <div class="P2_mainwindow" id="P2_contacts">
              <div class="P2_header">
                  <div class="P2_titlebar">
                      <img src="02_listedeconnectes/icones/live_logo.png" alt="Windows Live Logo">
                      <img id="P2_title" src="02_listedeconnectes/frames/title_text.png">
                  </div>
                  <div class="P2_user-info">
                      <img id="P2_avatar" src="00_general/avatars/msn.png" alt="Profile Picture">
                      <img id="P2_frame"  src="00_general/icones/frameProfil/frame_48.png">
                      <div class="P2_profile">
                          <button class="P2_aerobutton" id="P2_user">
                              <h3 id="ProfilConnecte" ></h3>
                              <p id="P2_status"></p>
                              <img class="P2_arrowdown P2_arrowcontacts" src="02_listedeconnectes/svg/small_arrow.svg">
                          </button>
                          <button class="P2_aerobutton" id="P2_message">
                              <span id="humeurProfil" style="margin: 0;"></span>
                              <img class="P2_arrowdown P2_arrowcontacts" src="02_listedeconnectes/svg/small_arrow.svg">
                          </button>
                      </div>
                  </div>
              </div>
              <div id="P2_contactsnav">
                  <ul class="P2_iconbar" id="P2_left">
                      <button class="P2_aerobutton P2_contactaction" style="background:url(02_listedeconnectes/icones/1480.png) no-repeat center;"></button>
                      <button class="P2_aerobutton P2_contactaction" style="background:url(02_listedeconnectes/icones/978.png) no-repeat center;"></button>
                      <button class="P2_aerobutton P2_contactaction" style="background:url(02_listedeconnectes/icones/1484.png) no-repeat center;"></button>
                  </ul>
                  <ul class="P2_iconbar" id="P2_right">
                      <button class="P2_aerobutton P2_contactaction" style="background:url(02_listedeconnectes/icones/parametreCompte.png) no-repeat center;"></button>
                      <button class="P2_aerobutton P2_contactaction" style="background:url(02_listedeconnectes/icones/329.png) no-repeat center;"></button>
                  </ul>
              </div>
              <div class="P2_search">
                  <input id="P2_contact-search" type="text" placeholder="Find a contact...">
                  <button class="P2_searchbar-btn" style="background:url(02_listedeconnectes/icones/1131.png) no-repeat center;"></button>
                  <button class="P2_searchbar-btn" style="background:url(02_listedeconnectes/icones/1132.png) no-repeat center;"></button>
              </div>
              <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>Resultat de recherche</b>
                </button>
              </div>


                  
                  <div id="contenuDynamiqueListeContact"></div>






              <div id="P2_footer">
                  <span style="color: #9bb3d4;">support</span>
                  <img id="P2_ad" src="02_listedeconnectes/frames/ad.png" alt="">
              </div>
          </div>

      </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== LISTE DE CONNECTES -->

    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CHAT ==> -->
    <div class="Discution toggleable" style="display:none"><!--   -->
      <div class="P3_containerprinc">
        <div id="P3_msn-messenger-window" class="P3_msn-messenger-window">
          <div class="P3_container" id="P3_shakeButton">
            <div class="P3_msn-messenger-toolbar">
              <div class="P3_container">
                <div class="P3_toolbar-container">
                  <div  class="P3_image-circular-button P3_up-down" >
                    <div class="P3_container">
                      <img src="03_discution/icones/small-up-down.png" alt="up/down">
                    </div>
                  </div>
                  <div class="P3_image-button P3_invite">
                      <div class="P3_container">
                          <a href="https://discord.com/" target="_blank">
                              <img src="03_discution/icones/invite.png" alt="Invite">
                              <div class="P3_text">inviter</div>
                          </a>
                      </div>
                  </div>
                  <div class="P3_image-button P3_send">
                    <div class="P3_container">
                      <a href="https://www.pinterest.fr/" target="_blank">
                          <img src="03_discution/icones/send.png" alt="envoyer">
                          <div class="P3_text">envoyer</div>
                      </a>
                    </div>
                  </div>
                  <div class="P3_image-button P3_video">
                    <div class="P3_container">
                      <a href="https://www.youtube.com/" target="_blank">
                          <img src="03_discution/icones/video.png" alt="vidéo">
                          <div class="P3_text">vidéo</div>
                      </a>
                    </div>
                  </div>
                  <div class="P3_image-button P3_voice">
                    <div class="P3_container">
                      <a href="https://www.teamspeak.com/fr/" target="_blank">
                          <img src="03_discution/icones/voice.png" alt="parler">
                          <div class="P3_text">parler</div>
                      </a>
                    </div>
                  </div>
                  <div class="P3_image-button P3_activities">
                    <div class="P3_container">
                      <a href="https://www.deezer.com/fr/" target="_blank">
                          <img src="03_discution/icones/activities.png" alt="activités">
                          <div class="P3_text">activités</div>
                      </a>
                    </div>
                  </div>
                  <div class="P3_image-button P3_games">
                    <div class="P3_container">
                      <a href="https://gaming.amazon.com/intro" target="_blank">
                          <img src="03_discution/icones/games.png" alt="jeux">
                          <div class="P3_text">jeux</div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="P3_toolbar-small-container">
                  <div class="P3_left"></div>
                  <div class="P3_center">
                    <div class="P3_buttons">
                      <div  class="P3_image-circular-button P3_block">
                        <div class="P3_container">
                          <img id="DiscutionButton" src="03_discution/icones/small-block.png" alt="bloquer">
                        </div>
                      </div>
                      <div  class="P3_image-circular-button P3_paint">
                        <div class="P3_container">
                          <img src="03_discution/icones/small-paint.png" alt="dessin">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="P3_right"></div>
                  <div class="P3_end">
                    <img id="quitter" src="03_discution/icones/allumer.png" style="height: 15px;">
                  </div>
                </div>
              </div>
            </div>

            <div class="P3_msn-messenger-remote-user"> <!-- destinataire -->
              <div class="P3_container">
                <div class="P3_msn-messenger-history-chat">
                  <div class="P3_container">
                    <div class="P3_subject"></div>
                    <div id="historiqueMess" style="width:290px; justify-content:left; margin-left:8px ;margin-right:-10px">
                      <!--<textarea rows="8" cols="30" id="historiqueMessageRecu" style="width: 100%; height:100%; border:none; resize: none; ">-->
                      <div rows="8" cols="30" id="historiqueMessageRecu" style="width: 100%; height:100%; border:none; resize: none; ">
                      
                      <?php
                        $monTableauJSON = json_decode(file_get_contents('historiqueS_messages.json'), true);
                        $longueurTableau = count($monTableauJSON['tableauMessage']);

                        $a = 1; 

                        while ($a < $longueurTableau) {
                          $timeStampBoucle = htmlspecialchars($monTableauJSON['tableauTimestamp'][$a]);
                          $messageBoucle = htmlspecialchars($monTableauJSON['tableauMessage'][$a]);


                          $timeStampBoucleParMille=intval($timeStampBoucle/1000);
                          $date = new DateTime(); 
                          $date->setTimestamp($timeStampBoucleParMille);
                          
                          // Obtenir la date et l'heure au format souhaité
                          $date_format = $date->format('d-m-Y'); // Format de date : Jour-Mois-Année
                          $heure_format = $date->format('H:i'); // Format d'heure : Heures:Minutes
                          
                          // Afficher la date et l'heure
                          $dateHeureMessage = "Le : " . $date_format . " à : " . $heure_format;
                          


                          echo "<span style='color: darkgray; width:100%'>". $dateHeureMessage."</span>". "<br><b>". $messageBoucle."</b><br>";
                          
                          $a++;                       
                        }

                        ?>
                    </div>
                    <!--</textarea>-->
                  </div>
                  </div>
                </div>
                <div class="P3_msn-messenger-avatar P3_image">
                  <div class="P3_container">
                    <img class="P3_picture P3_pictureDestinataire" src="00_general/avatars/msn.png" alt="Avatar">
                    <button class="P3_down">⯆</button>
                    <img class="P3_expand" src="03_discution/icones/expand-left.png" alt="expand arrow"><!-- fleche a droite -->
                  </div>
                </div>
              </div>
            </div>

            <div class="P3_msn-messenger-local-user"><!-- utilisateur -->
              <div class="P3_container">
                <div class="P3_msn-messenger-chat"><!-- menu -->
                  <div class="P3_container">
                    <div class="P3_actionbar">
                      <div class="P3_simple-button P3_letter">
                        <div class="P3_container">
                          <img src="03_discution/icones/letter.png" alt="ecrire">
                          <span></span>
                        </div>
                      </div>
                      <div class="P3_simple-button happy" >
                        <div class="P3_container">
                          <img src="03_discution/icones/happy.png" alt="smiley">
                          <span></span>
                          <button class="P3_down">⯆</button>
                        </div>
                      </div>
                      <div class="P3_simple-button P3_voice-clip" label="Voice clip">
                        <div class="P3_container">
                          <img src="03_discution/icones/voice-clip.png" alt="son">
                          <span>son</span>
                        </div>
                      </div>
                      <div class="P3_simple-button P3_wink" >
                        <div class="P3_container">
                          <img src="03_discution/icones/wink.png" alt="smiley2">
                          <span></span>
                          <button class="P3_down">⯆</button>
                        </div>
                      </div>
                      <div class="P3_simple-button P3_mountain" arrow>
                        <div class="P3_container">
                          <img src="03_discution/icones/mountain.png" alt="photo">
                          <span></span>
                          <button class="P3_down">⯆</button>
                        </div>
                      </div>
                      <div class="P3_simple-button P3_gift" arrow>
                        <div class="P3_container">
                          <img src="03_discution/icones/gift.png" alt="cadeaux">
                          <span></span>
                          <button class="P3_down">⯆</button>
                        </div>
                      </div>

                      <div id="P3_wizz" class="P3_simple-button P3_nudge">
                        <div class="P3_container">
                          <img src="03_discution/icones/nudge.png" alt="wizz"><audio id="shakeSound" src="03_discution/son/wizz.wav"></audio>
                          <span></span>
                        </div>
                      </div>

                    </div>
                    <div class="P3_chat">
                    <div style="width:268px; justify-content:left; margin-left:-8px ;margin-right:-10px"><textarea rows="3" cols="30" id="messageAEnvoye" style="width: 100%; height:100%; border:none; resize: none"></textarea></div>
                      <div class="P3_buttons">
                        <button class="P3_normal" id="envoyerMessage">Send</button><!--<span>S</span>end</button>-->
                        <button class="P3_small P3_normal">Search</button><!--Sea<span>r</span>ch</button>-->
                      </div>
                    </div>
                    <div class="P3_tabs">
                      <div class="P3_tab-button P3_paint">
                        <div class="P3_container">
                          <img src="03_discution/icones/paint.png" alt="dessin">
                        </div>
                      </div>
                      <div class="P3_tab-button P3_letter" >
                        <div class="P3_container">
                          <img src="03_discution/icones/letter.png" alt="lettre">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="P3_msn-messenger-avatar P3_duck">
                  <div class="P3_container">
                    <img id="avatarDiscutionExpediteur" class="P3_picture" src="00_general/avatars/msn.png" alt="Avatar">
                    <button class="P3_down">⯆</button>
                    <img class="P3_expand" src="03_discution/icones/expand-left.png" alt="expand arrow">
                  </div>
                </div>
              </div>
            </div>
            <div class="P3_msn-messenger-statusbar">
              <div class="P3_container">
                <div class="P3_text"></div>
              </div>
            </div>
            <div class="P3_border-window"></div>
          </div>
        </div>



      </div>  
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CHAT -->

    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ SCRIPTS ==> -->
    <style>

    </style>
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
      //});
      </script>

      <script src="01_connexion/script_connexion.js"></script><!-- script pour la fenetre de connexion -->
      <!--<script src=""></script> --><!-- pas de script pour la liste de connectes -->
      <script src="03_discution/script_discution.js"></script><!-- script pour la fenetre de discution -->
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ <== SCRIPTS -->

  </body>
</html>
