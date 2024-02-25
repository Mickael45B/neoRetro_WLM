      <?php // partie 2
  /*
    - Nom du fichier : Vue_partie02.php 
    - Type : vue
    - Language(s) : HTML / PHP

    LES ATTRIBUTS/VALEURS DES BALISES SERONT ORGANISE DE LA FACON SUIVANTE :
    <... id="" class="" data-...="" value="" name="" style="" --DIVERS-- >

  */
        
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
      <div id="" class="ListeDesContacts toggleable" data-vide="" value="" name="" style="display:none">
        <div id="" class="P2_main" data-vide="" value="" name="" >
            <div id="P2_contacts" class="P2_mainwindow" data-vide="" value="" name="" >
              <!-- PARTIE 01 ---------------------------------------------------------------------------------------------------------------------------------------------------------- EN-TETE ==> -->
                <div id="" class="P2_header" data-vide="" value="" name="">
                    <div id="" class="P2_titlebar" data-vide="" value="" name="">
                        <img id="" class="" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/icones/live_logo.png" alt="Windows Live Logo">
                        <img id="P2_title" class="" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/frames/title_text.png">
                    </div>
                    <div id="" class="P2_user-info" data-vide="" value="" name="">
                        <img id="P2_avatar" class="" data-vide="" value="" name="" src="../00_general/avatars/msn.png" alt="Profile Picture">
                        <img id="P2_frame" class="" data-vide="" value="" name=""  src="../00_general/icones/frameProfil/frame_48.png">
                        <div id="" class="P2_profile" data-vide="" value="" name="">
                            <button id="P2_user" class="P2_aerobutton" data-vide="" value="" name="">
                                <h3 id="ProfilConnecte" class="" data-vide="" value="" name="" ></h3>
                                <p id="P2_status" class="" data-vide="" value="" name="" ></p>
                                <img id="" class="P2_arrowdown P2_arrowcontacts" data-vide="" value="" name=""  src="../bibliotheque/02_listedeconnectes/svg/small_arrow.svg">
                            </button>
                            <button id="P2_message" class="P2_aerobutton" data-vide="" value="" name="" >
                                <span id="humeurProfil" class="" data-vide="" value="" name="" style="margin: 0;"></span>
                                <img id="" class="P2_arrowdown P2_arrowcontacts" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/svg/small_arrow.svg">
                            </button>
                        </div>
                    </div>
                </div>
              <!-- PARTIE 01 ---------------------------------------------------------------------------------------------------------------------------------------------------------- <== EN-TETE -->

              <!-- PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------- MENU ==> -->
                  <div id="P2_contactsnav" class="" data-vide="" value="" name="" ><!-- menu --><!--  -->
                    <ul id="P2_left" class="P2_iconbar" data-vide="" value="" name="" >
                        <button id="" class="P2_aerobutton P2_contactaction" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1480.png) no-repeat center;"></button>
                        <button id="" class="P2_aerobutton P2_contactaction" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/978.png) no-repeat center;"></button>
                        <button id="" class="P2_aerobutton P2_contactaction" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1484.png) no-repeat center;"></button>
                    </ul>
                    <ul id="P2_right" class="P2_iconbar" data-vide="" value="" name="" >
                        <button id="" class="P2_aerobutton P2_contactaction" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/parametreCompte.png) no-repeat center;"></button>
                        <button id="" class="P2_aerobutton P2_contactaction" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/329.png) no-repeat center;"></button>
                    </ul>
                </div>
              <!-- PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------- <== MENU -->

              <!-- PARTIE 03 ------------------------------------------------------------------------------------------------------------------------------------------------------------- CORP ==> -->
                <!-- PARTIE 03 01 --------------------------------------------------------------------------------------------------------------------------------------- RECHERCHE DE CONTACTS ==> -->
                  <div id="" class="P2_search" data-vide="" value="" name="" ><!-- recherche -->
                    <input id="P2_contact-search" class="" data-vide="" value="" name="" type="text" placeholder="Find a contact...">
                    <button id="" class="P2_searchbar-btn" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1131.png) no-repeat center;"></button>
                    <button id="" class="P2_searchbar-btn" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1132.png) no-repeat center;"></button>
                  </div>
                  <div id="" class="P2_contact-list" data-vide="" value="" name="" >
                    <button id="" class="P2_listitem P2_headerlist" data-vide="" value="" name="" >
                        <img id="" class="P2_arrow" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                        <b>Resultat de recherche</b>
                    </button>
                  </div>
                <!-- PARTIE 03 01 -------------------------------------------------------------------------------------------------------------------------------------- <==  RECHERCHE DE CONTACTS -->
                <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>requête de contact</b>
                </button>
              </div>

              <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>Demande de contact</b>
                </button>
              </div>
              
                <!-- PARTIE 03 02 ------------------------------------------------------------------------------------------------------------------------------------------- CONTENU DYNAMIQUE ==> -->
                  <div id="contenuDynamiqueListeContact" class="" data-vide="" value="" name="" ></div> <!-- contenu contact -->
                  
                <!-- PARTIE 03 02 ------------------------------------------------------------------------------------------------------------------------------------------ <==  CONTENU DYNAMIQUE -->
              <!-- PARTIE 03 ------------------------------------------------------------------------------------------------------------------------------------------------------------- <== CORP -->

              <!-- PARTIE 04 ----------------------------------------------------------------------------------------------------------------------------------------------------- PIED DE PAGE ==> -->
                  <div id="P2_footer" class="" data-vide="" value="" name="" ><!-- pied de page -->
                      <span id="" class="" data-vide="" value="" name="" style="color: #9bb3d4;">support</span>
                      <img id="P2_ad" class="" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/frames/ad.png" alt="">
                  </div>

              <!-- PARTIE 04 ----------------------------------------------------------------------------------------------------------------------------------------------------- <== PIED DE PAGE -->
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

        <script src="../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.php"></script><!-- contenu dynamique (insere dans la "PARTIE 03 02") -->
        <!-- Dynamique -->
        <!-- Pas de fichier(s) pour cette partie -->

        <!-- Style --> 
          <link rel="stylesheet" type="text/css" href="../02_listedeconnectes/styles/style_listeConnecte.css">

        <!-- Animation -->
          <!-- Pas de fichier(s) pour cette partie -->
