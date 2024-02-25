  $('#envoyerMessage').on('click', function(){ // quand l'utilisateur clique sur le bouton pour envoyer un message

    destinataire = $('.P3_picture').attr("alt");
    utilisateur = $('#saisiePseudo').val();
    messagePoste = $('#messageAEnvoye').val();

    function ajax_EnregistrementMessagedestinataire(destinataire, callback) {//obtenir l'id du destinataire
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

    function ajax_EnregistrementMessageUtilisateur(utilisateur, callback) {//obtenir l'ID de l'utilisateur
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
    var date = new Date().valueOf();

    ajax_EnregistrementMessageUtilisateur(utilisateur, function () {//envoyer et enregistrer le message
      ajax_EnregistrementMessagedestinataire(destinataire, function () {
      
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
          };
        */
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
        ajax_HistoriqueMessage(numerodestinataire, numeroutilisateur);
      });
    });

  });
