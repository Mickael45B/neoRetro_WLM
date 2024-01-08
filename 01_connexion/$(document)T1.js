$(document).ready(function() { 

// ETAPE 1 -- on arrive sur le site ==>
	$('#P0_logoDeDemarageButton').on('click',function() {//LORS DU CLICK SUR LE LOGO  

		$('#P0_logoDeDemarage').fadeOut();// masque le logo
		$('.P0_connexion_ASonCompte').fadeIn();// affiche la fenetre de connexion

		

		$('#P1_app__login--email').fadeOut();//masquer la zone de saisie d'adresse mail
		$('#saisieMDP').fadeOut();//masquer la zone de saisie d'adresse mail
		$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
		$('.P1_app__login-inner--select').fadeOut();//masquer le "statut" et le choix de la langue
		$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
		$('.GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
		$('#P1_app__login-button').text('se connecter en anonyme');

		message1='vous pouvez vous connecter en anonyme';
		message2='en cliquant sur le bouton';  




	});
// <== ETAPE 1 -- on arrive sur le site

//ETAPE 2 On est sur la fenetre de connexion ==>
	// ETAPE 2 / PARTIE 1 -- on sohaite se connecter en "anonyme" ==>

		$('#saisiePseudo').on('input', function() {

			if ($('#saisiePseudo').val().length <=1) {
				message1='vous pouvez vous  en anonyme';
				message2='en cliquant sur le bouton'; 

				$('#P1_app__login-button').fadeIn();
				$('#P1_app__login--email').fadeOut();
				console.log('vide');

			}
		});
	// <== ETAPE 2 / PARTIE 1 -- on sohaite se connecter en "anonyme" 


		// ----------------------------------------------------   VERIFICATION DE L'EXISTANCE DU PSEUDO ==> -------------------------------------------------------------------------------
			$('#saisiePseudo').on('input', () => { //Lors de la saisie d'un caractere dans la zone "Pseudo"
				// Traitement AJAX de la saisie
			
				const contenusaisi = $('#saisiePseudo').val();//caractere(s) saisi
				ajax_verificationExistance(contenusaisi);
			
				function ajax_verificationExistance(contenusaisi) {
					$.ajax({
						method: "POST",
						url: "TraitementVerificationPseudo.php",
						data: { contenusaisi:contenusaisi},
					})
					.done(function (retour1_html) {
						//console.log(retour1_html);
				
						if(retour1_html=="existe"){// si le traitement AJAX a retourné "existe"

						message1='Pseudo OK';
						message2='Renseigner Le mot de passe';

						$('.P1_app__login--pseudo').css('background-color', 'green');// entoure la zone de saisie de vert
						$('#saisiePseudo').addClass('existe'); 

						$('#saisieMDP').fadeIn();//masquer l'ensemble de glyphes de securité'
						$('#P1_app__login-button').fadeOut();	
						$('#P1_app__login--email').fadeOut();
						} 
						
						else { // dans cas contraire 

						message1='Pseudo non pris';
						message2='creer un compte';

						$('.P1_app__login--pseudo').css('background-color', ''); //retirer la bordure verte de la zone de saisie
						$('#saisiePseudo').removeClass('existe');
						$('#P1_app__login--email').fadeIn();//masquer l'ensemble de glyphes de securité'
						$('#saisieMDP').fadeOut();
						if($('#saisiePseudo').val().length >=2){
							
						$('#P1_app__login-button').fadeOut();
						}
						}
					})
					.fail(function () {
						alert("error dans ajax_verificationExistance");//si le traitement retourne une erreur
					});
				};
			});
	
		// ---------------------------------------------------- <== VERIFICATION DE L'EXISTANCE DU PSEUDO -------------------------------------------------------------------------------







		// ----------------------------------------------------   VERIFICATION DU MOT DE PASSE POUR UN PSEUDO ==> -------------------------------------------------------------------------------
			$('.P1_app__login--pass').on('keyup', () => {
				const contenusaisiPseudo = $('.P1_app__login--pseudo').val();//saisie du pseudo
				const contenusaisiMDP = $('.P1_app__login--pass').val();// saisie du Mot de Passe
				ajax_verificationExistance(contenusaisiPseudo,contenusaisiMDP);

				function ajax_verificationExistance(contenusaisiPseudo,contenusaisiMDP) {
				$.ajax({
					method: "POST",
					url: "TraitementVerificationMDP.php",
					data: { contenusaisiPseudo: contenusaisiPseudo,contenusaisiMDP:contenusaisiMDP },
				})
				.done(function (retour2_html) {
					//$('#messageInfoConnexion').html(retour2_html);
					if (retour2_html=="correct") {
						if ($('#saisiePseudo').hasClass('correct')) {
							message1='Pseudo et mot de passe Correct';
							message2='Vérifier la langue,le statut et cliquez sur le bon glyphe de sécurité'; 

							$('.P1_app__login--pass').css('background-color', 'green');
							//$('#P1_app__login-button').text('Entrer');
							$('#saisieMDP').addClass('correct');
							$('.P1_app__login-inner--select').fadeIn();
							$('#bocDeGlypsDeSecurite').fadeIn();
							$('.GlyphAChoisir').fadeIn();
							$('#P1_app__login-button').fadeOut();
						}



					
					} 
					//if (retour2_html=="incorrect") {
					else{	
					
					message1='Mot de passe incorect';
					message2='revérifiez votre saisie'; 

						if ($('#saisiePseudo').hasClass('correct')) {
							
						
							$('.P1_app__login--pass').css('background-color', 'transparent'); // Réinitialisez la bordure si le texte n'est pas "ok"

							$('.P1_app__login-inner--select').fadeOut();
							$('#bocDeGlypsDeSecurite').fadeOut();
							$('.GlyphAChoisir').fadeOut();
							$('#P1_app__login-button').fadeOut();
						}
					}
				})
				.fail(function () {
					alert("error dans ajax_verificationExistance");
					
				});
				};
			});
		// ---------------------------------------------------- <== VERIFICATION DU MOT DE PASSE POUR UN PSEUDO -------------------------------------------------------------------------------

		// ----------------------------------------------------   VERIFICATION SI ON A CLIQUE SUR LE BON GLYPHE DE SECURITE ==> -------------------------------------------------------------------------------
			$('.iconeSecu').on('click', function() { 

				iconeAttendue=$('#glyphASelectione').text();// icone attendue
				iconeClicque=$(this).attr('value'); // icone selectione
				classAVise='#iconeSecu'+iconeClicque;
				if(iconeAttendue==iconeClicque){  //- oui ==>continuer

					message1='Tout a été vérifié, et est correct';
					message2='vous pouvez vous connecter'; 
				
					$(classAVise).css('background-color', 'green');
					//$(classAVise).css('scale', '2');
					$(bocDeGlypsDeSecurite).attr('class','correct');
					$('#P1_app__login-button').fadeIn();
					$('#P1_app__login-button').on('click', function() { 
						
						$('.P0_connexion_ASonCompte').fadeOut();
						$('.ListeDesContacts').fadeIn();
					});
				}
				else{

					message1='reverifiez vos informations';
					message2='des erreurs ont été détecté'; 

				$(classAVise).css('background-color', 'red');
				$(bocDeGlypsDeSecurite).attr('class','incorrect');

				$('#P1_app__login-button').fadeOut();
				}

			});
		// ---------------------------------------------------- <==  VERIFICATION SI ON A CLIQUE SUR LE BON GLYPHE DE SECURITE -------------------------------------------------------------------------------

		// ---------------------------------------------------- AlTERNER ENTRE 2 MESSAGES ==> ------------------------------------------------------------------------------- PB
				//alterner entre 2 messages
				var toggle = true;

				function toggleMessage2() {
				if (toggle) {
					$('#messageInfoConnexion').text(message1);
					} else {
					$('#messageInfoConnexion').text(message2);
					}
					toggle = !toggle;  // Inverser la valeur du toggle pour la prochaine fois
				}
				setInterval(toggleMessage2, 2000);
		// ---------------------------------------------------- <==  AlTERNER ENTRE 2 MESSAGES -------------------------------------------------------------------------------
		// ----------------------------------------------------   CHOIX AUTOMATIQUE / MODIFICATION DE LA LANGUE UTILISE ==> ------------------------------------------------------------------------------- 
			const userLanguage = navigator.language || navigator.userLanguage; 
			const liste=document.getElementById('listDeroulLang');
			// CHOIX AUTOMATIQUE  
			for (let i = 0; i < liste.options.length; i++) {
				if (liste.options[i].value === userLanguage) {
				liste.options[i].setAttribute('selected', '');
					//var ligneSelectione=i;
				break;
				}
			}
			// MODIFICATION  
			selectValue = liste.selectedIndex;
			
			$('#listDeroulLang').on('change',function() {
				selectValue = liste.selectedIndex;
				//liste.options[ligneSelectione].removeAttribute('selected');
				//liste.options[selectValue].setAttribute('selected', '');
				
			});
		// ---------------------------------------------------- <== CHOIX AUTOMATIQUE / MODIFICATION DE LA LANGUE UTILISE -------------------------------------------------------------------------------
		
			//console.log($('#listDeroulLang').val()); // ------------------------------------------------------------------------------------ LIGNE DE TEST
		   
			  //console.log('cette parie traite les utilisateurs deja enregistre');// ---------------------------------------------------- LIGNE DE TEST
			
				$('#P1_app__login-button').on('click',function(){ //$('.ListeDesContacts').fadeOut();//affiche la liste de connectes
					if($('#saisieMDP').hasClass('correct') && $('#saisiePseudo').hasClass('existe')){ //mise a jour de la langue pour les inscrits
						//console.log('traitement AJAX de l utilisateur deja enregistre');// ----------------------------------------------- LIGNE DE TEST

						const logSaisiePseudo=$('#saisiePseudo').val();//console.log(logSaisiePseudo);
						const logSaisieLangue=$('#listDeroulLang').val();//console.log(logSaisieLangue);
		  
						ajax_connexionUtilisateurDejaEnregistre(logSaisiePseudo,logSaisieLangue);
		  
						function ajax_connexionUtilisateurDejaEnregistre(logSaisiePseudo,logSaisieLangue) {
						  $.ajax({
							method: "POST",
							url: "connexionUtilisateurDejaEnregistre.php",
							data: { logSaisiePseudo: logSaisiePseudo,logSaisieLangue:logSaisieLangue },
						  })
						  .done(function (retour3_html) {
							//console.log(retour3_html);
						  })
						  .fail(function () {
							alert("error dans ajax_connexionUtilisateurDejaEnregistre");
						  });
						};
					}
				});
		  
				//$('#saisiePseudo').on('keyup', () => {
					if (!$('#saisiePseudo').hasClass('existe')){ //=>NOUVEAU    
						//console.log('traitement dun nouvel utilisateur');// ---------------------------------------------------------------------- LIGNE DE TEST   
						
						message1='Ce pseudo n est pas pris';
						message2='vous pouvez creer un profil avec'; 

						





						function verifierFormatEmail(chaine) {
							// Test de la chaîne avec l'expression régulière
							return regexEmail.test(chaine);
						}
						
						adressemail=$('#saisieMail').val();
						
						let longeurMDP = document.getElementById('saisieMDP').value;
						const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;// Définition de l'expression régulière pour vérifier le format d'un email
						const emailValide = verifierFormatEmail(adressemail);
						
				
						
						
				
						if (!$('#saisiePseudo').hasClass('existe') && $('#saisieMail').val()!="" && longeurMDP.length>=6 && $('#saisieMDP').val()===$('#saisieConfirmMDP').val() && $('#bocDeGlypsDeSecurite').hasClass("correct")) {
							if (emailValide) {
							 console.log('enregistrement du nouvel utilisateur');// ----------------------------------------------------------------- LIGNE DE TEST    
					
							enregistrerPseudo=$('#saisiePseudo').val();
							enregistrerMail=$('#saisieMail').val();
							enregistrerMDP=$('#saisieMDP').val();
							enregistrerLang=liste.options[selectValue].value;
					
							
							ajax_enregistrementNouveauProfil(enregistrerPseudo,enregistrerMail,enregistrerMDP,enregistrerLang);
					
							function ajax_enregistrementNouveauProfil(enregistrerPseudo,enregistrerMail,enregistrerMDP,enregistrerLang) {
								$.ajax({
								method: "POST",
								url: "TraitementEnregistrementNouvelUtilisateur.php",
								data: { enregistrerPseudo:enregistrerPseudo,enregistrerMail:enregistrerMail,enregistrerMDP:enregistrerMDP,enregistrerLang:enregistrerLang },
								})
								.done(function (retour2_html) {
									message1='Vous avez été inscrit';
									message2='Merci de votre Confience'; 
			
									$('.ListeDesContacts').fadeIn();
								})
								.fail(function () {
								alert("error dans ajax_verificationExistance");
								
								});
							};
					
							
							} else {
								console.log("Format d'email invalide.");
							}
						} else{
							console.log('veuillez reverifier les informations');
						}
					}
				//});  
		  
		  
		  
		  
		
		  /*
		  $('.P2_listitem').on('click', function(){
			  iconeClicque=$(this).attr('id');//console.log(iconeClicque);
		  
		  
			  var chaineOriginale = iconeClicque;
		  
		  // Utilisation de replace avec une expression régulière pour retirer la suite "contact"
		  var destinataire = chaineOriginale.replace(/P2_contact/, '');
		  
		  message1="To: "+destinataire;
		  message2='(example@example.com)';
		  
		  
		  
		  var toggle = true;
		  
		  function toggleMessage2() {
		  if (toggle) {
			  $('#messageInfoConnexion').text(message1);
			} else {
			  $('#messageInfoConnexion').text(message2);
			}
			toggle = !toggle;  // Inverser la valeur du toggle pour la prochaine fois
		  }
		  setInterval(toggleMessage2, 2000);
		  
		  
		  
		  
		  
		  
		  
		  
		  $('#destinataire').text(destinataire+'teeeeeeeeeeeeeeeeesst');
		  console.log(destinataire);    
		  });*/
		  
				  











});