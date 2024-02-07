<?php 

?>

<?php // partie 3


?>
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
                      <div id="messageHistory"></div>

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
                          <button class="P3_downEmoji">⯆</button>
                        </div>
                      </div>
                      <div class="P3_simple-button P3_voice-clip" label="Voice clip">
                        <div class="P3_container">
                          <img src="03_discution/icones/voice-clip.png" alt="son">
                          <span>son</span>
                        </div>
                      </div>
                      <div id="blagueChuckNorris" class="P3_simple-button P3_wink" >
                        <div class="P3_container">
                          <img src="emojipng.com-6357000.png" alt="smiley2" style="width:16px; height:16px;">
                          <span></span>
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
                          <button class="P3_downgift">⯆</button>
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/lib/js/emojione.min.js"></script>

      <!-- Configurer EmojiOne -->
      <script>
        emojione.ascii = true; // Activer la prise en charge des émoticônes ASCII
        emojione.imageType = 'png'; // Choisissez le type d'image (png, svg)
        emojione.imagePathPNG = 'https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/assets/png/';
        emojione.imagePathSVG = 'https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/assets/svg/';
        emojione.unicodeAlt = true; // Utilisez Unicode comme alternative
        emojione.imagePathSVGSprites = 'https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/assets/sprites/emojione.sprites.svg';
        emojione.sprites = true; // Utiliser des sprites pour améliorer les performances
      </script>
      <img src="Poweredby_100px-White_VertLogo.png" alt="logo_giphy">
      <!-- Exemple d'utilisation -->
      <div class="emojione">
        <!-- Utilisez la fonction toImage pour convertir le texte emoji en une balise img -->
        <script>
          document.write(emojione.toImage(':smile:'));
        </script>
      </div>

          <!-- TEST -->
      </body>      
    </div>  
    
    <script src="../01_connexion/fonctionnement/script_historiqueMessages.js"></script>
    <script src="../01_connexion/fonctionnement/biblio_Emoji.html"></script>
    <script src="../01_connexion/fonctionnement/API_GIF.php"></script>
    <script src="../01_connexion/fonctionnement/biblio_Emoji.html"></script>

<style>
  /*.message {
      margin-bottom: 10px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
  }*/

  .blue-text {
      color: blue;
  }

  .green-text {
      color: green;
  }
  #messageHistory {
      max-height: 121px;
      overflow-y: auto;
  }

</style>


        <!-- API -->
          <!-- Pas de fichier(s) pour cette partie -->

        <!-- fonctionnement -->
          <!-- Pas de fichier(s) pour cette partie -->

        <!-- Dynamique -->
        <!-- Pas de fichier(s) pour cette partie -->

        <!-- Style --> 
        <link rel="stylesheet" type="text/css" href="03_discution/style_discution.css"><!-- discution -->

<!-- Animation -->
  <!-- Pas de fichier(s) pour cette partie -->

