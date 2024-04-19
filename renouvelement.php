
<?php

// EN COURS

//echo "Bonjour ".$_GET['pseudo'].",<br>";
include 'conectBDD.php'; //connection a la BDD


            //$pseudoutilisateur    // deja renseigne a supprimer apres les tests
            //$pseudo;              // deja renseigne a supprimer apres les tests
            //$codeVerification     // deja renseigne a supprimer apres les tests
            //$token                // deja renseigne a supprimer apres les tests


if(isset($_GET['pseudo'])){
    
            try {
                $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array($_GET['pseudo']));
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            //$nombreDeLignes = $stmt->rowCount();
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombreDeLignes = $stmt->rowCount();

            if($nombreDeLignes==1){
            $avatar=$resultat['avatar'];//avatar de l'utilisateur
            }
            
            $pseudo=$_GET['pseudo'];
        }else{
                $avatar="msn";
                $pseudo="en Dev.";
            }
            $sourceAvatar="00_general/avatars/".$avatar.".png";
            




// PARTIE XX ==> ---------------------------------------------------------------------------------------------------------------------------------------------- CE QUI EST TRAITE DANS CETTE PARTIE ==>


    // PARTIE XX.XX ==> --------------------------------------------------------------------------------------------------------------------------------------- CE QUI EST TRAITE DANS CETTE PARTIE ==>
        //Etape 01 : regex pour les zones de saisies
            ?>
                <script>
                    $( document ).ready(function() {
                        $('.saisie').on("input", function(event) {// ETAPE DE SECURISATION : exclusion de certains caracteres pour eviter l'injection de code
                            var input = event.target; 
                            var value = input.value;
                            var newValue = "";
                            for (var i = 0; i < value.length; i++) {
                                // Vérifie si le caractère actuel n'est pas un des caractères spécifiés
                                if (!(/[<>?:"'()\[\]{}/*`;$#,]/.test(value[i]))) {
                                    newValue += value[i]; // Ajoute le caractère à la nouvelle valeur
                                }
                            }
                            input.value = newValue; // Met à jour la valeur de l'input
                        });
                    });
                </script>
            <?php
        //Etape 02 : lors du click sur le bouton de validation
            ?>
                <script>
                    $('#validerChangement').on('click', function(){
                        var codeValidation = $('#saisieCodeValidation2').val();
                        var saisieNouveauMDP = $('#inpsaisieNouveauMDP').val();
                        var confirmerSaisieNouveauMDP = $('#confirmerSaisieNouveauMDP').val();
                        var idDuPseudoChangement='<?= $pseudo ?>';
                        if (codeValidation === '<?= $codeVerification; ?>') {
                            if ( saisieNouveauMDP ===  confirmerSaisieNouveauMDP) {
                                // script AJAX pour le changement de mot de passe (il supprimera aussi token,code de valid, et fin de valid + supprimera le blocage)
                                ajax_connexionUtilisateurDejaEnregistre(idDuPseudoChangement, saisieNouveauMDP);// id(idDuPseudoChangement) mdp(saisieNouveauMDP)

                                function ajax_connexionUtilisateurDejaEnregistre(idDuPseudoChangement, saisieNouveauMDP) {
                                    $.ajax({
                                        method: "POST",
                                        url: "changementMDP.php",
                                        data: { coidDuPseudoChangementntenu: idDuPseudoChangement, saisieNouveauMDP:saisieNouveauMDP},
                                    })
                                    .done(function (retourenvoiMGG) {
                                        console.log(retourenvoiMGG);
                                    })
                                    .fail(function () {
                                        alert("error dans ajax_connexionUtilisateurDejaEnregistre");
                                    });
                                };
                                $('#message').text('mot de passe changé avec succés');//afficher un message informant de la réussite du changement de mot de passe
                                //redirection vers index.php
                            } else {
                                console.log(" faux ");
                            }
                        } else {
                            console.log(codeValidation + ' '+ '<?= $codeVerification; ?>'); 
                        }
                    });        
                </script>
            <?php
    // <== PARTIE XX.XX ---------------------------------------------------------------------------------------------------------------------------------------- <== CE QUI EST TRAITE DANS CETTE PARTIE

// <== PARTIE XX ----------------------------------------------------------------------------------------------------------------------------------------------- <== CE QUI EST TRAITE DANS CETTE PARTIE







?>



<!-- PARTIE 01 ==> --------------------------------------------------------------------------------------------------------------------------------------------------- FENETRE DE CONNEXION ==> -->
<!-- PARTIE 01.01 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ FORMULAIRE ==> -->
  <div id="P1_CadreExterieur" class="P1_connexion_ASonCompte" data-vide="" value="" name="" style=""><!-- ENSEMBLE -->
    <div id="P1_Cadreinterieur" class="P1_app" data-vide="" value="" name="" style=""><!-- HAUT DE PAGE + CORP -->
        <div id="P1_enTete" class="P1_app__section P1_app__title" data-vide="" value="" name="" style=""><!-- HAUT DE PAGE -->
            <div id="P1_menuEntete" class="P1_app__icon P1_app__icon__expand centre_centre" data-vide="" value="" name="" style=""><></div>
            <div id="P1_titrePartie" class=" centre_centre P1_app__title--main" data-vide="" value="" name="" style="" >Bonjour <?=$pseudo; ?>, vous allez renouveller votre mot de passe</div>
            <div>
                <img id="logo_msn_Menu" class="" data-vide="" value="" name="" style="" src="../00_general/icones/fixe/logoMSN.png" alt="logo MSN">
            </div>
        </div>

        <div id="P1_cadreCorpConnexion" class="P1_app__frame centre_centre" data-vide="" value="" name="" style=""><!-- CORP -->
            <div class=" centre_centre">
                <img id="P1_avatarUtilisateur" class="P1_app__profile--image" data-vide="" value="" name="" style="" src=<?= '"'.$sourceAvatar.'"';?> alt="avatar">
            </div><!-- INTERIEUR CORP -->
            <div id="P1_cadreInterieurZoneSaisie" class="P1_app__login-inner centre_centre" data-vide="" value="" name="" style="">
                <div style="grid-row: 1 / 2; grid-column: 1 / span 2;">
                    <span id="blocSaisiecodevalidation" class="saisie" data-vide="" value="" name="" style="">
                        <label id="saisieCodeValidation" class="" data-vide="" value="" name="" style="" for="saisirLeCodeDeValid">code de validation:</label>
                        <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                        <input id="saisieCodeValidation2" class="saisie" data-vide="" value="" name="saisirLeCodeDeValid" style="" type="text">
                        <!--<button id="" class="" data-vide="" value="" name="">
                            <img id="" class="" data-vide="" value="" name="" style="" src="">
                        </button>-->
                        </span>
                    </span>
                </div>
                <div style="grid-row: 2 / 3; grid-column: 1 / span 2;"></div>
                <div style="grid-row: 3 / 4; grid-column: 1 / span 2;">
                    <span id="blocSaisieNouveauMDP" class="" data-vide="" value="" name="" style="">
                        <label id="saisieNouveauMDP" class="" data-vide="" value="" name="" style="" for="saisirLeNouveauMDP">nouveau mot de passe:</label>
                        <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                        <input id="inpsaisieNouveauMDP" class="saisie" data-vide="" value="" name="saisirLeNouveauMDP" style="" type="text">
                        <!--<button id="" class="" data-vide="" value="" name="">
                            <img id="" class="" data-vide="" value="" name="" style="" src="">
                        </button>-->
                        </span>
                    </span>
                </div>
                <div style="grid-row: 4 / 5; grid-column: 1 / span 2;"></div>
                <div style="grid-row: 5 / 6; grid-column: 1 / span 2;">
                    <span id="blocSaisieConfirmerNouveauMDP" class="" data-vide="" value="" name="" style="">
                        <label id="saisieConfirmerNouveauMDP" class="" data-vide="" value="" name="" style="" for="saisirLeConfirmerNouveauMDP"> confirmer le nouveau mot de passe:</label>
                        <span id="" class="ensembleSaisieConfirmation" data-vide="" value="" name="" style="">
                        <input id="confirmerSaisieNouveauMDP" class="saisie" data-vide="" value="" name="saisirLeConfirmerNouveauMDP" style="" type="text">
                        <!--<button id="" class="" data-vide="" value="" name="">
                            <img id="" class="" data-vide="" value="" name="" style="" src="">
                        </button>-->
                        </span>
                    </span>
                </div>
                <div style="grid-row: 6 / 7; grid-column: 1 / span 2;"></div>
                <div style="grid-row: 7 / 8; grid-column: 1 / span 2;">
                    <span id="validerChangement" class="" data-vide="" value="" name="" style="">
                        <button data-vide="" value="" name="" data-vide="" value="" name="" style="" type="submit" >
                            <span id="" class="" data-vide="" value="" name="" style=""> 
                                Valider
                            </span>
                        </button>
                    </span>
                    <span id="message" class="" data-vide="" value="" name="" style=""> 
                    </span>
                </div>
            </div>
            <div>mentions légales</div>
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
        <img id="" class="" data-vide="" value="" name="" style="" src="../00_general/icones/fixe/logoMSN.png">
      </div>
    </div>
  </div>
<!-- <== PARTIE 01.02 ---------------------------------------------------------------------------------------------------------------------------------------------------- <== NOTIFICATION -->
<!-- <== PARTIE 01 --------------------------------------------------------------------------------------------------------------------------------------------------- <== FENETRE DE CONNEXION -->

<script>


function updateCustomProperty() {
  document.documentElement.style.setProperty('--largueur_fenetre', window.innerWidth);
      document.documentElement.style.setProperty('--hauteur_fenetre', window.innerHeight);
    }

// Mettre à jour la variable CSS personnalisée lors du chargement de la page
window.addEventListener('load', updateCustomProperty);

// Mettre à jour la variable CSS personnalisée lors du redimensionnement de la fenêtre
window.addEventListener('resize', updateCustomProperty);

</script>


        <link rel="stylesheet" type="text/css" href="../styleGeneral.css">
        <link rel="stylesheet" type="text/css" href="../01_connexion/styles/contenantStyle_partie00_01.css">
        <link rel="stylesheet" type="text/css" href="../01_connexion/styles/contenuStyle_partie00_01.css">
        <link rel="stylesheet" type="text/css" href="01_connexion/styles/style_partie00_01.css">
