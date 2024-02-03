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
      ?>
      <script>

      </script>
    <!-- PARTIE 00 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->
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
          <img id="P0_logoDeDemarageButton" src="../00_general/icones/iconeDemarage.png" alt="demarage">
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
        <div class="P1_connexion_ASonCompte" style="display:none">
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
                      include_once('../bibliotheque/01_connexion/ListeLanguagesTraduisible.php');//Liste de toutes les langue supportées par l'API de traduction de GOOGLE
                      ?>
                    </select>
                  </div>
                  <!--<div class="P1_app__login-inner--checkbox">
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
                  <!-- <div class="P1_app__section P1_app__login-link P1_app__login-link--container">
                  <a class="P1_app__login-link P1_app__login-link--forgot-pass" href="">Forgot your password?</a>
                  <a class="P1_app__login-link P1_app__login-link--service-status" href="">Service Status</a>
                  </div>-->

                  <button class="P1_app__login-button"  id="P1_app__login-button" type="submit" >Bienvenue</button>
                </div>
              </div>

              <div class="P1_app__section P1_app__footer">
                <p class="P1_app__footer--credits">MSN Messenger </p> 
              </div>
            </div>
          </div>
        </div>
      <!-- <== PARTIE 01.01 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== FORMULAIRE -->
      <!-- PARTIE 01.02 ==> ---------------------------------------------------------------------------------------------------------------------------------------------------- NOTIFICATION ==> -->
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
