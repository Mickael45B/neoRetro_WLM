$(".Discution").on('click',function(){  // des que l'on clique (n'importe ou) dans la fenetre   
  let pseudo = $("#saisiePseudo").val();
  let contenuMDP = $(".P2_listitemchoisi").attr('data-pseudo');

  console.log(pseudo);
  console.log(contenuMDP);
  console.log("----------------------");



  function ajax_verificationExistance1(pseudo, contenuMDP) {//obtenir l'id de l'utilisateur et du destinataire
    $.ajax({
      method: "POST",
      url: "03_discution/fonctionnement/idUtilisateur.php",
      data: {pseudo:pseudo, contenuMDP:contenuMDP }
    })
    .done(function (responseTableau) {
      data = JSON.parse(responseTableau);
      let utilis = data.valeur1;
      let expe = data.valeur2;

      console.log(responseTableau);
      console.log("etape 2 : " + utilis);
      console.log("etape 2 : " + expe);
      console.log("----------------------");

      // Une fois que les valeurs sont définies, afficher l'historique des messages
      
      function fetchData() {
        //console.log(utilis + " num2 " + expe);           

        // Ajouter des en-têtes pour ignorer le cache
        $.ajax({
          method: "GET",
          url: "bibliotheque/03_discution/historiqueS_messages.json",
          cache: false, // Ignorer le cache
          success: function(data) {
          var historiqueMessages =data;
          
          function filtrerMessages() {
            const messagesFiltres = [];
          
            // Parcourir les utilisateurs
            for (const userId in historiqueMessages.utilisateur) { 
              const user = historiqueMessages.utilisateur[userId];
          
              // Vérifier si l'utilisateur est 2 ou 4
              if (userId === '2' || userId === '4') {
                // Parcourir les destinataires de cet utilisateur
                for (const destId in user.destinataire) {
                  const destinataire = user.destinataire[destId];
          
                  // Vérifier si le destinataire est 4 ou 2
                  if (destId === '4' || destId === '2') {
                    // Parcourir les messages de ce destinataire
                    for (let i = 0; i < destinataire.contenu.tableauTimestamp.length; i++) {console.log(i);
                      const timestamp = destinataire.contenu.tableauTimestamp[i];
                      const typeMessage = destinataire.contenu.typeDuMessage[i];
                      const langueMessage = destinataire.contenu.LangueDuMessage[i];
                      const contenuMessage = destinataire.contenu.tableauMessage[i];
                      const emetteur = userId;
          
                      messagesFiltres.push({
                        timestamp,
                        typeMessage,
                        langueMessage,
                        contenuMessage,
                        emetteur
                      });
                    }
                  }
                }
              }
            }
          
            // Trier les messages par ordre chronologique
            messagesFiltres.sort((b, a) => a.timestamp - b.timestamp);
          
            return messagesFiltres;
          }
            
          // Fonction pour afficher les messages dans la div "historique"
          function afficherMessages() {
            const messages = filtrerMessages();
          
            const historiqueDiv = document.getElementById('messageHistory');
            historiqueDiv.innerHTML = ''; // Effacer le contenu précédent
          
            messages.forEach(message => {
              const messageDiv = document.createElement('div');
              if(message.typeMessage=="GIF"){
                const miniatureImg = document.createElement('img');
                miniatureImg.src = message.contenuMessage; // Assurez-vous que message.contenuMessage contient le lien du GIF
                miniatureImg.style.width = '20px';
                miniatureImg.style.height = '20px';
                messageDiv.appendChild(miniatureImg);
            
                miniatureImg.addEventListener('click', function() {
                  // Afficher le GIF en taille réelle pendant 4 secondes
                  const gifImg = document.createElement('img');
                  gifImg.src = message.contenuMessage; // Assurez-vous que message.contenuMessage contient le lien du GIF
                  gifImg.style.position = 'fixed';
                  gifImg.style.top = '50%';
                  gifImg.style.left = '50%';
                  gifImg.style.transform = 'translate(-50%, -50%)';
                  gifImg.style.zIndex = '9999';
                  gifImg.style.transition = 'opacity 0.3s ease-in-out';
                  gifImg.style.opacity = '1';
            
                  document.body.appendChild(gifImg);
            
                  setTimeout(function() {
                    gifImg.style.opacity = '0';
                    setTimeout(function() {
                      document.body.removeChild(gifImg);
                    }, 300); // Attendre la fin de la transition pour supprimer l'image
                  }, 3000); // Afficher le GIF pendant 4 secondes
                });

              }else{
                 messageDiv.textContent = `[${message.timestamp}] ${message.contenuMessage}`;
              }
              messageDiv.style.color = message.emetteur === '2' ? 'blue' : 'green';
              messageDiv.style.textAlign = message.emetteur === '2' ? 'left' : 'right';
              historiqueDiv.appendChild(messageDiv);
            });
          }
            
            // Appeler la fonction pour afficher les messages au chargement de la page
            afficherMessages();
            
          },
          error: function() {
            console.log("Erreur lors du chargement du fichier JSON.");
          }
        });

      }
      fetchData();
      setInterval(fetchData, 2000);
    })
    .fail(function () {
      alert("error dans ajax_verification_Existance1");
    });
  }
  ajax_verificationExistance1(pseudo, contenuMDP);

});
