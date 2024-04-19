$('#P2_bouttonboutton').on('click',function(){//Pierre
    /*

        QUAND :

        FAIRE :

        POUR :
 */
   
var logSaisiePseudo=($('#saisiePseudo').val());
    function ajax_verificationExistanceMDP(logSaisiePseudo) {
        $.ajax({
            method: "POST",
            url: "../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.php",
            data: { logSaisiePseudo:logSaisiePseudo}
        })
        .done(function (retour2_html) {
            $('#contenuDynamiqueListeContact').html(retour2_html);console.log('contenu chargé');
        })
        .fail(function () {
            alert("erreur dans le traitement dynamique de la liste des connectes");
        });
    }
    ajax_verificationExistanceMDP(logSaisiePseudo);
});




