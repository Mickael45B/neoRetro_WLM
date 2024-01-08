<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat MSN</title>
  </head>
<body>
    <link rel="stylesheet" type="text/css" href="style_chat.css">


<div class="containerprinc">
  <div class="msn-messenger-window">
    <div class="container" id="shakeButton">
      <div class="msn-messenger-toolbar">
        <div class="container">
          <div class="toolbar-container">
            <div  class="image-circular-button up-down" >
              <div class="container">
                <img src="icones/small-up-down.png" alt="up/down">
              </div>
            </div>
            <div class="image-button invite">
                <div class="container">
                    <a href="https://discord.com/" target="_blank">
                        <img src="icones/invite.png" alt="Invite">
                        <div class="text">inviter</div>
                    </a>
                </div>
            </div>
            <div class="image-button send">
              <div class="container">
                <a href="https://www.pinterest.fr/" target="_blank">
                    <img src="icones/send.png" alt="envoyer">
                    <div class="text">envoyer</div>
                </a>
              </div>
            </div>
            <div class="image-button video">
              <div class="container">
                 <a href="https://www.youtube.com/" target="_blank">
                    <img src="icones/video.png" alt="vidéo">
                    <div class="text">vidéo</div>
                </a>
              </div>
            </div>
            <div class="image-button voice">
              <div class="container">
                <a href="https://www.teamspeak.com/fr/" target="_blank">
                    <img src="icones/voice.png" alt="parler">
                    <div class="text">parler</div>
                </a>
              </div>
            </div>
            <div class="image-button activities">
              <div class="container">
                 <a href="https://www.deezer.com/fr/" target="_blank">
                    <img src="icones/activities.png" alt="activités">
                    <div class="text">activités</div>
                </a>
              </div>
            </div>
            <div class="image-button games">
              <div class="container">
                <a href="https://gaming.amazon.com/intro" target="_blank">
                    <img src="icones/games.png" alt="jeux">
                    <div class="text">jeux</div>
                </a>
              </div>
            </div>
          </div>
          <div class="toolbar-small-container">
            <div class="left"></div>
            <div class="center">
              <div class="buttons">
                <div  class="image-circular-button block">
                  <div class="container">
                    <img src="icones/small-block.png" alt="bloquer">
                  </div>
                </div>
                <div  class="image-circular-button paint">
                  <div class="container">
                    <img src="icones/small-paint.png" alt="dessin">
                  </div>
                </div>
              </div>
            </div>
            <div class="right"></div>
            <div class="end"></div>
          </div>
        </div>
      </div>

      <div class="msn-messenger-remote-user"> <!-- destinataire -->
        <div class="container">
          <div class="msn-messenger-history-chat">
            <div class="container">
              <div class="subject">To: <strong>destinataire (example@example.com)</strong></div>
              <div class="history"></div>
            </div>
          </div>
          <div class="msn-messenger-avatar image">
            <div class="container">
              <img class="picture" src="../00_general/avatars/msn.png" alt="Avatar">
              <button class="down">⯆</button>
              <img class="expand" src="icones/expand-left.png" alt="expand arrow"><!-- fleche a droite -->
            </div>
          </div>
        </div>
      </div>

      <div class="msn-messenger-local-user"><!-- utilisateur -->
        <div class="container">
          <div class="msn-messenger-chat"><!-- menu -->
            <div class="container">
              <div class="actionbar">
                <div class="simple-button letter">
                  <div class="container">
                    <img src="icones/letter.png" alt="ecrire">
                    <span></span>
                  </div>
                </div>
                <div class="simple-button happy" >
                  <div class="container">
                    <img src="icones/happy.png" alt="smiley">
                    <span></span>
                    <button class="down">⯆</button>
                  </div>
                </div>
                <div class="simple-button voice-clip" label="Voice clip">
                  <div class="container">
                    <img src="icones/voice-clip.png" alt="son">
                    <span>son</span>
                  </div>
                </div>
                <div class="simple-button wink" >
                  <div class="container">
                    <img src="icones/wink.png" alt="smiley2">
                    <span></span>
                    <button class="down">⯆</button>
                  </div>
                </div>
                <div class="simple-button mountain" arrow>
                  <div class="container">
                    <img src="icones/mountain.png" alt="photo">
                    <span></span>
                    <button class="down">⯆</button>
                  </div>
                </div>
                <div class="simple-button gift" arrow>
                  <div class="container">
                    <img src="icones/gift.png" alt="cadeaux">
                    <span></span>
                    <button class="down">⯆</button>
                  </div>
                </div>


                <div class="simple-button nudge">
                  <div class="container">
                    <img id="wizz" src="icones/nudge.png" alt="wizz"><audio id="shakeSound" src="son/wizz.wav"></audio>
                    <span></span>
                  </div>
                </div>



              </div>
              <div class="chat">
                <div class="buttons">
                  <button class="normal"><span>S</span>end</button>
                  <button class="small normal">Sea<span>r</span>ch</button>
                </div>
              </div>
              <div class="tabs">
                <div class="tab-button paint">
                  <div class="container">
                    <img src="icones/paint.png" alt="dessin">
                  </div>
                </div>
                <div class="tab-button letter" >
                  <div class="container">
                    <img src="icones/letter.png" alt="lettre">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="msn-messenger-avatar duck">
            <div class="container">
              <img class="picture" src="../00_general/avatars/msn.png" alt="Avatar">
              <button class="down">⯆</button>
              <img class="expand" src="icones/expand-left.png" alt="expand arrow">
            </div>
          </div>
        </div>
      </div>
      <div class="msn-messenger-statusbar">
        <div class="container">
          <div class="text"></div>
        </div>
      </div>
      <div class="border-window"></div>
    </div>
  </div>
</div>
<div class="cross-gradient"></div>

<style>
    .cross-gradient {
      width: 100%;
      height: 200px;
      background: linear-gradient(to right, #00648e 50%, white 50%), linear-gradient(to bottom, #00648e 50%, white 50%);
      background-position: 0 0, 0 0;
      background-repeat: no-repeat;
    }
  </style>

<script src="script.js"></script>
</body>
</html>











