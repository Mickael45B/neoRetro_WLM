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
    });
/* <== PARTIE 02 ------------------------------------------------------------------------------------------------------------------------------------------ <== CATEGORIE DE CLASSEMENT DES CONTACTS */

/* PARTIE 03 ==> -------------------------------------------------------------------------------------------------------------------------------------------------------- 1 ONGLET ==> 1 CONTACT ==> */                
    $('.P2_listitem').on('click', function(){
        var chaineOriginale = $('.P2_listitemchoisi').prop('id');// SERA UTILISE POUR LA DISCUTION AVEC PLUSIEURS CONTACT
    });
/* <== PARTIE 03 --------------------------------------------------------------------------------------------------------------------------------------------------------- <== 1 ONGLET ==> 1 CONTACT */
