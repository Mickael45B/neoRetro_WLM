<?php 
include '../conectBDD.php'; 

$sasieSecuPseudo=strip_tags($_POST['logSaisiePseudo']);

try {
    $sql = "SELECT * FROM  forum_utilisateur   WHERE pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($sasieSecuPseudo));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
$resultatRequeteID = $stmt->fetch(PDO::FETCH_ASSOC);
$idDeUtilisateur = $resultatRequeteID['ID_utilisateur'];

    try {
        $sql = "SELECT * FROM  forum_contact  WHERE ID_utilisateur=?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($idDeUtilisateur));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $resultatRequete = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $nombreDeLignes = $stmt->rowCount();

    ?>
    <div class="P2_contact-list">
      <button class="P2_listitem P2_headerlist">
          <img class="P2_arrow" src="02_listedeconnectes/icones/arrow_placeholder.png">
          <b>Favoris</b>
      </button>
    </div>

    <div class="P2_contact-list">
        <button class="P2_listitem P2_headerlist">
            <img class="P2_arrow" src="02_listedeconnectes/icones/arrow_placeholder.png">
            <b>En ligne ( <?php echo $nombreDeLignes; ?> )</b>
        </button>

    <?php 

    if ($nombreDeLignes>=1) {
      foreach ($resultatRequete as $traitementRequete) {
        try {
            $sql = "SELECT * FROM  forum_utilisateur  WHERE ID_utilisateur=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($traitementRequete['ID_contact']));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatStmt=$stmt->fetch(PDO::FETCH_ASSOC);
        $nomContact=$resultatStmt['pseudo'];
        $humeur=$resultatStmt['humeur'];

                echo'
                <button id="P2_contact'.$nomContact.'" class=" P2_listitem">
                    <img class="P2_aerobutton P2_status-icon" src="00_general/icones/statutProfil/online.png" alt="Online">
                    <span class="P2_contact-text P2_name">'.
                    $nomContact.
                    '</span>
                    <p class="P2_contact-text P2_message" style="color: darkgray;">'.
                    $humeur. 
                     '</p>
                </button>
                ';

        //$traitementRequete['colone']; iconeClicque=$(this).attr('value');
      }
    }
?>
              </div>
              
              <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>Hors ligne</b>
                </button>
              </div>

              <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>requête de contact</b>
                </button>
              </div>

              <div class="P2_contact-list">
                <button class="P2_listitem P2_headerlist">
                    <img class="P2_arrow" src="02_listedeconnectes/icones/arrow_placeholder.png">
                    <b>Demande de contact</b>
                </button>
              </div>

<script src="01_connexion/script_connexion.js"></script><!-- script pour la fenetre de connexion -->



              <script>

var numerodestinataire;
var numeroutilisateur;



    //let message;
  $('.P2_listitem').on('click', function(){
    // Retirer la classe P2_listitemchoisi de tous les éléments
    $('.P2_listitem').removeClass('P2_listitemchoisi');

    // Ajouter la classe P2_listitemchoisi à l'élément cliqué
    $(this).addClass('P2_listitemchoisi');
    $('.Discution').fadeIn();
    $('.ListeDesContacts').fadeOut();
    var message = $(this).find('.P2_message').text();



//console.log('rentré dedanss');
var chaineOriginale = $('.P2_listitemchoisi').prop('id');
    //console.log(chaineOriginale);
    var destinataire = chaineOriginale.replace(/P2_contact/, '');

//P3_picture





const avatarDeb = "00_general/avatars/";
				const avatarFin = ".png";




ajax_verificationAvatardestinataire(destinataire);

function ajax_verificationAvatardestinataire(destinataire) {
  $.ajax({
  method: "POST",
  url: "TraitementVerificationAvatardestinataire.php",
  data: { destinataire: destinataire },
  })
  .done(function (retour2_html) {

    //if ($('#saisiePseudo').hasClass('existe')) {
      cheminComplet= avatarDeb + retour2_html +avatarFin;

      avatarDestinataire='discution'+destinataire;

      $('.P3_pictureDestinataire').attr("src", cheminComplet);
      $('.P3_picture').addClass(avatarDestinataire);
      $('.P3_picture').attr("alt", destinataire);

  })
  .fail(function () {
  alert("error dans ajax_verificationAvatardestinataire");
  
  });
};




message1="discution avec : "+destinataire;
message2=message;
//.log('message'+ message);

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










});
var numerodestinataire;
var numeroutilisateur;

$('#envoyerMessage').on('click', function(){

destinataire = $('.P3_picture').attr("alt");
utilisateur = $('#saisiePseudo').val();
messagePoste = $('#messageAEnvoye').val();

/*var date = new Date();console.log(date);

// Obtenir les composants de la date et de l'heure
var jour = date.getDate();
var mois = date.getMonth() + 1; // Les mois commencent à 0
var annee = date.getFullYear();
var heures = date.getHours();
var minutes = date.getMinutes();
var secondes = date.getSeconds();

// Afficher la date et l'heure dans la console
console.log("Date : " + jour + "/" + mois + "/" + annee);
console.log("Heure : " + heures + ":" + minutes + ":" + secondes);*/

//


//ajax_EnregistrementMessagedestinataire(destinataire);

function ajax_EnregistrementMessagedestinataire(destinataire, callback) {
  $.ajax({
  method: "POST",
  url: "EnregistrementMessagedestinataire.php",
  data: { destinataire:destinataire},
  })
  .done(function (retourA1_html) {
    numerodestinataire = retourA1_html;
    callback();
  })
  .fail(function () {
  alert("error dans ajax_EnregistrementMessagedestinataire");
  
  });
};

//INSERT INTO table (nom_colonne_1, nom_colonne_2, ...
 //VALUES ('valeur 1', 'valeur 2', ...)





//ajax_EnregistrementMessageUtilisateur(utilisateur);

function ajax_EnregistrementMessageUtilisateur(utilisateur, callback) {
  $.ajax({
  method: "POST",
  url: "EnregistrementMessageUtilisateur.php",
  data: {utilisateur:utilisateur },
  })
  .done(function (retourA2_html) {
    numeroutilisateur = retourA2_html;
    callback();
  })
  .fail(function () {
  alert("error dans ajax_EnregistrementMessageUtilisateur");
  
  });
};

//INSERT INTO table (nom_colonne_1, nom_colonne_2, ...
 //VALUES ('valeur 1', 'valeur 2', ...)



 var date = new Date().valueOf();






ajax_EnregistrementMessagedestinataire(destinataire, function () {
  ajax_EnregistrementMessageUtilisateur(utilisateur, function () {
   
    // Les valeurs numerodestinataire et numeroutilisateur sont désormais définies

    /*
    ajax_EnregistrementMessage(numerodestinataire, numeroutilisateur, messagePoste, date);

    function ajax_EnregistrementMessage(numerodestinataire, numeroutilisateur, messagePoste, date) {
      $.ajax({
      method: "POST",
      url: "EnregistrementMessage.php",
      data: { destinataire:numerodestinataire, utilisateur:numeroutilisateur, messagePoste:messagePoste, date:date},
      })
      .done(function (retourX_html) {


      })
      .fail(function () {
      alert("error dans ajax_EnregistrementMessage");
      
      });
    };*/

    ajax_HistoriqueMessage(numerodestinataire, numeroutilisateur);

    function ajax_HistoriqueMessage(numerodestinataire, numeroutilisateur) {
      $.ajax({
      method: "POST",
      url: "historiqueMessage.php",
      data: { numerodestinataire:numerodestinataire, numeroutilisateur:numeroutilisateur},
      })
      .done(function (ajax_HistoriqueMessage) {
        $('#historiqueMessageRecu').html(ajax_HistoriqueMessage);

      })
      .fail(function () {
      alert("error dans ajax_HistoriqueMessage");
      
      });
    };
    console.log(numerodestinataire);
      console.log(numeroutilisateur);

    //setInterval(ajax_HistoriqueMessage, 2000);

  });
});

});

/*

var dateTimestamp = 1704663072727;
var date = new Date(dateTimestamp);
// Obtenir les composants de la date et de l'heure
var jour = date.getDate();
var mois = date.getMonth() + 1; // Les mois commencent à 0
var annee = date.getFullYear();
var heures = date.getHours();
var minutes = date.getMinutes();
var secondes = date.getSeconds();

// Afficher la date et l'heure dans la console
console.log("Le : " + jour + "/" + mois + "/" + annee + " a : " + heures + ":" + minutes + ":" + secondes);*/

/*
$('.P3_history').text('coucregfsdgsdfhgesdgtrhjtdshjurtyjhtygfhdrfhygfjhnrtdyhrdtyfgjnytgfherdyhbdytgfjnghfjhgserdfjhnbgfjhrgedsrhrtygf,jnyhjuhrtdfjntyfyhgredfhbtygfvou')


$('#historiqueMess').html(`<div style="width:290px; justify-content:left; margin-left:8px ;margin-right:-10px">
<textarea rows="8" cols="30" id="historiqueMessageRecu" style="width: 100%; height:100%; border:none; resize: none; color: darkgray;">
coucregfsdgsdfhgesdgtrhjtdshjurtyjhtygfhdrfhygfjhnrtdyhrdtyfgjnytgfherdyhbdytgfjnghfjhgserdfjhnbgfjhrgedsrhrtygf,jnyhjuhrtdfjntyfyhgredfhbtygfvou 
</textarea>
</div>`)

*/
</script>
<?php
/*
$monTableauJSON = json_decode(file_get_contents('../historiqueS_messages.json'), true);

$longueurTableau = count($monTableauJSON['tableauMessage']);

// Utiliser le tableau JSON
//echo $monTableauJSON['tableauTimestamp'][1];


$a = 1;
while ($a < $longueurTableau) {

  //echo $a;
  
$timeStampBoucle = $monTableauJSON['tableauTimestamp'][$a];
$messageBoucle = $monTableauJSON['tableauMessage'][$a];

echo '<br>'.$timeStampBoucle.'<br>';
echo $messageBoucle.'<br>';


  $a++;
}

*/














/*
// Exemple d'un tableau
$monTableau = array('élément1', 'élément2', 'élément3', 'élément4');

// Utiliser la fonction count()
$longueurTableau = count($monTableau);

// Ou utiliser la fonction sizeof()
// $longueurTableau = sizeof($monTableau);

// Afficher la longueur du tableau
echo 'La longueur du tableau est : ' . $longueurTableau;
*/
?>









<!--



var toggle = true;

function toggleMessage2() {
if (toggle) {
    $('#messageInfoConnexion').text(message1);
  } else {
    $('#messageInfoConnexion').text(message2);
  }
  toggle = !toggle;  // Inverser la valeur du toggle pour la prochaine fois
}
setInterval(toggleMessage2, 2000);
-->