<?php // partie 2
  /*
    - Nom du fichier : Vue_partie02.php 
    - Type : vue
    - Language(s) : HTML / PHP

    LES ATTRIBUTS/VALEURS DES BALISES SERONT ORGANISE DE LA FACON SUIVANTE :
    <... id="" class="" data-...="" value="" name="" style="" --DIVERS-- >

  */

  
          
      ?>  
      <div id="" class="ListeDesContacts toggleable" data-vide="" value="" name="" style="display:none">
        <div id="" class="P2_main" data-vide="" value="" name="" >
            <div id="P2_contacts" class="P2_mainwindow" data-vide="" value="" name="" >
              <!-- PARTIE 01 ---------------------------------------------------------------------------------------------------------------------------------------------------------- EN-TETE ==> -->
                <div id="" class="P2_header" data-vide="" value="" name="">
                    <div id="" class="P2_titlebar" data-vide="" value="" name="">
                        <a href="index.php"><img id="acceuil" class="" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/icones/live_logo.png" alt="Windows Live Logo"></a>
                        <img id="P2_title" class="" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/frames/title_text.png">
                    </div>
                    <div id="" class="P2_user-info" data-vide="" value="" name="">
                        <span id="ensembleFrame_Image">
                          <img id="P2_avatar" class="P2_avatar" data-vide="" value="" name="" src="../00_general/avatars/msn.png" alt="Profile Picture">
                          <img id="P2_frame" class="" data-vide="" value="" name=""  src="../00_general/icones/frameProfil/frame_48.png">
                        </span>
                        <div id="" class="P2_profile" data-vide="" value="" name="">
                            <button id="P2_user" class="P2_aerobutton" data-vide="" value="" name="">
                                <span id="ProfilConnecte" class="contenuProfil" data-vide="" value="" name="" ></span>
                                <p id="P2_status" class="" data-vide="" value="" name="" ></p>
                                <img id="" class="P2_arrowdown P2_arrowcontacts" data-vide="" value="" name=""  src="../bibliotheque/02_listedeconnectes/svg/small_arrow.svg">
                            </button>
                            <button id="P2_message" class="P2_aerobutton" data-vide="" value="" name="" >
                                <span id="humeurProfil" class="contenuProfil" data-vide="" value="" name="" style="margin: 0;"></span>
                                <img id="" class="P2_arrowdown P2_arrowcontacts" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/svg/small_arrow.svg">
                            </button>
                        </div>
                    </div>
                    <div></div>
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
                  <section id="laPage2"></section>
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
<style>
#popup{
  display: grid;
  grid-template-rows: 10% 80% 10%;
  grid-template-columns: 15% 70% 15% ;
  border: 1px solid black;
  width: 256px; 
}
#indicationDestinataire{
  grid-row: 1 / 2 ;
grid-column: 1 / -2 ;
}
#annulerMessage{
grid-row: 1 / 2 ;
grid-column: -1 / -2 ;
}
#messageDInvitation{
  grid-row: 2 / 3;
grid-column: 1 / -1;
}
#effacerMessage{
  grid-row: -1 / -2;
grid-column: 1 / 2;
}
#validerMessage{
  grid-row: -1 / -2;
grid-column:  -1 / -2;
}
</style>




      <script>
        $('.P2_listeInvitation').on('click', function(){
    console.log('test');


});
      </script>
        <?php
        //include "../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.php";
          /* 
            UTILISATIONS DES DONNEES DE CETTE PARTIE
                - Fichier ".js":
                  ° .
          */
        ?>
        <!-- API -->
          <!-- Pas de fichier(s) pour cette partie -->

        <!-- fonctionnement -->

        <script src="../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.js"></script><!-- contenu dynamique (insere dans la "PARTIE 03 02") -->
        <script src="../02_listedeconnectes/fonctionnement/scriptListeConnecte.js"></script><!-- contenu dynamique (insere dans la "PARTIE 03 02") -->
        <script src="../02_listedeconnectes/fonctionnement/chercherContact.js"></script><!-- contenu dynamique (insere dans la "PARTIE 03 02") -->
        <!-- Dynamiq"ue -->
        <!-- Pas de fichier(s) pour cette partie -->

        <!-- Style --> 
          <link rel="stylesheet" type="text/css" href="../02_listedeconnectes/styles/style_listeConnecte.css">

        <!-- Animation -->
          <!-- Pas de fichier(s) pour cette partie -->
