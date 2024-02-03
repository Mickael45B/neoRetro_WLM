      <?php // partie 2
        /*
          NOTES :
            - Cette partie sert a voir :
              ° Les personnes avec qui on est en contact, selon plusieurs catégories : En ligne, hors ligne, occuppé
              ° Rechercher de nouveaux contacts.
              ° Les demandes de contact.
            - La partie avec l'Id "contenuDynamiqueListeContact" est traité dans le fichier "02_listedeconnectes/listeDifferentsTypeContacts.php"

          DONNEES UTILISEE POUR TRAITER CETTE PARTIE :
            - Issue de Base de donnees.
                ° Base : forum - Table : forum_utilisateur 
                  * colonne "" utilisé pour l'id "P2_avatar" 
                  * colonne "" utilisé pour l'id "P2_user" 
                  * colonne "" utilisé pour l'id "P2_status"   
        */
      ?>  
      <div  class="ListeDesContacts toggleable" style="display:none" >
        <div class="P2_main">
            <div class="P2_mainwindow" id="P2_contacts">
                <div class="P2_header">
                    <div class="P2_titlebar">
                        <img src="../bibliotheque/02_listedeconnectes/icones/live_logo.png" alt="Windows Live Logo">
                        <img id="P2_title" src="../bibliotheque/02_listedeconnectes/frames/title_text.png">
                    </div>
                    <div class="P2_user-info">
                        <img id="P2_avatar" src="00_general/avatars/msn.png" alt="Profile Picture">
                        <img id="P2_frame"  src="00_general/icones/frameProfil/frame_48.png">
                        <div class="P2_profile">
                            <button class="P2_aerobutton" id="P2_user">
                                <h3 id="ProfilConnecte" ></h3>
                                <p id="P2_status"></p>
                                <img class="P2_arrowdown P2_arrowcontacts" src="../bibliotheque/02_listedeconnectes/svg/small_arrow.svg">
                            </button>
                            <button class="P2_aerobutton" id="P2_message">
                                <span id="humeurProfil" style="margin: 0;"></span>
                                <img class="P2_arrowdown P2_arrowcontacts" src="../bibliotheque/02_listedeconnectes/svg/small_arrow.svg">
                            </button>
                        </div>
                    </div>
                </div>
                <div id="P2_contactsnav">
                    <ul class="P2_iconbar" id="P2_left">
                        <button class="P2_aerobutton P2_contactaction" style="background:url(../bibliotheque/02_listedeconnectes/icones/1480.png) no-repeat center;"></button>
                        <button class="P2_aerobutton P2_contactaction" style="background:url(../bibliotheque/02_listedeconnectes/icones/978.png) no-repeat center;"></button>
                        <button class="P2_aerobutton P2_contactaction" style="background:url(../bibliotheque/02_listedeconnectes/icones/1484.png) no-repeat center;"></button>
                    </ul>
                    <ul class="P2_iconbar" id="P2_right">
                        <button class="P2_aerobutton P2_contactaction" style="background:url(../bibliotheque/02_listedeconnectes/icones/parametreCompte.png) no-repeat center;"></button>
                        <button class="P2_aerobutton P2_contactaction" style="background:url(../bibliotheque/02_listedeconnectes/icones/329.png) no-repeat center;"></button>
                    </ul>
                </div>
                <div class="P2_search">
                    <input id="P2_contact-search" type="text" placeholder="Find a contact...">
                    <button class="P2_searchbar-btn" style="background:url(../bibliotheque/02_listedeconnectes/icones/1131.png) no-repeat center;"></button>
                    <button class="P2_searchbar-btn" style="background:url(../bibliotheque/02_listedeconnectes/icones/1132.png) no-repeat center;"></button>
                </div>
                <div class="P2_contact-list">
                  <button class="P2_listitem P2_headerlist">
                      <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                      <b>Resultat de recherche</b>
                  </button>
                </div>
                    <div id="contenuDynamiqueListeContact"></div>
                <div id="P2_footer">
                    <span style="color: #9bb3d4;">support</span>
                    <img id="P2_ad" src="../bibliotheque/02_listedeconnectes/frames/ad.png" alt="">
                </div>
            </div>

        </div>
      </div>
        <?php
          /* 
            UTILISATIONS DES DONNEES DE CETTE PARTIE
                - Fichier ".js":
                  ° .
          */
        ?>
        <!-- API -->
          <!-- Pas de fichier(s) pour cette partie -->

        <!-- fonctionnement -->
          <!-- Pas de fichier(s) pour cette partie -->

        <!-- Dynamique -->
        <!-- Pas de fichier(s) pour cette partie -->

        <!-- Style --> 
          <link rel="stylesheet" type="text/css" href="../02_listedeconnectes/styles/style_listeConnecte.css">

        <!-- Animation -->
          <!-- Pas de fichier(s) pour cette partie -->
