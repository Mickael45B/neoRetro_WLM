//ajouter / enlever des favoris
$('.favoris_ON_OFF').on('click',function(){
    utilisateur=$('#saisiePseudo').val();   
    destinataire=$(this).attr('data-destinataire');//iconeFavoris
    nomDeClassIcone=$('".iconeFavoris' + destinataire + '"');

    function ajax_verificationExistanceMDP(utilisateur, destinataire) {
    $.ajax({
        method: "POST",
        url: "02_listedeconnectes/fonctionnement/sqlFavoris_ON_OFF.php",
        data: { utilisateur:utilisateur, destinataire:destinataire}
    })
    .done(function (retour2_html) {
        if (retour2_html=="contact en favoris") {
            //nomDeClassIcone.attr('src',"bibliotheque/02_listedeconnectes/icones/etoile.png");
            $('.favoris_ON_OFF').addClass('favoris_ON');
            $('.favoris_ON_OFF').removeClass('favoris_OFF');            
            $('#P2_bouttonboutton').click();
          }else{
           // nomDeClassIcone.attr('src',"bibliotheque/02_listedeconnectes/icones/star.png");
            $('.favoris_ON_OFF').addClass('favoris_OFF');
            $('.favoris_ON_OFF').removeClass('favoris_ON');//P2_bouttonboutton
            $('#P2_bouttonboutton').click();
          }
    })
    .fail(function () {
        alert("erreur dans ajout / supprimer favoris");
    });
    }
    ajax_verificationExistanceMDP(utilisateur, destinataire);
});
/*$('#P2_contact-search').on('input',function(){
    var searchString = $('#P2_contact-search').val(); // Récupérer la chaîne de recherche
    $.ajax({
        method: 'POST',
        url: '../02_listedeconnectes/fonctionnement/rechercheContact.php', // Script PHP pour la recherche dans la base de données
        data: { search: searchString }, // Envoyer la chaîne de recherche au serveur
        success: function(response) {
            $('#affichageResultat').html(response); // Mettre à jour la liste des contacts
        },
        error: function(xhr, status, error) {
            console.error(error); // Gérer les erreurs
        }
    })//alert(searchString);
});*/
