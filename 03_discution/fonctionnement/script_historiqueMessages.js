
let utilis;
let expe;


                        function displayMessageHistory(data) {
                          if ($(".Discution").css('display') !== 'none') {
                            test1 = $("#saisiePseudo").val();
                            test2 = $(".P2_listitem.P2_listitemchoisi").attr("id");
                            test3 = test2.replace('P2_contact', '');

                            function ajax_verificationExistance1(test1) {
                              $.ajax({
                                  method: "POST",
                                  url: "TraitementVerificationPseudoId.php",
                                  data: { test: test1 },
                              })
                              .done(function (retouridutil_html) {
                                  utilis = retouridutil_html;
                                  console.log("utilisateur " + retouridutil_html);
                              })
                              .fail(function () {
                                  alert("error dans ajax_verificationExistance1");
                              });
                            };

                            function ajax_verificationExistance2(test3) {
                              $.ajax({
                                method: "POST",
                                url: "TraitementVerificationPseudoId.php",
                                data: { test: test3 },
                              })
                              .done(function (retouriddest_html) {
                                  expe = retouriddest_html;
                                  console.log("destinataire " + retouriddest_html);
                              })
                              .fail(function () {
                                  alert("error dans ajax_verificationExistance2");
                              });
                            };
                            ajax_verificationExistance1(test1);
                            ajax_verificationExistance2(test3);
                          }

                          const messageHistoryDiv = document.getElementById('messageHistory');

                          // Effacer le contenu précédent
                          messageHistoryDiv.innerHTML = '';

                          // Extract and filter messages from the data object
                          const messages = [];
                          for (const utilisateurKey in data["utilisateur"]) {
                            for (const destinataireKey in data["utilisateur"][utilisateurKey]["destinataire"]) {
                              const contenu = data["utilisateur"][utilisateurKey]["destinataire"][destinataireKey]["contenu"];
                              for (let i = 0; i < contenu.tableauTimestamp.length; i++) {
                                const message = {
                                  timestamp: parseInt(contenu.tableauTimestamp[i]),
                                  typeDuMessage: contenu.typeDuMessage[i],
                                  message: contenu.tableauMessage[i],
                                  utilisateur: utilisateurKey,
                                  destinataire: destinataireKey
                                };

                                // Ajouter le message uniquement s'il correspond aux critères
                                if ((message.utilisateur === utilis && message.destinataire === expe) ||
                                    (message.utilisateur === expe && message.destinataire === utilis)) {
                                    messages.push(message);
                                }
                              }
                            }
                          }

                          // Sort messages by timestamp
                          messages.sort((a, b) => b.timestamp - a.timestamp);

                          // Display messages in the messageHistoryDiv
                          messages.forEach(message => {
                            const messageDiv = document.createElement('div');
                            messageDiv.classList.add('message');

                            if (message.utilisateur === utilis) {
                                messageDiv.classList.add('blue-text');
                            } else if (message.utilisateur === expe) {
                                messageDiv.classList.add('green-text');
                            }
                            const dateHeure = new Date(message.timestamp).toLocaleString();
                            const msg = message.message;
                            messageDiv.innerHTML = `${dateHeure} <br> ${msg}`;
                            messageHistoryDiv.appendChild(messageDiv);
                          });
                        }
                        function fetchData() {
                            // Charger les données en utilisant fetch
                            fetch('historiqueS_messages_sauv.json')
                            .then(response => response.json())
                            .then(data => displayMessageHistory(data))
                            .catch(error => console.error('Erreur lors du chargement des données:', error));
                          }
  
                          // Actualiser les données toutes les 5 secondes
                          setInterval(fetchData, 2000);
  
                          // Appeler fetchData une première fois au chargement de la page
                          fetchData();
  