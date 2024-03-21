<?php //partie 0 - 1

/*
  - Nom du fichier : Vue_partie01.php 
  - Type : vue
  - Language(s) : HTML / PHP

  LES ATTRIBUTS/VALEURS DES BALISES SERONT ORGANISE DE LA FACON SUIVANTE :
  <... id="" class="" data-...="" value="" name="" style="" --DIVERS-- >

*/
?>
<?php


?>
<!-- PARTIE 00 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->
    <div id="P0_logoDeDemarage" class="" data-vide="" value="" name="" style="">
      <a id="" class="" data-vide="" value="" name="" style="" href="#">
        <img id="P0_logoDeDemarageButton" class="" data-vide="" value="" name="" style="" src="../00_general/icones/fixe/iconeDemarage.png" alt="demarage">
      </a>
    </div>
<!-- <== PARTIE 00 ------------------------------------------------------------------------------------------------------------------------------------------------------ LOGO DE DEMMARAGE ==> -->

<!-- PARTIE 01 ==> --------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CONNEXION ==> -->
  <!-- PARTIE 01.01 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ FORMULAIRE ==> -->

    <div id="P1_CadreExterieur" class="P1_connexion_ASonCompte" data-vide="" value="" name="" style="display:none">

      <div id="P1_Cadreinterieur" class="P1_app" data-vide="" value="" name="" style="">

        <div id="P1_enTete" class="P1_app__section P1_app__title" data-vide="" value="" name="" style="">
          <span id="P1_menuEntete" class="P1_app__icon P1_app__icon__expand centre_centre" data-vide="" value="" name="" style=""><></span>
          <span id="P1_titrePartie" class="centre_centre P1_app__title--main" data-vide="" value="" name="" style="">Connexion</span>
          <span id="P1_logo_msn" class="P1_app__title--logo centre_centre" data-vide="" value="" name="" style="">
            <img id="logo_msn_Menu" class="" data-vide="" value="" name="" style="" src="00_general/icones/fixe/logoMSN.png" alt="logo MSN">
          </span>
        </div>

        <div id="P1_cadreCorpConnexion" class="P1_app__frame" data-vide="" value="" name="" style="">
        
          <div id="P1_cadreAvatar" class="P1_app__section P1_app__profile" data-vide="" value="" name="" style="">
            <img id="P1_avatarUtilisateur" class="P1_app__profile--image" data-vide="" value="" name="" style="" src="00_general/avatars/msn.png" alt="">            
          </div>

          <div id="P1_zoneDeSaisie" class="P1_app__section P1_app__login centre_centre" data-vide="" value="" name="" style="">
            <div id="P1_cadreInterieurZoneSaisie" class="P1_app__login-inner" data-vide="" value="" name="" style="">

              <span id="blocSaisiePseudo" class="P1_Saisie centre_centre" data-vide="" value="" name="" style="">
                <label id="" class="" data-vide="" value="" name="" style="" for="P1_app__login--pseudo">Pseudo:</label>
                <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <input id="saisiePseudo" class="P1_app__login--pseudo zoneDeSaisie" data-vide="" value="" name="P1_app__login--pseudo" style="" type="text">
                  <span id="" class="" data-vide="" value="" name="">
                    <img id="soumettrePseudo" class="P1_validerSaisie" data-vide="" value="" name="" style="" src="bibliotheque/01_connexion/icones/fleche-droite.png">
                  </span>
                </span>
              </span>

              <span id="blocSaisieMail" class="P1_Saisie centre_centre" data-vide="" value="" name="" style="" >
                <label id="" class="" data-vide="" value="" name="" style="" for="P1_app__login--email">@mail:</label>
                <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <input id="saisieMail" class="P1_app__login--email zoneDeSaisie" data-vide="" value="" name="P1_app__login--email" style="" type="text">
                  <span id="" class="" data-vide="" value="" name="" style="">
                    <img id="soumettreMail" class="P1_validerSaisie" data-vide="" value="" name="" style="" src="bibliotheque/01_connexion/icones/fleche-droite.png">
                  </span>
                </span>
              </span>

              <span id="blocSaisieMDP" class="P1_Saisie centre_centre" data-vide="" value="" name="" style="">
                <label id="" class="" data-vide="" value="" name="" style="" for="P1_app__login--pass">mot de passe:</label>
                <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <input id="saisieMDP" class="P1_app__login--pass zoneDeSaisie" data-vide="" value="" name="P1_app__login--pass" style="" type="password">
                  <span id="" class="" data-vide="" value="" name="" style="">
                    <img id="soumettreMDP" class="P1_validerSaisie" data-vide="" value="" name="" style="" src="bibliotheque/01_connexion/icones/fleche-droite.png">
                  </span>
                </span>
              </span>

              <span id="blocSaisieConfirmMDP" class="P1_Saisie centre_centre" data-vide="" value="" name="" style="" >
                <label id="" class="" data-vide="" value="" name="" style="" for="P1_app__login--confirmPass">confirmation mot de passe:</label>
                <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <input id="saisieConfirmMDP" class="P1_app__login--confirmPass zoneDeSaisie" data-vide="" value="" name="P1_app__login--confirmPass" style="" type="password">
                  <span id="" class="" data-vide="" value="" name="" style="">
                    <img id="soumettreConfirmMDP" class="P1_validerSaisie" data-vide="" value="" name="" style="" src="bibliotheque/01_connexion/icones/fleche-droite.png">
                  </span>
                </span>
              </span>

              <span id="blocSaisieStatut" class="P1_Saisie P1_app__login-inner--select centre_centre" data-vide="" value="" name="" style="">
                <span id="" class=" zoneDeSaisie" data-vide="" value="" name="" style="">
                  <label id="" class="" data-vide="" value="" name="" style="" for="P1_app__login--status">Status:</label>
                  <select id="listDeroulStatut" class="P1_app__login--status" data-vide="" value="" name="P1_app__login--status">
                    <option id="" class="" data-vide="" value="EnLigne" name="" style="">En Ligne</option>
                    <option id="" class="" data-vide="" value="Occupe" name="" style="">Occupé</option>
                    <option id="" class="" data-vide="" value="revient" name="" style="">Revient Bientot</option>
                    <option id="" class="" data-vide="" value="parti" name="" style="">Parti</option>
                    <option id="" class="" data-vide="" value="auTel" name="" style="">Au telephone</option>
                    <option id="" class="" data-vide="" value="PartiManger" name="" style="" >Parti manger</option>
                    <option id="" class="" data-vide="" value="ApparHorsLigne" name="" style="">Apparaitre Hors Ligne</option>
                    <option id="" class="" data-vide="" value="HorsLigne" name="" style="">Hors Ligne</option>
                  </select>
                </span>
              </span>


              <span id="blocSaisieLangue" class=" P1_Saisie P1_app__login-inner--select centre_centre" data-vide="" value="" name="" style="">
                <span id="" class="zoneDeSaisie ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <label id="" class="" data-vide="" value="" name="" style="" for="P1_app__login--status">Langue:</label>
                  <select id="listDeroulLang" class="P1_app__login--status" data-vide="" value="" name="P1_app__login--Language" style=""><!--  id="P1_app__login--Language" -->
                    <option id="" class="" data-vide="" value="defaut" name="" style="">Veuillez choisir</option>
                    <?php 
                    include_once('bibliotheque/01_connexion/ListeLanguagesTraduisible.php');//Liste de toutes les langue supportées par l'API de traduction (pas encore implemante)
                    ?>
                  </select>
                </span>
              </span>

              <span id="bloccheckRemember" class="P1_Saisie P1_app__login-inner--checkbox centre_centre" data-vide="" value="" name="" style="">
                <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <span id="" class="check" data-vide="" value="" name="" style="">
                    <input id="" class="boutoncheck" data-vide="" value="" name="P1_app__login-inner--remember-user" style="" type="checkbox"> 
                    <span id="" class="" data-vide="" value="" name="" style="">se souvenir de moi</span>
                  </span>
                </span>
              </span>

              <span id="bloccheckMDP_Perdu" class=" P1_Saisie P1_app__login-inner--checkbox centre_centre" data-vide="" value="" name="" style="">
                <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                  <span id="" class="check" data-vide="" value="" name="" style="">
                    <input id="checkMail" class="boutoncheck" data-vide="" value="" name="P1_app__login-inner--remember-email" style="" type="checkbox"> 
                    <span id="" class="" data-vide="" value="" name="" style="" >mot de passe oublié <br>ou  <br>renouvellement de mot de passe</span>
                    <div id="codeValidation" class="" data-vide="" value="" name="" style="" >code</div>
                  </span>
                </span>
              </span>

              <!-- <div id="blockFollow" class="" data-vide="" value="" name="" style="">
                <div id="" class="" data-vide="" value="" name="" style="">
                  <div id="" class="" data-vide="" value="" name="" style="">
                    nous suivre
                  </div>
                  <div id="" class="" data-vide="" value="" name="" style="">
                    <span id="" class="" data-vide="" value="" name="" style="">YT</span>
                    <span id="" class="" data-vide="" value="" name="" style="">FB</span>
                    <span id="" class="" data-vide="" value="" name="" style="">X</span>
                    <span id="" class="" data-vide="" value="" name="" style="">INSTA</span>
                    <span id="" class="" data-vide="" value="" name="" style="">GITHUB</span>
                  </div>
                </div>
              </div> -->

              <!-- icones de securite : les icones se melange aleatoirement, sauf le dernier " ... " -->
              <div id="bocDeGlypsDeSecurite" class="centre_spaceb" data-vide="" value="" name="" style="">
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

                  echo '<a id="iconeSecu" class="iconeSecu" data-vide="" value="autre" name="" href="#"><img id="iconeSecuautre" class="" data-vide="" value="" name="" src="bibliotheque/01_connexion/iconesConnexion/dots-horizontal-rounded-regular-24.png" alt="..."></a>';

                  try {
                    $sql = "SELECT nom FROM iconesConnexionSecurite";
                    $stmt = $bdd->prepare($sql);
                    $stmt->execute();
                  } catch (Exception $e) {
                    print "Erreur ! " . $e->getMessage() . "<br/>";
                  }
                  $resultattab = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $afficherTableau = array();
                  foreach ($resultattab as $resultattabb) {
                      $nom = $resultattabb['nom'];
                      array_push($afficherTableau,$resultattabb['nom'] );
                  }

                  // Résultats de la deuxième requête
                  $resultats2 = ["reveil", "bouteille", "classeur", "telephone", "telecomande", "calculatrice", "gomme"];

                  // Combinaison des deux tableaux
                  $combinaison = array_merge($afficherTableau, $resultats2);

                  // Choix aléatoire d'une valeur dans la combinaison
                  $valeurAleatoire = $combinaison[array_rand($combinaison)];
                ?>
              </div>

              <!-- il sera demande de cliquer sur une icone choisi aleatoirement, entre des nom avec des icones visible, et d'autres nom qui n'ont pas d'icones -->
              <div id="GlyphAChoisir" class="" data-vide="" value="" name="" style="display:flex; justify-content:center;" >
                cliquer sur : <br>
                <span id="glyphASelectione" class="" data-vide="" value="" name="" style=""><?= $valeurAleatoire ;?><br></span>
                si vous ne voyez pas l'icone correspondante, cliquez sur "...".
                
              </div>

              <div id="messageInfoConnexion" class="" data-vide="" value="" name="" style="">
              </div>

              <span id="P1_app__login-button" class="P1_app__login-button centre_centre" data-vide="" value="" name="" style="">
                <button data-vide="" value="" name="" data-vide="" value="" name="" style="" type="submit" >
                  <span id="" class="" data-vide="" value="" name="" style="width: 60px;"> 
                    Bienvenue
                  </span>
                </button>
              </span>

            </div>
          </div>

          <div id="P1_piedDePartie" class="P1_Saisie P1_app__section P1_app__footer" data-vide="" value="" name="" style="">
            <p id="" class="P1_app__footer--credits" data-vide="" value="" name="" style="">Mentions Légales </p> 
          </div>

        </div>

      </div>
    </div>
  <!-- <== PARTIE 01.01 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== FORMULAIRE -->

  <!-- PARTIE 01.02 ==> ---------------------------------------------------------------------------------------------------------------------------------------------------- NOTIFICATION ==> -->
    <div id="" class="P1_app__notification" data-vide="" value="" name="" style="">
      <div id="" class="P1_app__notification__title" data-vide="" value="" name="" style="">
        <img  id="" class="P1_app__notification__title--icon" data-vide="" value="" name="" style="width:13px;" src="00_general/avatars/msn.png">
          MSN Messenger
        <span id="" class="P1_app__notification__close" data-vide="" value="" name="" style="">X</span>
      </div>
      <div id="" class="P1_app__notification__inner" data-vide="" value="" name="" style="">
        <div id="" class="P1_app__notification__user" data-vide="" value="" name="" style="">
        <div id="P1_app__notification__user--photo" class="" data-vide="" value="" name="" style="">
        <img id="" class="P1_app__notification__user--photo" data-vide="" value="" name="" style="width:50px;" src="00_general/avatars/msn.png">
        </div>
          <div id="" class="P1_app__notification__user--details" data-vide="" value="" name="" style="">
            <span id="" class="P1_notification-username" data-vide="" value="" name="" style=""></span><br>s'est connecté.
          </div>
        </div>
        <div id="" class="P1_app__notification__inner--logo" data-vide="" value="" name="" style="">
          <img id="" class="" data-vide="" value="" name="" style="" src="00_general/icones/fixe/logoMSN.png">
        </div>
      </div>
    </div>
  <!-- <== PARTIE 01.02 ---------------------------------------------------------------------------------------------------------------------------------------------------- <== NOTIFICATION -->
<!-- <== PARTIE 01 --------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CONNEXION -->

<!-- PARTIE 02 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------------------ LIENS ==> -->
  <!-- API -->
    <!-- Pas de fichier(s) pour cette partie -->

  <!-- fonctionnement -->
    <script src="../01_connexion/fonctionnement/script_connexion.js"></script>

  <!-- Dynamique -->
    <!-- Pas de fichier(s) pour cette partie -->

  <!-- Style --> 
    <link rel="stylesheet" type="text/css" href="../01_connexion/styles/contenantStyle_partie00_01.css">
    <link rel="stylesheet" type="text/css" href="../01_connexion/styles/contenuStyle_partie00_01.css">
    <link rel="stylesheet" type="text/css" href="../01_connexion/styles/style_partie00_01.css">

  <!-- Animation -->
    <!-- Pas de fichier(s) pour cette partie -->
<!-- <== PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------------ <== LIENS -->

