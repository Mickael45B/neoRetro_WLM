//PARTIE 00
logoDemarage_ID= $('#P0_logoDeDemarageButton');

//PARTIE01
avatarFenetreConnexion_class=$('.P1_app__profile--image');

saisiePseudo_ID=$('#saisiePseudo');
soumettrePseudo_ID= $('#soumettrePseudo');

saisieMail_ID= $('#blocSaisieMail');
soumettreMail_ID=$('#soumettreMail');

saisieMDP_ID= $('#blocSaisieMDP');
saisie_MDP_ID= $('#saisieMDP');
soumettreMDP_ID=$('#soumettreMDP');

saisieConfirmMDP_ID= $('#blocSaisieConfirmMDP');

saisiestatut_ID= $('#blocSaisieStatut');

saisielangue_ID= $('#blocSaisieLangue');

saisieGlypheSecurite_ID= $('#bocDeGlypsDeSecurite');

glypheAChoisir_ID= $('#GlyphAChoisir');

seConnecter_ID= $('#P1_app__login-button')

avatarNotificationConnection_class=$('.P1_app__notification__user--photo');
						

//PARTIE 02						
avatarListeConnecte_ID=$('#P2_avatar');

//PARTIE03
avatarFenetreDiscution_ID=$('#avatarDiscutionUtilisateur');

boolExistancePseudo=false;

avatarDeb = "00_general/avatars/";
avatarFin = ".png";
longeurMiniPseudo =3;
longeurMiniMDP=6;
// ------------------------------------------ APPARITION / DISPARITION DE LA NOTIFICATION DE CONNECTION ==> --------------------------------------------------------------------------

	signInBtn = document.getElementById('P1_app__login-button');
	signInNotification = document.querySelector('.P1_app__notification');
	closeBtn = document.querySelector( '.P1_app__notification__close' );

	userName = document.querySelector('#saisiePseudo');
	userNameContainer = document.querySelector('.P1_notification-username');

		signInBtn.addEventListener("click", function() {
			signInNotification.style.display = "block";
			userNameValue = userName.value || 'anonyme';
			userNameContainer.innerHTML = userNameValue;
		}, false);
		
		function closeNotification() {
			signInNotification.style.display = "none";
		}

		closeBtn.addEventListener("click", closeNotification, false);
		signInBtn.addEventListener("click", function() {
			setTimeout(closeNotification, 5000);
		}, false);
