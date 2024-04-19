<?php 

include '../../conectBDD.php'; // connection a la base de donnees
require '../../vendor/autoload.php';

echo '

<div id="" class="P2_contact-list" data-vide="" value="" name="" >
    <button id="" class="P2_listitem P2_headerlist" data-vide="" value="" name="" >
        <img id="" class="P2_arrow" data-vide="" value="" name="" src="../bibliotheque/02_listedeconnectes/icones/arrow_placeholder.png">
        <b>Resultat de recherche</b>
    </button>
</div>


';




$saisieSecuPseudo = htmlspecialchars($_POST['search']);
$saisieSecuUtilisateur = htmlspecialchars($_POST['nomPseudo']);
$verifSaisieSecuPseudo = '%' . $saisieSecuPseudo . '%'; // Ajout des % pour la recherche LIKE
if ($saisieSecuPseudo!=="") {
    
    try {
        // Requête SQL pour chercher les utilisateurs dont le pseudo contient la saisie
        $sql = "SELECT * FROM forum_utilisateur WHERE BINARY pseudo=?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($saisieSecuUtilisateur));
      
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC); 
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $id_delutilisateur=$resultat['ID_utilisateur'];

    try {
        // Requête SQL pour chercher les utilisateurs dont le pseudo contient la saisie
        $sql = "SELECT * FROM forum_utilisateur WHERE pseudo LIKE ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($verifSaisieSecuPseudo));
    
        $resultatRequete = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupération de tous les résultats
        
        $nombreUtilisateurs = count($resultatRequete); // Nombre de lignes trouvées

        // Affichage des résultats
        if ($nombreUtilisateurs >= 1) {
            foreach ($resultatRequete as $utilisateur) {
                
                $id_deutilisateur=$utilisateur['ID_utilisateur'];
                $nomContact=$utilisateur['pseudo'];
                $humeur=$utilisateur['humeur'];
                $statut=$utilisateur['statut'];

                // Connexion à la base de données MongoDB
                $client = new MongoDB\Client("mongodb://localhost:27017");
                $database = $client->utilisateurs_invitation;
                $collection = $database->requetes_invitation;

                // Vérifier si les données existent déjà dans la collection
                $existingData = $collection->findOne(['ID_de_l_utilisateur' => $id_deutilisateur]);
                $existingData2 = $collection->findOne(['ID_du_destinataire' => $id_deutilisateur]);

                if (!$existingData && !$existingData2 && $id_deutilisateur!=$id_delutilisateur ) {

                    echo'
                    <button id="P2_invitation'.$nomContact.'" class=" P2_listitem " data-destinataire="'.$nomContact.'">
                    <img class="P2_aerobutton P2_status-icon P2_listeInvitation" src="00_general/icones/statutProfil/online.png" alt="Online">
                    <span  class="favoris_ON_OFF favoris_OFF" ><img class="iconeFavoris'.$nomContact.'" src="bibliotheque/02_listedeconnectes/icones/etoile.png" alt="'.$nomContact.'" style="height:13px;"></span>
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
        } else {
            echo "Aucun utilisateur trouvé.";
        }

    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
}else{
    echo "";
}
?>



<script>

$('.blocPseudoHumeur').on('click',function(){
//alert($('#saisiePseudo').val());// TEST DE FONCTIONNEMENT
pseudoUtilisateur=$('#saisiePseudo').val();

pseudoDestinataire=$(this).data('pseudo');//recuperation du nom du destinataire de l'invitation

$('#indicationDestinataire').text('envoyer un message à  ' + pseudoDestinataire + ' avec votre invitation')
$('#validerMessage').attr("data-destinataire", pseudoDestinataire);// modification de la valeur de l'attribut "data-destinataire" pour l'envoi du message
$('#popup').fadeIn();
$('#popup').css({
      'display': 'grid',
      'position': 'absolute',
      'top' : '50%',
      'left' : '50%',
      'z-index': '999', // Met le div en premier plan
      'height': '200px',
      'width': '400px'
    });
});/*
$(document).on('click', function(event) {
        if (!$(event.target).closest('#popup').length && !$(event.target).is('.blocPseudoHumeur')) {
            // Si le clic est en dehors de #popup et n'est pas sur .blocPseudoHumeur, cache le div #popup
            $('#popup').hide();
        }
    });*/
$('#messageDInvitation').keyup(function() {
    var message = $(this).val();
    if (message.length >= 30) {
        $('#validerMessage').show();
    } else {
        $('#validerMessage').hide();
    }
});
$('#annulerMessage').on('click', function() {
        $('#popup').hide(); // Cache le div #popup
    });
$('#effacerMessage').on('click', function(){

    $('#messageDInvitation').val('');

});

$('#validerMessage').on('click',function(){

    var destinataire=$('#validerMessage').data('destinataire');//destinataire
    var utilisateur=$('#saisiePseudo').val();//utilisateur
    var dateHeureInvitation=Date.now();//timestamp en millisecondes
    var messageInvitation=$('#messageDInvitation').val();//contenu du message d'invitation

        function ajax_verificationExistanceMDP(destinataire, utilisateur, dateHeureInvitation, messageInvitation) {

        $.ajax({
            method: "POST",
            url: '../02_listedeconnectes/fonctionnement/enregistrerUneInvitation.php',
            data: { destinataire:destinataire, utilisateur:utilisateur, dateHeureInvitation:dateHeureInvitation, messageInvitation:messageInvitation}
        })
        .done(function (response) {
            console.log(response);
        })
        .fail(function () {
            alert("erreur dans le traitement dynamique de la liste des connectes");
        });
        }
        ajax_verificationExistanceMDP(destinataire, utilisateur, dateHeureInvitation, messageInvitation);


});









</script>