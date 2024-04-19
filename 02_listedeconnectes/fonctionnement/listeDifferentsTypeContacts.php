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
  require '../../vendor/autoload.php';
  $sasieSecuPseudo=htmlspecialchars($_POST['logSaisiePseudo']);// sécurisation de la valeur (pseudo) recupere pour les requetes

  
// <==PARTIE 01 ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== GENERALITES

// PARTIE 02 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------------------ DONNEES DE BASE ==>
  try {// chercher l'ID (sur la BDD) de l'utilisateur qui vient de se connecter
      $sql = "SELECT * FROM  forum_utilisateur WHERE pseudo=?";
      $stmt = $bdd->prepare($sql);
      $stmt->execute(array($sasieSecuPseudo));
  } catch (Exception $e) {
      print "Erreur ! " . $e->getMessage() . "<br/>";
  }
  $conpterNombreDeLignesIdUtilisateur = $stmt->rowCount();

  $client = new MongoDB\Client("mongodb://localhost:27017");
  $database = $client->utilisateurs_invitation;
  $collection = $database->requetes_invitation;

// <==PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== DONNEES DE BASE
  if ($conpterNombreDeLignesIdUtilisateur>=1) {
    $resultatRequete = $stmt->fetch(PDO::FETCH_ASSOC);
    $idDeUtilisateur = $resultatRequete['ID_utilisateur'];
    //echo '<br>'.$document['timestamp_invitation']." ".$document['messageDInvitation']." ".$document['ID_du_destinataire']." ".$document['ID_de_l_utilisateur']  ;
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $cursorUtilisateur = $collection->find(['ID_de_l_utilisateur' => $idDeUtilisateur]);
    $countDestinataire = $collection->countDocuments(['ID_de_l_utilisateur' => $idDeUtilisateur]);

    echo '
      <div class="P2_contact-list">
        <button class="P2_listitem P2_headerlist">
            <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
            <b>requête de contact</b>
        </button>
      </div>
    ';

    if ($countDestinataire>=1) {
      foreach ($cursorUtilisateur as $document) {
        $invitation=$document['ID_du_destinataire'];
        try {// chercher l'ID (sur la BDD) de l'utilisateur qui vient de se connecter
          $sql = "SELECT * FROM  forum_utilisateur WHERE ID_utilisateur=?";
          $stmt = $bdd->prepare($sql);
          $stmt->execute(array($invitation));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatRequete = $stmt->fetch(PDO::FETCH_ASSOC);
        $nomContact=$resultatRequete['pseudo'];
        $humeur=$resultatRequete['humeur'];
        echo'
          <button id="P2_invitation'.$nomContact.'" class=" P2_list_item " data-destinataire="'.$nomContact.'">
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
    }else{
      echo'pas de demandes pour le moment';
    }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    $cursorDestinataire = $collection->find(['ID_du_destinataire' => $idDeUtilisateur]);
    $countDestinataire = $collection->countDocuments(['ID_du_destinataire' => $idDeUtilisateur]);

    echo '
      <div class="P2_contact-list">
        <button class="P2_listitem P2_headerlist">
            <img class="P2_arrow" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
            <b>Demande de contact</b>
        </button>
      </div>
    ';

    if ($countDestinataire>=1) {
      foreach ($cursorDestinataire as $document) {

        $invitation=$document['ID_utilisateur'];

          try {// chercher l'ID (sur la BDD) de la personne qui a envoye l'invitation
            $sql = "SELECT * FROM  forum_utilisateur WHERE ID_utilisateur=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($invitation));
          } catch (Exception $e) {
              print "Erreur ! " . $e->getMessage() . "<br/>";
          }
          $resultatRequete = $stmt->fetch(PDO::FETCH_ASSOC);
        $nomContact=$resultatRequete['pseudo'];
        $humeur=$resultatRequete['humeur'];

        echo'
          <button id="P2_invitation'.$nomContact.'" class=" P2_list_item " data-destinataire="'.$nomContact.'">
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
    }else{
      echo'pas de demandes pour le moment';
    }
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

}









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
  $categories2 = $resultatRequete['categories_perso'];

// <==PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== DONNEES DE BASE

// PARTIE 03 ==> -------------------------------------------------------------------------------------------------------------------------------------------------- AFFICHAGE DES CONTACTS EN LIGNE ==>
  $categories = json_decode($categories2);

  if ($categories !== null) { // Vérifier si la conversion a réussi

    foreach ($categories as $categorie) { // boucle pour traiter ==> chaque categories <== personalisee

      if ($categorie=="normal") {// pour la categorie "normal"
        $categorierequete="En ligne";//afficher autre chose sur la page
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
                <b>'. $categorierequete.' </b>
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
            if ($categorierequete=="favoris") {
              $classUtilisateur= "favoris_ON";
              $sourceImage="bibliotheque/02_listedeconnectes/icones/star.png";

            }else{
              $classUtilisateur= "favoris_OFF";
              $sourceImage="bibliotheque/02_listedeconnectes/icones/etoile.png";
            }
            echo'
              <button id="P2_contact'.$nomContact.'" class=" P2_listitem">
              <img class="P2_aerobutton P2_status-icon" src="00_general/icones/statutProfil/online.png" alt="Online">
              <span  class="favoris_ON_OFF '.$classUtilisateur.'" data-destinataire="'.$nomContact.'"><img class="iconeFavoris'.$nomContact.'" src="'.$sourceImage.'" alt="'.$nomContact.'" style="height:13px;"></span>
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
} else {
  echo "Erreur lors de la conversion du JSON en tableau.";
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
      foreach ($resultatRequetecontactFavoris2 as $boucleContactFavoris) { //var_dump($boucleContactFavoris); // effectuer une boucle pour aficher tout ces contacts
        try {
          $sql = "SELECT * FROM  forum_utilisateur  WHERE ID_utilisateur=? and statut=?";
          $stmt = $bdd->prepare($sql);
          $stmt->execute(array($boucleContactFavoris['ID_contact'], "hors_ligne"));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatRequeteIF = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($resultatRequeteIF as $boucleContactFavoris2) { //var_dump($boucleContactFavoris2);
          if ($boucleContactFavoris2['statut']=="hors_ligne") {




            try {// chercher l'ID (sur la BDD) de l'utilisateur qui vient de se connecter
              $sql = "SELECT * FROM  forum_utilisateur WHERE pseudo=?";
              $stmt = $bdd->prepare($sql);
              $stmt->execute(array($sasieSecuPseudo));
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $resultatRequete = $stmt->fetch(PDO::FETCH_ASSOC);
              $idDeUtilisateur = $resultatRequete['ID_utilisateur'];
          







            try {
              $sql = "SELECT * FROM forum_contact WHERE ID_utilisateur=? AND ID_contact=?";
              $stmta = $bdd->prepare($sql);
              $stmta->execute(array($idDeUtilisateur, $boucleContactFavoris['ID_contact']));
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $conpterNombre_DeLignesFavoris = $stmt->rowCount();// compter le nombre de contact(s)
            if ($conpterNombre_DeLignesFavoris>1) {
              $resultatRequeteFavoris = $stmta->fetchAll(PDO::FETCH_ASSOC);
            }else{
              $resultatRequeteFavoris = $stmta->fetch(PDO::FETCH_ASSOC);
            }

            if ($resultatRequeteFavoris['categorie']=='favoris') {
              $classUtilisateur= "favoris_ON";
              $sourceImage="bibliotheque/02_listedeconnectes/icones/star.png";
  
            }else{
              $classUtilisateur= "favoris_OFF";
              $sourceImage="bibliotheque/02_listedeconnectes/icones/etoile.png";
            }
                
            $nomContact=$boucleContactFavoris2['pseudo'];
            $humeur=$boucleContactFavoris2['humeur'];
            echo'
            <button id="P2_contact'.$nomContact.'" class=" P2_listitem">
            <img class="P2_aerobutton P2_status-icon" src="00_general/icones/statutProfil/online.png" alt="Online">
            <span  class="favoris_ON_OFF '.$classUtilisateur.'" data-destinataire="'.$nomContact.'"><img class="iconeFavoris'.$nomContact.'" src="'.$sourceImage.'" alt="'.$nomContact.'" style="height:13px;"></span>
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

var numerodestinataire;
var numeroutilisateur;
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


$('.favoris_ON_OFF').on('click',function(){
  
  utilisateur=$('#saisiePseudo').val();   
  destinataire=$(this).data('destinataire'); 
  nomDeClassIcone=$('.iconeFavoris' + destinataire );
  
  function ajax_verificationExistanceMDP(utilisateur, destinataire) {
  $.ajax({
      method: "POST",
      url: "02_listedeconnectes/fonctionnement/sqlFavoris_ON_OFF.php",
      data: { utilisateur:utilisateur, destinataire:destinataire}
  })
  .done(function (retour2_html) {
      if (retour2_html=="contact en favoris") {
          nomDeClassIcone.attr('src',"bibliotheque/02_listedeconnectes/icones/star.png");
          $('.favoris_ON_OFF').removeClass('favoris_OFF');
          $('.favoris_ON_OFF').addClass('favoris_ON');
          $('#P2_bouttonboutton').click();            
        }else{
         nomDeClassIcone.attr('src',"bibliotheque/02_listedeconnectes/icones/etoile.png");
          $('.favoris_ON_OFF').removeClass('favoris_ON');
          $('.favoris_ON_OFF').addClass('favoris_OFF');
          $('#P2_bouttonboutton').click();               
        }
  })
  .fail(function () {
      alert("erreur dans ajout / supprimer favoris");
  });
  }
  ajax_verificationExistanceMDP(utilisateur, destinataire);
});


</script>
