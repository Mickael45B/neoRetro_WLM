/*
- Nom du fichier :script_discution.js
- Type : fonctionnement
- Language(s) : JS / JQUERY
*/

/* PARTIE 01 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- WIZZ ==> */
    var shakeButton = document.getElementById('P3_msn-messenger-window');
    var shakeWizz = document.getElementById('P3_wizz');

    var shakeSound = document.getElementById('shakeSound');

    shakeWizz.addEventListener('click', () => {
        // Ajoutez la classe "shake" au bouton
        shakeButton.classList.add('shake');

        // Émet un son 
        if (shakeSound.paused) {
            shakeSound.play();
        }

        // Supprime la classe "shake" après la fin de l'animation
        setTimeout(() => {
            shakeButton.classList.remove('shake');
        }, 1500);
    });
/* <== PARTIE 01 -------------------------------------------------------------------------------------------------------------------------------------------------------------------------- <== WIZZ */

/* PARTIE 02 ==> ------------------------------------------------------------------------------------------------------------------------------------------ CATEGORIE DE CLASSEMENT DES CONTACTS ==> */
    $('.P2_listitem').on('click', function(){
        $(this).removeClass('P2_listitem');
        $(this).addClass('P2_listitemchoisi');
        console.log("ici le resultat" + $(this).attr('id'));

    });
/* <== PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------ <== CATEGORIE DE CLASSEMENT DES CONTACTS */

/* PARTIE 03 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------- 1 ONGLET ==> 1 CONTACT ==> */                
    $('.P2_listitem').on('click', function(){
        var chaineOriginale = $('.P2_listitemchoisi').prop('id');// SERA UTILISE POUR LA DISCUTION AVEC PLUSIEURS CONTACT
    });
/* <== PARTIE 03 --------------------------------------------------------------------------------------------------------------------------------------------------------- <== 1 ONGLET ==> 1 CONTACT */
$('#envoyerMessage').on('click',function() {
    //enregistrementJSON

    contenu = encodeURIComponent($('#messageAEnvoye').val());

    timestamp = Date.now(); // Timestamp en secondes depuis l'époque UNIX
    type = "text";
    PseudoExpediteur=$('#avatarDiscutionUtilisateur').attr('alt');
    PseudoDestinataire=$('#avatarDiscutionDestinataire').attr('alt');
    LangueUtilisee=$('#listDeroulLang').val(); 

    ajax_connexionUtilisateurDejaEnregistre(contenu, timestamp, type, PseudoExpediteur, LangueUtilisee, PseudoDestinataire);

    function ajax_connexionUtilisateurDejaEnregistre(contenu, timestamp, type, PseudoExpediteur, LangueUtilisee, PseudoDestinataire) {
    $.ajax({
        method: "POST",
        url: "03_discution/fonctionnement/EnregistrementDuMessage.php",
        data: { contenu: contenu, timestamp:timestamp, type:type, PseudoExpediteur:PseudoExpediteur, LangueUtilisee:LangueUtilisee, PseudoDestinataire:PseudoDestinataire},
    })
    .done(function (retourenvoiMGG) {
        console.log(retourenvoiMGG);
        $('#messageAEnvoye').text("");

    })
    .fail(function () {
        alert("error dans ajax_connexionUtilisateurDejaEnregistre");
    });
    };

});
