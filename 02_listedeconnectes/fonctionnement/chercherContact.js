//alert('chercher');//P2_contact-search
$('#rechercherContact').on('click', function(){
    var searchString=$('#P2_contact-search').val();
    var nomPseudo=$('#saisiePseudo').val();

        function ajax_verificationExistanceMDP(searchString, nomPseudo) {

        $.ajax({
            method: "POST",
            url: '../02_listedeconnectes/fonctionnement/rechercheContact.php',
            data: { search: searchString, nomPseudo:nomPseudo}
        })
        .done(function (response) {
            $('#affichageResultat').html(response);
        })
        .fail(function () {
            alert("erreur dans le traitement dynamique de la liste des connectes");
        });
        }
        ajax_verificationExistanceMDP(searchString,nomPseudo);
        
    });    

