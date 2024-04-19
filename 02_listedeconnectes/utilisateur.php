<?php
    include '../conectBDD.php'; // connection a la base de donnees
?>


<div id="" class="P2_search" data-vide="" value="" name="" ><!-- recherche -->
    <input id="P2_contact-search" class="" data-vide="" value="" name="" type="text" placeholder="rechercher un contact...">
    <button id="rechercherContact" class="P2_searchbar-btn" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1131.png) no-repeat center;"></button>
    <button id="P2_bouttonboutton" class="P2_searchbar-btn" data-vide="" value="" name="" style="background:url(../bibliotheque/02_listedeconnectes/icones/1132.png) no-repeat center;"></button>
</div>

<div id="affichageResultat"></div><!-- resultat de recherche -->

<div id="popup" style="display:none"><!-- pop-up invitation -->
    <span id=indicationDestinataire></span>
    <button id="annulerMessage" >X</button>
    <textarea id="messageDInvitation" placeholder="minimum 30 caracteres"></textarea>
    <button id="effacerMessage" >effacer</button>
    <button id="validerMessage" data-destinataire="" style="display: none;">Valider</button>
</div>

<div id="contenuDynamiqueListeContact" class="" data-vide="" value="" name="" ></div> 

<script src="../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.js"></script>
<script src="../02_listedeconnectes/fonctionnement/scriptListeConnecte.js"></script>
<script src="../02_listedeconnectes/fonctionnement/chercherContact.js"></script>
<script src="../02_listedeconnectes/fonctionnement/script_connexion.js"></script>



<script>
    var script = document.createElement('script');
    var script2 = document.createElement('script');
    var script3 = document.createElement('script');

    script.src = '../02_listedeconnectes/fonctionnement/listeDifferentsTypeContacts.js';
    script2.src = '../02_listedeconnectes/fonctionnement/scriptListeConnecte.js';
    script3.src = '../02_listedeconnectes/fonctionnement/chercherContact.js';

    document.head.appendChild(script);
    document.head.appendChild(script2);
    document.head.appendChild(script3);
</script>