// ------------------------------------------ <== APPARITION / DISPARITION DE LA NOTIFICATION DE CONNECTION  --------------------------------------------------------------------------

	logoDemarage_ID.on('click',function() {//Lors du click sur le logo

		$('#P0_logoDeDemarage').fadeOut();// masque le logo
		$('.P1_connexion_ASonCompte').fadeIn();// affiche la fenetre de connexion

		$('#saisiePseudo').fadeIn();
		saisieMail_ID.fadeOut();//masquer la zone de saisie d'adresse mail
		saisieMDP_ID.fadeOut();//masquer la zone de saisie d'adresse mail
		saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
		saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
		saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
		$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
		$('#GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
		$('#P1_app__login-button').fadeIn();

	});
		message1='vous pouvez vous connecter en anonyme';
		message2='en cliquant sur le bouton';  

	saisiePseudo_ID.on("input", function(event) {// ETAPE DE SECURISATION : exclusion de certains caracteres pour eviter l'injection de code
		var input = event.target;
		var value = input.value;
		var newValue = "";
		for (var i = 0; i < value.length; i++) {
			// Vérifie si le caractère actuel n'est pas un des caractères spécifiés
			if (!(/[<>?:"'()\[\]{}/*`;$#,]/.test(value[i]))) {
				newValue += value[i]; // Ajoute le caractère à la nouvelle valeur
			}
		}
		input.value = newValue; // Met à jour la valeur de l'input
	});

	soumettrePseudo_ID.on('click', function(){// Lors du click de validation de la saisie du pseudo

		etape=1;// correspond a l'etape de verification de l'existance du pseudo dans la BDD
		pseudo=saisiePseudo_ID.val();//***verif
		contenuMDP="";//***verif=>etape MDP, sinon effacer contenu
		var contenusaisi = saisiePseudo_ID.val();//caractere(s) saisi

		function ajax_verificationExistance(etape, pseudo, contenuMDP) {
			$.ajax({
				method: "POST",
				url: "01_connexion/fonctionnement/TraitementVerification.php",
				data: { etape:etape, pseudo:pseudo, contenuMDP:contenuMDP},
			})
			.done(function (retourVerification_html) {//retourPseudo_html
				if(retourVerification_html=="existe"){//si l'utilisateur est deja enregistre dans la BDD
				
					boolExistancePseudo=true;

					saisiePseudo_ID.css('background-color', 'green');// la zone de saisie devient verte
					saisiePseudo_ID.addClass('existe');
					
					saisiePseudo_ID.fadeIn();// laisser afficher la saisie de pseudo
					saisieMail_ID.fadeOut();//masquer la zone de saisie d'adresse mail
					saisieMDP_ID.fadeIn();//affiche la zone de saisie de mot de passe
					saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
					saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
					saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
					saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
					glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir
					seConnecter_ID.fadeOut();//masque le bouton de connection

					ajax_verificationAvatar(contenusaisi);

					function ajax_verificationAvatar(contenusaisi) {// afficher l'avatar de l'utilisateur, dans tous les endroits ou il est voulu
						$.ajax({
						method: "POST",
						url: "00_general/fonctionnement/TraitementVerificationAvatar.php",
						data: { contenusaisi: contenusaisi },
						})
						.done(function (retour2_html) {//affiche l'avatar

								cheminComplet= avatarDeb + retour2_html +avatarFin;

								avatarFenetreConnexion_class.attr("src", cheminComplet);
								avatarNotificationConnection_class.attr("src", cheminComplet);
								avatarNotificationConnection_class.css("height", '50px');

								$('#P2_avatar').attr("src", cheminComplet);
								$('#avatarDiscutionUtilisateur').attr("src", cheminComplet);
								$('#avatarDiscutionUtilisateur').attr("alt", pseudo);//saisiePseudo_ID.val()
								
					
						})
						.fail(function () {
						alert("error dans ajax_verificationAvatar");
						
						});
					};
					message1='Pseudo déjà enregistré';
					message2='indiquer votre mot de passe';  
				} 
				else { // dans cas contraire 
					
					saisiePseudo_ID.css('background-color', ''); //retirer la bordure verte de la zone de saisie
					saisiePseudo_ID.removeClass('existe');
					boolExistancePseudo=false;

					saisiePseudo_ID.fadeIn();
					saisieMail_ID.fadeIn();//masquer la zone de saisie d'adresse mail
					saisieMDP_ID.fadeOut();//masquer la zone de saisie d'adresse mail
					saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
					saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
					saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
					saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
					glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir
					seConnecter_ID.fadeOut();

					cheminComplet= avatarDeb + 'msn' +avatarFin

					avatarFenetreConnexion_class.attr("src", cheminComplet)
					avatarNotificationConnection_class.attr("src", cheminComplet);
					avatarNotificationConnection_class.css("height", '50px');

					$('#P2_avatar').attr("src", cheminComplet);
					$('#avatarDiscutionUtilisateur').attr("src", cheminComplet);

					message1='Pseudo non enregistré';
					message2='Créer un compte?';  
					
				}
			})
			.fail(function () {
				alert("error dans ajax_verificationExistance");//si le traitement retourne une erreur
			});
		};
		ajax_verificationExistance(etape, pseudo, contenuMDP);// Traitement AJAX de la saisie
	});

	soumettreMail_ID.on('click', function(){

		function verifierFormatEmail(chaine) {
			// Définition de l'expression régulière pour vérifier le format d'un email
			const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

			// Test de la chaîne avec l'expression régulière
			return regexEmail.test(chaine);
		}
		adressemail=$('#saisieMail').val();
		// Exemple d'utilisation
		var emailValide = verifierFormatEmail(adressemail);//console.log('mail : '+emailValide);

		if (emailValide==true) {

			saisiePseudo_ID.fadeIn();
			saisieMail_ID.fadeIn();//masquer la zone de saisie d'adresse mail
			saisieMDP_ID.fadeIn();//masquer la zone de saisie d'adresse mail
			saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
			saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
			saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
			saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
			glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir
			seConnecter_ID.fadeOut();

			message1='format de mail correct';
			message2='Créer un mot de passe';  
		} 
	});

	soumettreMDP_ID.on('click', function(){ 
		if (boolExistancePseudo==true) {//le pseudo est dans la BDD
			//console.log('MDPmarche');
			
			etape=2;// correspond a l'etape de verification de l'existance du pseudo dans la BDD
			pseudo=saisiePseudo_ID.val();//***verif
			contenuMDP=saisie_MDP_ID.val();//***verif=>etape MDP, sinon effacer contenu
			console.log(contenuMDP);


			

			function ajax_verificationExistanceMDP(etape, pseudo, contenuMDP) {
				$.ajax({
				method: "POST",
				url: "01_connexion/fonctionnement/TraitementVerification.php",
				data: { etape:etape, pseudo:pseudo, contenuMDP:contenuMDP},
				})
				.done(function (retour2_html) {
					if (retour2_html=="correct") {
						saisie_MDP_ID.css('background-color', 'green');
						saisieMDP_ID.addClass('correct');

						message1='Pseudo et mot de passe OK';
						message2='Vérifier la langue et le statut'; 

						saisiePseudo_ID.fadeIn();
						saisieMail_ID.fadeOut();//masquer la zone de saisie d'adresse mail
						saisieMDP_ID.fadeIn();//masquer la zone de saisie d'adresse mail
						saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
						saisiestatut_ID.fadeIn();//masquer le "statut" et le choix de la langue
						saisielangue_ID.fadeIn();//masquer le "statut" et le choix de la langue
						saisieGlypheSecurite_ID.fadeIn();//masquer l'ensemble de glyphes de securité'
						glypheAChoisir_ID.fadeIn();//masque l'indication de glyphe a Choisir
						seConnecter_ID.fadeOut();

					} 
					else {// Réinitialisez la bordure si le texte n'est pas "ok"
						saisie_MDP_ID.css('background-color', 'transparent'); 
						saisieMDP_ID.removeClass('existe');

						message1='Pseudo non pris';
						message2='creer un compte'; 

						seConnecter_ID.fadeOut();
					}
				})
				.fail(function () {
					alert("error dans ajax_verificationExistanceMDP");
				});
			};ajax_verificationExistanceMDP(etape, pseudo, contenuMDP);
			message1='Votre mot de passe est correct';
			message2='vous pouvez vous connecter';  
		} else{//le pseudo n'est pas dans la BDD

			saisiePseudo_ID.fadeIn();
			saisieMail_ID.fadeIn();//masquer la zone de saisie d'adresse mail
			saisieMDP_ID.fadeIn();//masquer la zone de saisie d'adresse mail
			saisieConfirmMDP_ID.fadeIn();//masque la zone de confirmation de mot de passe
			saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
			saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
			saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
			glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir
			seConnecter_ID.fadeOut();

			message1='mot de passe enregistré';
			message2='veuilez le confirmer';  
		}
	});	
// ----------------------------------------------------   CHOIX AUTOMATIQUE / MODIFICATION DE LA LANGUE UTILISE ==> ------------------------------------------------------------------------------- 
	 userLanguage = navigator.language || navigator.userLanguage; 
	 liste=document.getElementById('listDeroulLang');
	// CHOIX AUTOMATIQUE  
	for (let i = 0; i < liste.options.length; i++) {
		if (liste.options[i].value === userLanguage) {
		liste.options[i].setAttribute('selected','true');
			var ligneSelectione=i;
		break;
		}
	}
	// MODIFICATION  
	selectValue = liste.selectedIndex;
	$('#listDeroulLang').on('change',function() {
		selectValue = liste.selectedIndex;
		liste.options[ligneSelectione].removeAttribute('selected');
		liste.options[selectValue].setAttribute('selected','true');
		
	});
// ---------------------------------------------------- <== CHOIX AUTOMATIQUE / MODIFICATION DE LA LANGUE UTILISE -------------------------------------------------------------------------------
	$('#soumettreConfirmMDP').on('click', function(){

		if ($('#saisieMDP').val()===$('#saisieConfirmMDP').val()) {
			//console.log('ok');

			$('#P1_app__login-button').fadeOut();
			$('#blocSaisieStatut').fadeIn();//masquer le "statut" et le choix de la langue
			$('#blocSaisieLangue').fadeIn();//masquer le "statut" et le choix de la langue
			$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
			$('#GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir

			message1='mot de passe et confirmation identique';
			message2='vérifiez les rubriques suivantes';  

			}else{//console.log('nooooooo')

		$('#P1_app__login-button').fadeOut();
		message1='mot de passe et confirmation différentes';
		message2='vérifiez les informations';  
		}

	});
			function verifierSaisies(event) {
				var input = event.target;
				var value = input.value;
				var newValue = "";
				for (var i = 0; i < value.length; i++) {
					if (!(/[<>?:"'()\[\]{}/*`;$#,]/.test(value[i]))) {
						newValue += value[i];
					}
				}
				input.value = newValue;
			};
			function supprimerSaisies(){
				saisieMail_ID.val("");
				saisieConfirmMDP_ID.val("");

				saisiePseudo_ID.val(""); 
				saisiePseudo_ID.css('background-color', '');
				saisiePseudo_ID.removeClass('existe');

				saisie_MDP_ID.val("");
				saisie_MDP_ID.css('background-color', 'transparent'); 
				saisieMDP_ID.removeClass('existe');
			};
	$('#P1_avatarUtilisateur').on('click', function(){		
	});	//Jean</\
		
	$('#P1_app__login-button').on('click', function(){
		$('.ListeDesContacts').fadeIn();
		$('.P1_connexion_ASonCompte').fadeOut();
		$('#P1_app__login-button').fadeOut();

		$('#ProfilConnecte').text($('#saisiePseudo').val());

		PseudoExpediteur=$('#avatarDiscutionUtilisateur').attr('alt');
		PseudoDestinataire=$('#avatarDiscutionDestinataire').attr('alt');

		// Définition d'un cookie avec une durée de vie de 1 heure
		document.cookie = "langue_utilisateur=" + $('#listDeroulLang').attr('alt') + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";//Thu, 01 Jan 1970 00:00:00 UTC 
		document.cookie = "pseudo_utilisateur=" + $('#avatarDiscutionUtilisateur').attr('alt') + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
		document.cookie = "pseudo_destinataire=" + $('#avatarDiscutionDestinataire').attr('alt') + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";


		

		var contenusaisis = $('#saisiePseudo').val();//caractere(s) saisi

		if ($('#saisiePseudo').val()!="") { // des caracteres ont ete saisi dans l'input de Pseudo
			if (boolExistancePseudo==true) {//profil deja enregistre
				$('#saisiePseudo, #saisieMDP').on('input', verifierSaisies);//REGEX pour les saisies
				//AJAX pour reverifier
				etape=2;// correspond a l'etape de verification de l'existance du pseudo dans la BDD
				pseudo=saisiePseudo_ID.val();//***verif
				contenuMDP=saisie_MDP_ID.val();//***verif=>etape MDP, sinon effacer contenu
	
				function ajax_verificationExistanceMDP(etape, pseudo, contenuMDP) {
					$.ajax({
					method: "POST",
					url: "01_connexion/fonctionnement/TraitementVerification.php",
					data: { etape:etape, pseudo:pseudo, contenuMDP:contenuMDP},
					})
					.done(function (retour2_html) {
						if (retour2_html=="correct") {// apres reverification, il ny a pas eu de modifications, il est bien dans la BDD ==> mise a jour de la langue et du statut
							//console.log("reverifié => OK");

							etapeEnregistrement=1;
							enregistrementPseudo=$('#saisiePseudo').val();
							enregistrementMail=$('#saisieMail').val();
							enregistrementMDP=$('#saisieMDP').val();
							enregistrementLangue=$('#listDeroulLang').val();
							enregistrementStatut=$('#listDeroulStatut').val();

							function ajax_EnregistrerModifierUtilisateur(etapeEnregistrement, enregistrementPseudo, enregistrementMail, enregistrementMDP, enregistrementLangue, enregistrementStatut) {
								$.ajax({
								method: "POST",
								url: "01_connexion/fonctionnement/TraitementEnregistrement.php",
								data: { etapeEnregistrement:etapeEnregistrement, enregistrementPseudo:enregistrementPseudo, enregistrementMail:enregistrementMail, enregistrementMDP:enregistrementMDP, enregistrementLangue:enregistrementLangue, enregistrementStatut:enregistrementStatut},
								})
								.done(function (retourenregistrement_html) {
									//console.log(retourenregistrement_html);
								})
								.fail(function () {
									alert("error dans ajax_EnregistrerModifierUtilisateur");
								});
							};
		
							ajax_EnregistrerModifierUtilisateur(etapeEnregistrement, enregistrementPseudo, enregistrementMail, enregistrementMDP,enregistrementLangue,  enregistrementStatut);
						}else{// saisie forcé ou modification apres validation de la saisie
							supprimerSaisies();
							alert("un souci est arrivé, veuillez resaisir vos données");
							//remettre toutes les zones de saisie a leurs valeurs initiales;
							return;
						}
					})
					.fail(function () {
						alert("error dans ajax_verificationExistanceMDP");
					});
				};
				ajax_verificationExistanceMDP(etape, pseudo, contenuMDP);	

			}else{
				if ($('#saisieMail').val()!="" && $('#saisieMDP').val()!="" && $('#saisieMDP').val()===$('#saisieConfirmMDP').val()) {//nouvel utilisateur
					$('#saisiePseudo, #saisieMail, #saisieMDP').on('input', verifierSaisies);
					// ==> enregistrement dans la BDD, puis étape suivante

				}
				else{
					// ==> supprimer les eventuelles saisies, forcees ou non, puis connexion en annonyme
					supprimerSaisies(); console.log('num1');
					 min = 1000;
					 max = 999999999;
					
					 randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
					
					$('#ProfilConnecte').text("annonyme " + randomNumber);
					$('#humeurProfil').text("");

				}
			}
		}else{// connexion en annonyme
			// supprimer les eventuelles saisies, forcees ou non
			supprimerSaisies();
			 min = 1000;
			 max = 999999999;
			
			 randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
			
			$('#ProfilConnecte').text("annonyme " + randomNumber);console.log("annonyme" + randomNumber);
			$('#humeurProfil').text("");

			$('.ListeDesContacts').fadeOut();
			$('.Discution').fadeIn();
	
		}





		/*
		ajax_verificationHumeur(contenusaisis);
		ajax_verificationStatus(contenusaisis);

		function ajax_verificationHumeur(contenusaisis) {
			$.ajax({
				method: "POST",
				url: "TraitementHumeur.php",
				data: { contenusaisis:contenusaisis},
			})
			.done(function (retourhumeur_html) {
				//$('#messageInfoConnexion').html(retour1_html);
				//console.log('statut : ' + retourhumeur_html);
				$('#P2_message').text(retourhumeur_html);
			})
			.fail(function () {
				alert("error dans ajax_verificationHumeur");//si le traitement retourne une erreur
			});
		};

		function ajax_verificationStatus(contenusaisis) {
			$.ajax({
				method: "POST",
				url: "TraitementStatut.php",
				data: { contenusaisis:contenusaisis},
			})
			.done(function (retourStatut_html) {
				//$('#messageInfoConnexion').html(retour1_html);
				//console.log('humeur : '+ retourStatut_html);
				$('#P2_status').text(retourStatut_html);

			})
			.fail(function () {
				alert("error dans ajax_verificationHumeur");//si le traitement retourne une erreur
			});
		};*/

		const logSaisieLangue=$('#listDeroulLang').val();//console.log(logSaisieLangue); 
		const logSaisieStatut=$('#listDeroulStatut').val();//console.log(logSaisieLangue);

		etapeEnregistrement=3;
		enregistrementPseudo=contenusaisis;
		enregistrementMail="";
		enregistrementMDP="";
		enregistrementLangue=logSaisieLangue;
		enregistrementStatut=logSaisieLangue;
		
				

		ajax_connexionUtilisateurDejaEnregistre(etapeEnregistrement, enregistrementPseudo, enregistrementMail, enregistrementMDP, enregistrementLangue, enregistrementStatut);

		function ajax_connexionUtilisateurDejaEnregistre(etapeEnregistrement, enregistrementPseudo, enregistrementMail, enregistrementMDP, enregistrementLangue, enregistrementStatut) {
		$.ajax({
			method: "POST",
			url: "01_connexion/fonctionnement/TraitementEnregistrement.php",
			data: { etapeEnregistrement: etapeEnregistrement, enregistrementPseudo: enregistrementPseudo, enregistrementMail:enregistrementMail, enregistrementMDP:enregistrementMDP, enregistrementLangue:enregistrementLangue, enregistrementStatut:enregistrementStatut },
		})
		.done(function (retour3_html) {
			console.log(retour3_html);
		})
		.fail(function () {
			alert("error dans ajax_connexionUtilisateurDejaEnregistre");
		});
		};



		if ($('#saisiePseudo').hasClass('existe')) {
			//console.log("ok");PseudoConnu = "oui";
		}else{
			//console.log("pas ok");PseudoConnu = "non";
		}
		if ($('#saisieMDP').hasClass('correct')) {
			//console.log("ok");MDPCorrect = "oui";
		}else{
			//console.log("pas ok");MDPCorrect = "non";
		}
		if ($('#bocDeGlypsDeSecurite').hasClass('correct')) {
			//console.log("ok");glypheCorrect = "oui";
		}else{
			//console.log("pas ok");glypheCorrect = "non";
		}



		saisiePseudo = $('#saisiePseudo').val();
		saisieMail = $('#saisieMail').val();
		saisieMDP = $('#saisieMDP').val();
		saisieStatut = $('#listDeroulStatut').val();
		saisieLangue = $('#listDeroulLang').val();

	});

	$('.iconeSecu').on('click', function() { //simili CAPTCHA

		iconeAttendue=$('#glyphASelectione').text();// icone attendue
		iconeClicque=$(this).attr('value'); // icone selectione
		classAVise='#iconeSecu'+iconeClicque;
		cliqueDivers='#iconeautre';

		// Déclaration et initialisation d'un tableau avec des valeurs
		var resultats2 = ["reveil", "bouteille", "classeur", "telephone", "telecomande", "calculatrice", "gomme"];

		if ($.inArray(iconeAttendue, resultats2) !== -1  && $(this).attr('value') === 'autre') {
			message1 = 'Tout a été vérifié et est correct';
			message2 = 'Vous pouvez vous connecter';

			$('#iconeSecu').css('background-color', 'green');
			$('#iconeautre').css('scale', '2');
			$('#bocDeGlypsDeSecurite').attr('class','correct');
			$('#P1_app__login-button').fadeIn();

		} else if (iconeAttendue === iconeClicque) { // Vérifier si l'icône cliquée est égale à l'icône attendue
			message1 = 'Tout a été vérifié et est correct';
			message2 = 'Vous pouvez vous connecter';

			$(classAVise).css('background-color', 'green');
			$('#bocDeGlypsDeSecurite').attr('class','correct');
			$('#P1_app__login-button').fadeIn();

		} else {
			message1 = 'Reverifiez vos informations';
			message2 = 'Des erreurs ont été détectées';

			$(classAVise).css('background-color', 'red');
			$('#bocDeGlypsDeSecurite').attr('class','incorrect');
			$('#P1_app__login-button').fadeOut();
		}

	});

	
	$('#quitter').on('click',function() { // si l'utilisateur clique sur le bouton "quitter" ==> RECHARGER LA PAGE POUR REMETTRE TOUTES LES VALEURS A LEURS VALEURS INITIALES
		location.reload(true);
		$('.Discution').fadeOut();
		$('#P0_logoDeDemarage').fadeIn();
	});

	document.getElementById("checkMail").addEventListener("click", function() {
		if (this.checked) {
		  utilisateurPseudo=saisiePseudo_ID.val();
			// Obtenir la date et l'heure actuelle
			var dateActuelle = new Date();

			// Obtenir l'heure locale de l'utilisateur
			var heureLocale = dateActuelle.toLocaleTimeString();
			var dateLocale = dateActuelle.toLocaleDateString();		  
		  ajax_verificationAvatardestinataire(utilisateurPseudo);
		  function ajax_verificationAvatardestinataire(utilisateurPseudo) {
			  $.ajax({
			  method: "POST",
			  url: "../../01_connexion/dynamique/envoiDuMail.php",
			  data: { utilisateurPseudo: utilisateurPseudo },
			  })
			  .done(function (retour2_html) {
				console.log(retour2_html);
	  
			  })
			  .fail(function () {
			  alert("error dans ajax_verificationAvatardestinataire");
			  
			  });
			};
		}
	  });
	  

	  





// ---------------------------------------------------- AlTERNER ENTRE 2 MESSAGES ==> ------------------------------------------------------------------------------- 
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

