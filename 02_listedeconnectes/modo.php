

                <!-- PARTIE 03 01 --------------------------------------------------------------------------------------------------------------------------------------- RECHERCHE DE CONTACTS ==> -->
                <?php 
                  include '../conectBDD.php'; // connection a la base de donnees
                ?>
               
                <div id="" class="P2_search" data-vide="" value="" name="" ><!-- recherche -->

                    <input id="P2_contact-search" class="" data-vide="" value="" name="" type="text" placeholder="Find a contact...">
                    <button id="rechercherContacts" class="P2_searchbar-btn" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1131.png) no-repeat center;"></button>
                    <button id="P2_bouttonboutton" class="P2_searchbar-btn" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1132.png) no-repeat center;"></button>
                  </div>
                  <?php
                   echo '
                  <div id="" class="P2_contact-list" data-vide="" value="" name="" >
                    <button id="" class="P2_listitem P2_headerlist" data-vide="" value="" name="" >
                        <img id="" class="P2_arrow" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                        <b>Resultat de recherche</b>
                    </button>
                  </div>
                  <div id="affichageResultat"></div><!-- resultat de recherche -->

                  <div id="popup" style="display:none"><!-- pop-up invitation -->

                    <div id="bandeau_identité_popup" class="" data-...="" value="" name="" style="">
                      <div id="bandeau_identité_popup__avatar" class="" data-...="" value="" name="" style="">avatar</div>
                      <div id="bandeau_identitépopup_identité" class="" data-...="" value="" name="" style="">
                        <div id="bandeau_identitépopup_identitéPseudo" class="" data-...="" value="" name="" style="">Pseudo</div>
                        <div id="bandeau_identitépopup_identitéHumeur" class="" data-...="" value="" name="" style="">humeur</div>
                      </div>
                    </div>

                    <div>
                      <div id="bandeauIdentite_infoProfil" class="" data-...="" value="" name="" style="">Informations sur le profil</div>
                      <div id="bandeauIdentite_stat" class="" data-...="" value="" name="" style="">statistiques</div>
                        <span >blocage</span>
                      <div id="bandeauIdentite_contactProfil" class="" data-...="" value="" name="" style="">contacts de l\'utilisateur</div>
                    </div>

                    <div id="bandeauAction_popup" class="" data-...="" value="" name="" style="">
                      <div id="bandeauAction_popup_retour" class="" data-...="" value="" name="" style="">retour</div>
                      <div id="bandeauAction_popup_signaler" class="" data-...="" value="" name="" style="">signaler</div>
                      <div id="bandeauAction_popup_Message" class="" data-...="" value="" name="" style="">message</div>
                    </div>

                  </div> 
                <!-- PARTIE 03 01 -------------------------------------------------------------------------------------------------------------------------------------- <==  RECHERCHE DE CONTACTS -->
                <div class="P2_contact-list">
                  <button class="P2_listitem P2_headerlist">
                      <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                      <b>messages des utilisateurs</b>
                  </button>
                </div>
                <div class="P2_contact-list">
                  <button class="P2_listitem P2_headerlist">
                      <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                      <b>signalement des utilisateurs</b>
                  </button>
                </div>

              <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>en Liste des utilisateurs</b>
                </button>
              </div>
              ';

              try {// chercher l'ID (sur la BDD) de l'utilisateur qui vient de se connecter
                $sql = "SELECT * FROM  forum_utilisateur ";
                $stmt = $bdd->prepare($sql);
                $stmt->execute();
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
          
              $resultatRequete = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
              foreach ($resultatRequete as $document) {//exclure son pseudo de la liste
                $nomContact=$document['pseudo'];
                $humeur=$document['humeur'];

                echo'
                <button id="P2_invitation'.$nomContact.'" class="  P2_listitem " data-destinataire="'.$nomContact.'">
                  <img class="P2_aerobutton P2_status-icon P2_listeInvitation" src="00_general/icones/statutProfil/online.png" alt="Online">
                  <span  class="favoris_ON_OFF favoris_OFF" >
                    <img class="iconeFavoris'.$nomContact.'" src="bibliotheque/02_listedeconnectes/icones/etoile.png" alt="'.$nomContact.'" style="height:13px;">
                  </span>
                  <span class="blocPseudoHumeur" data-pseudo="'.$nomContact.'">
                    <span class="P2_contact-text P2_name">'.
                      $nomContact.
                    '</span>
                    <p class="P2_contact-text P2_message" style="color: darkgray;">'.
                      $humeur. 
                    '</p>
                  </span>
                </button>
              ';

              }

              ?>
<div id="affichageResultat"></div><!-- resultat de recherche -->
<div id="contenuDynamiqueListeContact" class="" data-vide="" value="" name="" ></div> 



<div id="popup" style="display:none"><!-- pop-up invitation -->
    <span id=indicationDestinataire></span>
    <button id="annulerMessage" >X</button>
    <textarea id="messageDInvitation" placeholder="minimum 30 caracteres"></textarea>
    <button id="effacerMessage" >effacer</button>
    <button id="validerMessage" data-destinataire="" style="display: none;">Valider</button>
</div>






<script>
    var script = document.createElement('script');
    var script2 = document.createElement('script');
    var script3 = document.createElement('script');

    script.src = '../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.js';
    script2.src = '../02_listedeconnectes/fonctionnement/scriptListeConnecte.js';
    script3.src = '../02_listedeconnectes/fonctionnement/chercherContact.js';

    document.head.appendChild(script);
    document.head.appendChild(script2);
    document.head.appendChild(script3);
</script>



