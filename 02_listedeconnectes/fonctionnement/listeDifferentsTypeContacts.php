<?php 
  /*
    - Nom du fichier : listeDifferentsTypeContacts.php 
    - Type : vue
    - Language(s) : HTML / PHP / SQL / JS / JQUERY / AJAX

    LES ATTRIBUTS/VALEURS DES BALISES SERONT ORGANISE DE LA FACON SUIVANTE :
      <... id="" class="" data-...="" value="" name="" style="" --DIVERS-- >

  */

// PARTIE 01 ==> ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- GENERALITES ==>
  include '../../conectBDD.php'; // connection a la base de donnees

  $sasieSecuPseudo=strip_tags($_POST['logSaisiePseudo']);// sécurisation de la valeur (pseudo) recupere pour les requetes
// <==PARTIE 01 ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== GENERALITES

// PARTIE 02 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------------------ DONNEES DE BASE ==>
  try {// chercher l'ID (sur la BDD) de l'utilisateur qui vient de se connecter
    $sql = "SELECT * FROM  forum_utilisateur WHERE pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($sasieSecuPseudo));
  } catch (Exception $e) {
      print "Erreur ! " . $e->getMessage() . "<br/>";
  }
  $resultatRequete = $stmt->fetch(PDO::FETCH_ASSOC);
  $conpterNombreDeLignesIdUtilisateur = $stmt->rowCount();
  if ($conpterNombreDeLignesIdUtilisateur>=1) {
    $idDeUtilisateur = $resultatRequete['ID_utilisateur'];


    try { //recuperer la liste de categorie personalisee de l'utilisateur
      $sql = "SELECT * FROM  forum_utilisateur WHERE ID_utilisateur =?";
      $stmt = $bdd->prepare($sql);
      $stmt->execute(array("$idDeUtilisateur"));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conpterNombreDeLignescategoriePerso = $stmt->rowCount();
    if ($conpterNombreDeLignescategoriePerso>=1) {
      $categories2 = $row['categories_perso'];
    }
// <==PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== DONNEES DE BASE

// PARTIE 03 ==> -------------------------------------------------------------------------------------------------------------------------------------------------- AFFICHAGE DES CONTACTS EN LIGNE ==>
    $categories = json_decode($categories2);// -----------------------------------------------------

    if ($categories !== null) {  // Vérifier si la conversion a réussi
      foreach ($categories as $categorie) { // boucle pour traiter chaque categories personalisee
        if ($categorie=="normal") {// pour la categorie "normal"
          $categorierequete="En ligne";//afficher autre chose sur la page
          $categorie="normal";//pour le traitement de la requete
        }
        else{// pour toutes les autres categories
          $categorierequete=$categorie;
        }
        try {// requete pour filtrer les lignes ou apparaisent l'id de l'utilisateur ET la categorie en cours de traitement
          $sql = "SELECT * FROM  forum_contact WHERE ID_utilisateur=? and categorie=?";
          $stmt = $bdd->prepare($sql);
          $stmt->execute(array($idDeUtilisateur,$categorie));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $conpterNombreDeLignesCategorie = $stmt->rowCount();
        
        if ($conpterNombreDeLignesCategorie>0) {// si il y a plus de 0 contact qui correspondent a la requete
          $resultatRequetecontactFavoris = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //en-tete de la categorie
          echo ' 
            <div class="P2_contact-list">
              <button class="P2_listitem P2_headerlist">
                  <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
                  <b>'. $categorierequete.' (total : '.$conpterNombreDeLignesCategorie.' contact(s) dans cette catégorie) </b>
              </button>
            </div> 
          ';
          foreach ($resultatRequetecontactFavoris as $boucleContactFavoris) { // boucle pour aficher tout ses "contact" qui sont dans la categorie personalisee en cours de traitement
            try {// requete pour obtenir les informations du contact en cours de traitement
              $sql = "SELECT * FROM  forum_utilisateur  WHERE ID_utilisateur=?";
              $stmt = $bdd->prepare($sql);
              $stmt->execute(array($boucleContactFavoris['ID_contact']));
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $resultatRequeteID2 = $stmt->fetch(PDO::FETCH_ASSOC);
            $nomContact=$resultatRequeteID2['pseudo'];
            $humeur=$resultatRequeteID2['humeur'];
            $statut=$resultatRequeteID2['statut'];
            if ($statut!="hors_ligne") {//si le contact est connecte
              //afichage de la ligne pour entrer en contact
              echo'
                <button id="P2_contact'.$nomContact.'" class=" P2_listitem">
                <img class="P2_aerobutton P2_status-icon" src="00_general/icones/statutProfil/online.png" alt="Online">
                <img class="P2_aerobutton P2_status-icon" src="bibliotheque/02_listedeconnectes/icones/etoile.png" alt="favoris">
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
          }
        }
      }
    } else {
      echo "Erreur lors de la conversion du JSON en tableau.";
    } 
  }
// <==PARTIE 03 --------------------------------------------------------------------------------------------------------------------------------------------------- <== AFFICHAGE DES CONTACTS EN LIGNE

// PARTIE 04 ==> ------------------------------------------------------------------------------------------------------------------------------------------------ AFFICHAGE DES CONTACTS HORS LIGNE ==>
  if (isset($idDeUtilisateur)) {
    try {// Requete pour savoir qui est en contact avec l'utilisateur
      $sql = "SELECT * FROM  forum_contact WHERE ID_utilisateur=?";
      $stmt = $bdd->prepare($sql);
      $stmt->execute(array($idDeUtilisateur));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $conpterNombreDeLignesFavoris = $stmt->rowCount();// compter le nombre de contact(s)

    $nombreHorsLigne=0;
    if ($conpterNombreDeLignesFavoris>0) {// afficher si l'utilisateur a plus de 0 contact
      $resultatRequetecontactFavoris = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      foreach ($resultatRequetecontactFavoris as $boucleContactFavoris) { // effectuer une boucle pour aficher tout ses "contact"
        try {// requete pour cibler les information du contact en cours de traitement
          $sql = "SELECT * FROM  forum_utilisateur  WHERE ID_utilisateur=?";
          $stmt = $bdd->prepare($sql);
          $stmt->execute(array($boucleContactFavoris['ID_contact']));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatRequeteIF = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultatRequeteIF['statut']=="hors_ligne") {// si son statut est "hors_ ligne"
          $nombreHorsLigne++;
        }
      }
      if ($nombreHorsLigne>0) {// si l'utilisateur a plus de 0 contact "hors ligne"
        echo ' 
          <div class="P2_contact-list">
            <button class="P2_listitem P2_headerlist">
              <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
              <b>hors ligne </b>
            </button>
          </div> 
        ';
        try {
          $sql = "SELECT * FROM  forum_contact WHERE ID_utilisateur=?";
          $stmt = $bdd->prepare($sql);
          $stmt->execute(array($idDeUtilisateur));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        
        $resultatRequetecontactFavoris2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultatRequetecontactFavoris2 as $boucleContactFavoris) { // effectuer une boucle pour aficher tout ces contacts
          try {
            $sql = "SELECT * FROM  forum_utilisateur  WHERE ID_utilisateur=? and statut=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($boucleContactFavoris['ID_contact'], "hors_ligne"));
          } catch (Exception $e) {
              print "Erreur ! " . $e->getMessage() . "<br/>";
          }
          $resultatRequeteIF = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
          foreach ($resultatRequeteIF as $boucleContactFavoris2) { 
            if ($boucleContactFavoris2['statut']=="hors_ligne") {

              $nomContact=$boucleContactFavoris2['pseudo'];
              $humeur=$boucleContactFavoris2['humeur'];
                echo'
                  <button id="P2_contact'.$nomContact.'" class=" P2_listitem">
                      <img class="P2_aerobutton P2_status-icon" src="00_general/icones/statutProfil/online.png" alt="Online">
                      <img class="P2_aerobutton P2_status-icon" src="bibliotheque/02_listedeconnectes/icones/etoile.png" alt="Online">
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
            }
        }
      }
    }
  }
// <==PARTIE 04 ------------------------------------------------------------------------------------------------------------------------------------------------- <== AFFICHAGE DES CONTACTS HORS LIGNE
?>


<script>

  //var numerodestinataire;
  //var numeroutilisateur;

  let numerodestinataire;
let numeroutilisateur;
 avatarDeb = "00_general/avatars/";
 avatarFin = ".png";

  $('.blocPseudoHumeur').on('click', function(){ //lorsque l'utilisateur choisi avec qui il veut discuter
    var message = $(this).find('.P2_message').text();
    

    $('.P2_listitem').removeClass('P2_listitemchoisi');// Retirer la classe P2_listitemchoisi de tous les elements
    $(this).addClass('P2_listitemchoisi');// Ajouter la classe P2_listitemchoisi à l'element clique

    $('.Discution').fadeIn();//afficher la fenetre de discution
    $('.ListeDesContacts').fadeOut();// cacher la liste de connectes

    var contenusaisi = $(this).data('pseudo');

    function ajax_verificationAvatardestinataire(contenusaisi) {
      $.ajax({
      method: "POST",
      url: "00_general/fonctionnement/TraitementVerificationAvatar.php", //"TraitementVerificationAvatardestinataire.php",
      data: { contenusaisi: contenusaisi },
      })
      .done(function (retour2_html) {

          cheminComplet= avatarDeb + retour2_html +avatarFin;

          avatarDestinataire='discution'+contenusaisi;

          $('.P3_pictureDestinataire').attr("src", cheminComplet);
          $('.P3_pictureDestinataire').addClass(avatarDestinataire);
          $('.P3_pictureDestinataire').attr("alt", contenusaisi);

      })
      .fail(function () {
      alert("error dans ajax_verificationAvatardestinataire");
      
      });
    };

    ajax_verificationAvatardestinataire(contenusaisi);



    message1="discution avec : "+contenusaisi;
    message2=message;
    // ---------------------------------------------------- AlTERNER ENTRE 2 MESSAGES ==> ------------------------------------------------------------------------------- 
    var toggle = true;

    function toggleMessage2() {
    if (toggle) {
        $('.P3_subject').text(message1);
      } else {
        $('.P3_subject').text(message2);
      }
      toggle = !toggle;  // Inverser la valeur du toggle pour la prochaine fois
    }
    setInterval(toggleMessage2, 2000);
      // ---------------------------------------------------- <==  AlTERNER ENTRE 2 MESSAGES -------------------------------------------------------------------------------

});
</script>
