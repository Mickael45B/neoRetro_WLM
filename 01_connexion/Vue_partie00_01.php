      <?php //partie 0 - 1
          /*
            NOTES :
              - Cette partie servira à l'utilisateur a se connecter, selon 3 possibilitées :
                ° En anonyme : il n'aura pas besoin de se créer un compte, mais il n'auras que la possibilité de discuter avec une personne au hasard parmis les inscrits connectés ou d'autres anonymes.
                ° créer un compte.
                ° se connecter a son compte.

            DONNES ENTRANTES :
              - Aucunes données venant d'une autre partie n'est nécésaires au traitement de cette partie.
          */

          /*
            - Nom du fichier : Vue_partie01.php 
            - Type : vue
            - Language(s) : HTML / PHP

            LES ATTRIBUTS/VALEURS DES BALISES SERONT ORGANISE DE LA FACON SUIVANTE :
            <... id="" class="" data-...="" value="" name="" style="" --DIVERS-- >

          */
  ?>
    <!-- PARTIE 00 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->
      <?php 
        /*
          NOTES :
            - Cette partie est juste esthétique, la seule action possible sera de cliquer sur un logo.

          DONNES ENTRANTES :
            - Aucunes données provenant d'autres parties ou d'autres fichiers ne sont nécésaires au traitement de cette partie.
        */
      ?>

      <div id="P0_logoDeDemarage" class="" data-...="" value="" name="">
        <a id="" class="" data-...="" value="" name="" href="#">
          <img id="P0_logoDeDemarageButton" class="" data-...="" value="" name="" src="../00_general/icones/iconeDemarage.png" alt="demarage">
        </a>
      </div>

      <?php 
        /*
          DONNES SORTANTES
            - Aucunes données de cette partie sera utilisé par une autre partie ou un autre fichier.
        */
      ?>
    <!-- <== PARTIE 00 ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->

    <!-- PARTIE 01 ==> --------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CONNEXION ==> -->
      <?php 
          /*
            NOTES :
              - Cette partie servira à l'utilisateur a se connecter, selon 3 possibilitées :
                ° En anonyme : il n'aura pas besoin de se créer un compte, mais il n'auras que la possibilité de discuter avec une personne au hasard parmis les inscrits connectés ou d'autres anonymes.
                ° créer un compte.
                ° se connecter a son compte.

            DONNES ENTRANTES :
              - Aucunes données venant d'une autre partie n'est nécésaires au traitement de cette partie.
          */
      ?>
      <!-- PARTIE 01.01 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ FORMULAIRE ==> -->
        <div id="" class="P1_connexion_ASonCompte" data-vide="" value="" name="" style="display:none">
          <div id="" class="P1_app" data-vide="" value="" name="">

            <div id="" class="P1_app__section P1_app__title" data-vide="" value="" name="">
              <span id="" class="P1_app__icon P1_app__icon__expand" data-vide="" value="" name=""><></span>
              <span id="test" class="P1_app__title--main" data-vide="" value="" name="">Messenger</span>
              <span id="" class="P1_app__title--logo" data-vide="" value="" name="">
                <img id="logo_msn_Menu" class="" data-vide="" value="" name="" src="00_general/icones/fixe/logoMSN.png" alt="logo MSN">
              </span>

            </div>

            <div id="" class="P1_app__frame" data-vide="" value="" name="">
              <div id="" class="P1_app__section P1_app__profile" data-vide="" value="" name="">
                <img id="" class="P1_app__profile--image" data-vide="" value="" name="" style="width:100px ;height:100px ;" src="00_general/avatars/msn.png" alt="">            
              </div>

              <div id="" class="P1_app__section P1_app__login" data-vide="" value="" name="">
                <div id="" class="P1_app__login-inner" data-vide="" value="" name="">

                  <label id="" class="" data-vide="" value="" name="" for="P1_app__login--pseudo">Pseudo:</label>
                    <input id="saisiePseudo" class="P1_app__login--pseudo" data-vide="" value="" name="P1_app__login--pseudo" type="text">
                  <button id="" class="" data-vide="" value="" name=""><img id="soumettrePseudo" class="" data-vide="" value="" name="" style="height:14px;" src="01_connexion/fleche-droite.png"></button>

                  <div id="blocSaisieMail" class="" data-vide="" value="" name="">
                    <label id="" class="" data-vide="" value="" name="" for="P1_app__login--email">@mail:</label>
                    <input id="saisieMail" class="P1_app__login--email" data-vide="" value="" name="P1_app__login--email" type="text">
                    <button id="" class="" data-vide="" value="" name=""><img id="soumettreMail" class="" data-vide="" value="" name="" style="height:14px;" src="01_connexion/fleche-droite.png"></button>
                  </div>

                  <div id="blocSaisieMDP" class="" data-vide="" value="" name="">
                    <label id="" class="" data-vide="" value="" name="" for="P1_app__login--pass">Password:</label>
                    <input id="saisieMDP" class="P1_app__login--pass" data-vide="" value="" name="P1_app__login--pass" type="password">
                    <button id="" class="" data-vide="" value="" name=""><img id="soumettreMDP" class="" data-vide="" value="" name="" style="height:14px;" src="01_connexion/fleche-droite.png"></button>
                  </div>

                  <div id="blocSaisieConfirmMDP" class="" data-vide="" value="" name="" >
                    <label id="" class="" data-vide="" value="" name="" for="P1_app__login--confirmPass">confirmation mot de passe:</label>
                    <input id="saisieConfirmMDP" class="P1_app__login--confirmPass" data-vide="" value="" name="P1_app__login--confirmPass" type="password">
                    <button id="" class="" data-vide="" value="" name=""><img id="soumettreConfirmMDP" class="" data-vide="" value="" name="" style="height:8px;" src="01_connexion/fleche-droite.png"></button>
                  </div>

                  <div id="blocSaisieStatut" class="P1_app__login-inner--select" data-vide="" value="" name="">
                    <label id="" class="" data-vide="" value="" name="" for="P1_app__login--status">Status:</label>
                    <select id="listDeroulStatut" class="P1_app__login--status" data-vide="" value="" name="P1_app__login--status">
                      <option id="" class="" data-vide="" value="EnLigne" name="">En Ligne</option>
                      <option id="" class="" data-vide="" value="Occupe" name="">Occupé</option>
                      <option id="" class="" data-vide="" value="revient" name="">Revient Bientot</option>
                      <option id="" class="" data-vide="" value="parti" name="">Parti</option>
                      <option id="" class="" data-vide="" value="auTel" name="">Au telephone</option>
                      <option id="" class="" data-vide="" value="PartiManger" name="" >Parti manger</option>
                      <option id="" class="" data-vide="" value="ApparHorsLigne" name="">Apparaitre Hors Ligne</option>
                      <option id="" class="" data-vide="" value="HorsLigne" name="">Hors Ligne</option>
                    </select>
                  </div>

                  <div id="blocSaisieLangue" class="P1_app__login-inner--select" data-vide="" value="" name="">
                    <label id="" class="" data-vide="" value="" name="" for="P1_app__login--status">Langue:</label>
                    <select id="listDeroulLang" class="P1_app__login--status" data-vide="" value="" name="P1_app__login--Language"><!--  id="P1_app__login--Language" -->
                      <option id="" class="" data-vide="" value="defaut" name="">Veuillez choisir</option>
                      <?php 
                      include_once('bibliotheque/01_connexion/ListeLanguagesTraduisible.php');//Liste de toutes les langue supportées par l'API de traduction de GOOGLE (pas encore implemante)
                      ?>
                    </select>
                  </div>

                  <div id="" class="P1_app__login-inner--checkbox" data-vide="" value="" name="">
                    <input id="" class="" data-vide="" value="" name="P1_app__login-inner--remember-user" type="checkbox"> <label id="" class="" data-vide="" value="" name="" for="P1_app__login-inner--remember-user">se souvenir de moi</label>
                  </div>

                  <div id="" class="P1_app__login-inner--checkbox" data-vide="" value="" name="">
                    <input id="checkMail" class="" data-vide="" value="" name="P1_app__login-inner--remember-email" type="checkbox"> <label id="" class="" data-vide="" value="" name="" for="P1_app__login-inner--remember-email">mot de passe oublie</label>
                  </div>

                  <div id="" class="" data-vide="" value="" name="">
                    <div id="" class="" data-vide="" value="" name="">
                      <div id="" class="" data-vide="" value="" name="">
                        nous suivre
                      </div>
                      <div id="" class="" data-vide="" value="" name="">
                        <span id="" class="" data-vide="" value="" name="">YT</span>
                        <span id="" class="" data-vide="" value="" name="">FB</span>
                        <span id="" class="" data-vide="" value="" name="">X</span>
                        <span id="" class="" data-vide="" value="" name="">INSTA</span>
                        <span id="" class="" data-vide="" value="" name="">GITHUB</span>
                      </div>
                    </div>
                  </div>

                  <div id="bocDeGlypsDeSecurite" class="" data-vide="" value="" name="">
                    <?php
                      $chemin="../bibliotheque/01_connexion/iconesConnexion/";
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
                        echo '<a id="" class="iconeSecu" data-vide="" value="' . $resultat['nom'] . '" name="" href="#"><img id="'.$classDeux.'" class="" data-vide="" value="" name="" src="' . $chemin . $resultat['nomFichier'] . $finChemin . '"></a>';

                        // Si l'ID correspond à celui sélectionné aléatoirement
                        if ($resultat['ID'] == $rand) {
                            $nomGlypheAValider =$resultat['nom'];
                        }
                      }
                    ?>  
                  </div>

                  <div id="GlyphAChoisir" class="" data-vide="" value="" name="" >cliquer sur : 
                    <span id="glyphASelectione" class="" data-vide="" value="" name=""><?php echo $nomGlypheAValider;?></span>
                  </div>
                  <div id="messageInfoConnexion" class="" data-vide="" value="" name="">
                  </div>
                  <button id="P1_app__login-button" class="P1_app__login-button" data-vide="" value="" name="" type="submit">Bienvenue</button>
                </div>
              </div>

              <div id="" class="P1_app__section P1_app__footer" data-vide="" value="" name="">
                <p id="" class="P1_app__footer--credits" data-vide="" value="" name="">MSN Messenger </p> 
              </div>
            </div>
          </div>
        </div>
      <!-- <== PARTIE 01.01 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== FORMULAIRE -->

      <!-- PARTIE 01.02 ==> ---------------------------------------------------------------------------------------------------------------------------------------------------- NOTIFICATION ==> -->
        <div id="" class="P1_app__notification" data-vide="" value="" name="">
          <div id="" class="P1_app__notification__title" data-vide="" value="" name="">
            <img  id="" class="P1_app__notification__title--icon" data-vide="" value="" name="" style="width:13px;" src="00_general/avatars/msn.png"><!-- 01_connexion/téléchargement (3).png -->
              MSN Messenger
            <span id="" class="P1_app__notification__close" data-vide="" value="" name="">X</span>
          </div>
          <div id="" class="P1_app__notification__inner" data-vide="" value="" name="">
            <div id="" class="P1_app__notification__user" data-vide="" value="" name="">
              <img id="" class="P1_app__notification__user--photo" data-vide="" value="" name="" style="width:50px;" src="00_general/avatars/msn.png"><!-- 01_connexion/téléchargement (4).png -->
              <div id="" class="P1_app__notification__user--details" data-vide="" value="" name="">
                <span id="" class="P1_notification-username" data-vide="" value="" name=""></span><br>s'est connecté.
              </div>
            </div>
            <div id="" class="P1_app__notification__inner--logo" data-vide="" value="" name="">
              <img id="" class="" data-vide="" value="" name="" src="00_general/icones/fixe/logoMSN.png">
            </div>
          </div>
        </div>
      <!-- <== PARTIE 01.02 ---------------------------------------------------------------------------------------------------------------------------------------------------- <== NOTIFICATION -->
      <?php 
          /* 
            UTILISATIONS DES DONNEES DE CETTE PARTIE
                - Fichier "01_connexion/script_connexion.js":
                  ° Afficher pseudo de l'utilisateur qui vient de se connecter dans un pop-up en bas, à droite (s'affiche puis disparait lors du clic sur le bouton de connexion).
                  ° Traitement AJAX de la disponibilité du pseudo (traité sur le fichier TraitementVerificationPseudo.php).
                  ° traitement AJAX de recuperation de l'avatar (traité sur le fichier TraitementVerificationAvatar.php).
                  ° traitement AJAX de recuperation de la validite de mot de passe (traité sur le fichier TraitementVerificationMDP.php).
                  ° traitement AJAX de l'humeur  (traité sur le fichier TraitementHumeur.php).
          */
      ?>
    <!-- <== PARTIE 01 --------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CONNEXION -->
    
    <!-- API -->
      <!-- Pas de fichier(s) pour cette partie -->

    <!-- fonctionnement -->
      <script src="../01_connexion/fonctionnement/script_connexion.js"></script>

    <!-- Dynamique -->
      <!-- Pas de fichier(s) pour cette partie -->

    <!-- Style --> 
      <link rel="stylesheet" type="text/css" href="../01_connexion/styles/style_partie00_01.css">

    <!-- Animation -->
      <!-- Pas de fichier(s) pour cette partie -->
      <script>
  document.getElementById("checkMail").addEventListener("click", function() {
  if (this.checked) {
    destinataire="tpto";
    ajax_verificationAvatardestinataire();
    function ajax_verificationAvatardestinataire(destinataire) {
        $.ajax({
        method: "POST",
        url: "../01_connexion/envoiDuMail.php",
        data: { destinataire: destinataire },
        })
        .done(function (retour2_html) {
          console.log(retour2_html);

        })
        .fail(function () {
        alert("error dans ajax_verificationAvatardestinataire");
        
        });
      };




  }
});
</script>
