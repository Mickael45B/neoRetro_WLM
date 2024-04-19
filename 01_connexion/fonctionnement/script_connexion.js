//PARTIE 00
	bloc_logoDeDemarage=$('#P0_logoDeDemarage');
	logoDemarage_ID= $('#P0_logoDeDemarageButton');

//PARTIE01
	//GENERAL 
	bloc_connexion_CLASS=$('.P1_connexion_ASonCompte');
		bloc_connexion=$('#P1_CadreExterieur');
	//EN-TETE

	//AVATAR
		avatarFenetreConnexion_class=$('.P1_app__profile--image');

	//ZONES DE SAISIE
		//-- GENERAL --
			generalZonesDeSaisie=$('.zoneDeSaisie');
		//PSEUDO
			saisiePseudo_ID=$('#saisiePseudo');
			soumettrePseudo_ID= $('#soumettrePseudo');

		//MAIL
			saisieMail_ID= $('#blocSaisieMail');
			zoneSaisieMail_ID= $('#saisieMail');
			soumettreMail_ID=$('#soumettreMail');

		//MDP
			saisieMDP_ID= $('#blocSaisieMDP');
			saisie_MDP_ID= $('#saisieMDP');
			soumettreMDP_ID=$('#soumettreMDP');

		//CONFIRM. MDP
			saisieConfirmMDP_ID= $('#blocSaisieConfirmMDP');
			saisie_ConfirmMDP_ID= $('#saisieConfirmMDP');
			soumettreConfirmMDP_ID= $('#soumxettreConfirmMDP');

		//STATUT
			saisiestatut_ID= $('#blocSaisieStatut');

		//LANGUE
			saisielangue_ID= $('#blocSaisieLangue');
			listeLangue_ID= $('#listDeroulLang');

		//TEXTE GLYPHE DE SECU
			glypheAChoisir_ID= $('#GlyphAChoisir');
			nomGlypheAChoisir_ID= $('#glyphASelectione');





			SeSouvenirMoi_ID= $('#bloccheckRemember');
			BlocMDP_Perdu_ID= $('#bloccheckMDP_Perdu');
			blocCGU_ID= $('#conditionGeneralU');

		//GLYPHE DE SECU
			saisieGlypheSecurite_ID= $('#bocDeGlypsDeSecurite');
			listeGlypheSecurite_CLASS= $('.iconeSecu');


		//RESTER CONNECTE

		//MDP PERDU
			BTNradio_MDPoublie_ID= $('#checkMail');
			codeDeValidationRenouvelement_ID= $('#codeValidation');

		//MESSAGE CONTEXTUEL

		//BOUTTON VALIDATION
			seConnecter_ID= $('#P1_app__login-button');

	//NOTIFICATION
		signInNotification = $('.P1_app__notification');
		avatarNotificationConnection_class=$('.P1_app__notification__user--photo');



//NOTIF
bouttonFermerNotif=$('.P1_app__notification__close');
pseudoDansNotif=$('.P1_notification-username');
pseudo_Dans_Notif=$('#saisiePseudo');


//PARTIE 2
//insererPageEnDynamique=$('#page2');
ensemble_PARTIE2=$('.ListeDesContacts');
nomUtilisateurConnecte=$('#ProfilConnecte');
humeurConnecte=$('#humeurProfil');



//PARTIE 3

avatarUtilisateur=$('#avatarDiscutionUtilisateur');
avatarDestinataire=$('#avatarDiscutionDestinataire');







boolExistancePseudo=false;

avatarDeb = "00_general/avatars/";
avatarFin = ".png";
longeurMiniPseudo =3;
longeurMiniMDP=6;



//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//fade
	logoDemarage_ID.on('click',function() {//Lors du click sur le logo

		bloc_logoDeDemarage.fadeOut();// masque le logo
		bloc_connexion.fadeIn();// affiche la fenetre de connexion

		saisiePseudo_ID.fadeIn();
		saisieMail_ID.fadeOut();//masquer la zone de saisie d'adresse mail
		saisieMDP_ID.fadeOut();//masquer la zone de saisie d'adresse mail
		saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
		saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
		saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
		saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
		glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir
		seConnecter_ID.fadeIn();
		blocCGU_ID.fadeOut();
		SeSouvenirMoi_ID.fadeOut();
		BlocMDP_Perdu_ID.fadeOut();
		ensemble_PARTIE2.fadeOut();



	});
		message1='vous pouvez vous connecter en anonyme';
		message2='en cliquant sur le bouton';  

	soumettrePseudo_ID.on('click', function(){// Lors du click de validation de la saisie du pseudo
		saisiePseudo_ID.fadeIn();// laisser afficher la saisie de pseudo
		saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
		saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
		saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
		saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
		glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir
		seConnecter_ID.fadeOut();//masque le bouton de connection
		

	});


	soumettreMail_ID.on('click', function(){

		adressemail=$('#saisieMail').val();
		// Exemple d'utilisation
		var emailValide = verifierFormatEmail(adressemail);

		if (emailValide===true) {

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
		else{
			saisieMDP_ID.fadeOut();
		}
	});

	

//condition
	generalZonesDeSaisie.on("input", function(event) {// ETAPE DE SECURISATION : exclusion de certains caracteres pour eviter l'injection de code
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

	soumettreConfirmMDP_ID.on('click', function(){

		if (saisie_MDP_ID.val()===saisie_ConfirmMDP_ID.val()) {

			seConnecter_ID.fadeOut();
			saisiestatut_ID.fadeIn();//masquer le "statut" et le choix de la langue
			saisielangue_ID.fadeIn();//masquer le "statut" et le choix de la langue
			saisieGlypheSecurite_ID.fadeIn();//masquer l'ensemble de glyphes de securité'
			glypheAChoisir_ID.fadeIn();//masque l'indication de glyphe a Choisir

			message1='mot de passe et confirmation identique';
			message2='vérifiez les rubriques suivantes';  

		}else{

		seConnecter_ID.fadeOut();
		message1='mot de passe et confirmation différentes';
		message2='vérifiez les informations';  
		}

	});

	listeGlypheSecurite_CLASS.on('click', function() { //simili CAPTCHA

		iconeAttendue=nomGlypheAChoisir_ID.attr("value");// icone attendue
		iconeClicque=$(this).attr('value'); // icone selectione
		classAVise='#iconeSecu'+iconeClicque;

		// Déclaration et initialisation d'un tableau avec des valeurs
		var resultats2 = ["reveil", "bouteille", "classeur", "telephone", "telecomande", "calculatrice", "gomme"];

		//traitement visuel, en reponse au clic d l'utilisateur sur l'icone de securite
		if ($.inArray(iconeAttendue, resultats2) !== -1  && $(this).attr('value') === 'autre' || iconeAttendue === iconeClicque ) {
			message1 = 'Tout a été vérifié et est correct';
			message2 = 'Vous pouvez vous connecter';

			$(classAVise).css('background-color', 'green');
			$(classAVise).css('scale', '1.5');
			saisieGlypheSecurite_ID.addClass('correct');
			seConnecter_ID.fadeIn();

		}  else {
			message1 = 'Reverifiez vos informations';
			message2 = 'Des erreurs ont été détectées';

			$(classAVise).css('background-color', 'red');
			saisieGlypheSecurite_ID.addClass('incorrect');
			seConnecter_ID.fadeOut();
		}

	});



//AJAX




soumettrePseudo_ID.on('click', function(){// Lors du click de validation de la saisie du pseudo

    etape=1;
    pseudo=saisiePseudo_ID.val();
    contenuMDP="";
    var contenusaisi = saisiePseudo_ID.val();//caractere(s) saisi

    ajax_verificationExistance(etape, pseudo, contenuMDP,contenusaisi);// Traitement AJAX de la saisie (verifier l'existance et afficher l'avatar correct)
});

	soumettreMDP_ID.on('click', function(){//OK 
		if (boolExistancePseudo==true) {//le pseudo est dans la BDD
			
			
			etape=2;// correspond a l'etape de verification de l'existance du pseudo dans la BDD
			pseudo=saisiePseudo_ID.val();//***verif
			contenuMDP=saisie_MDP_ID.val();//***verif=>etape MDP, sinon effacer contenu
			blocCGU_ID.fadeIn();	
			SeSouvenirMoi_ID.fadeIn();	

			ajax_verificationExistanceMDP(etape, pseudo, contenuMDP);

			message1='Votre mot de passe est correct';
			message2='vous pouvez vous connecter';  
		} else{//le pseudo n'est pas dans la BDD

			saisieMail_ID.fadeIn();//masquer la zone de saisie d'adresse mail
			saisieConfirmMDP_ID.fadeIn();//masque la zone de confirmation de mot de passe
			saisiestatut_ID.fadeOut();//masquer le "statut" et le choix de la langue
			saisielangue_ID.fadeOut();//masquer le "statut" et le choix de la langue
			saisieGlypheSecurite_ID.fadeOut();//masquer l'ensemble de glyphes de securité'
			glypheAChoisir_ID.fadeOut();//masque l'indication de glyphe a Choisir

			message1='mot de passe enregistré';
			message2='veuilez le confirmer';  
		}
	});	

	BTNradio_MDPoublie_ID.on("click", function() {
		if (this.checked) {
		  utilisateurPseudo=saisiePseudo_ID.val();
			// Obtenir la date et l'heure actuelle
			var dateActuelle = new Date();

			// Obtenir l'heure locale de l'utilisateur
			dateActuellePlusUn=dateActuelle.setHours(dateActuelle.getHours() + 1);
		
			var heureLocale = dateActuelle.toLocaleTimeString();
			var dateLocale = dateActuelle.toLocaleDateString();

		  ajax_verificationAvatardestinataire(utilisateurPseudo,heureLocale,dateLocale,dateActuellePlusUn);
		  function ajax_verificationAvatardestinataire(utilisateurPseudo,heureLocale,dateLocale,dateActuellePlusUn) {
			  $.ajax({
			  method: "POST",
			  url: "../../01_connexion/dynamique/envoiDuMail.php",
			  data: { utilisateurPseudo: utilisateurPseudo, heureLocale:heureLocale,dateLocale:dateLocale, dateActuellePlusUn:dateActuellePlusUn },
			  })
			  .done(function (retour2_html) {
				
				$(codeDeValidationRenouvelement_ID).text(retour2_html);
	  
			  })
			  .fail(function () {
			  alert("error dans ajax_verificationAvatardestinataire");
			  
			  });
			};
		}
	  });


	seConnecter_ID.on('click', function(){
		ensemble_PARTIE2.fadeIn();
		bloc_connexion_CLASS.fadeOut();
		seConnecter_ID.fadeOut();

		nomUtilisateurConnecte.text(saisiePseudo_ID.val());

		PseudoExpediteur=avatarUtilisateur.attr('alt');
		PseudoDestinataire=avatarDestinataire.attr('alt');

		// Définition d'un cookie avec une durée de vie de 1 heure
		//document.cookie = "langue_utilisateur=" + listeLangue_ID.val() + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
		//document.cookie = "pseudo_utilisateur=" + PseudoExpediteur + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
		//document.cookie = "pseudo_destinataire=" + PseudoDestinataire + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";


		

		var contenusaisis = saisiePseudo_ID.val();//caractere(s) saisi

		if (saisiePseudo_ID.val()!="") { // des caracteres ont ete saisi dans l'input de Pseudo
			if (boolExistancePseudo==true) {//profil deja enregistre

				saisiePseudo_ID.on('input', verifierSaisies);//"REGEX" pour les saisies
				saisie_MDP_ID.on('input', verifierSaisies);//"REGEX" pour les saisies

				//AJAX pour reverifier
				etape=2;// correspond a l'etape de verification de l'existance du pseudo dans la BDD
				pseudo=saisiePseudo_ID.val();//***verif
				contenuMDP=saisie_MDP_ID.val();//***verif=>etape MDP, sinon effacer contenu

				function ajax_verificationExistanceMDP(etape, pseudo, contenuMDP) {
					
					$.ajax({
					method: "POST",
					url: "01_connexion/fonctionnement/TraitementVerification.php",
					data: { etape:etape, pseudo:pseudo, contenuMDP:contenuMDP}
					})
					.done(function (retour2_html) {
						if (retour2_html=="correct") {// apres reverification, il ny a pas eu de modifications, et il est bien dans la BDD

							function ajax_verificationAutaurisation(etape, pseudo, contenuMDP) {//niveau autorisation
								etape=5;
								pseudo=saisiePseudo_ID.val();
								contenuMDP=saisie_MDP_ID.val();

								$.ajax({
								method: "POST",
								url: "01_connexion/fonctionnement/TraitementVerification.php",
								data: { etape:etape, pseudo:pseudo, contenuMDP:contenuMDP}
								})
								.done(function (retourenrAutorisation_html) {// affichage de la page 2 en fonction du niveau d'autorisation
									$('.ListeDesContacts').fadeIn(); console.log(retourenrAutorisation_html);

									var resultats = retourenrAutorisation_html;
									retourenrAutorisation = resultats['NivAutorisation'];

									pseudoUtilisateur = resultats['Pseudo'];

									HumeurUtilisateur = resultats['Humeur'];


									$('#ProfilConnecte').text(pseudoUtilisateur);
									$('#humeurProfil').append(HumeurUtilisateur);

									if (retourenrAutorisation==1) {// niveau 1 d'autorisation = Administrateur
										$('#laPage2').load('02_listedeconnectes/admin.php');
										
									}else if (retourenrAutorisation==2){//  niveau 2 d'autorisation = Moderateur
										$('#laPage2').load('02_listedeconnectes/modo.php');
										
									}else  if (retourenrAutorisation==3){//  niveau 3 d'autorisation = Utilisateur enregistre
										$('#laPage2').load('02_listedeconnectes/utilisateur.php');
									}else{ // sinon l'utilisateur se connecte en anonyme
										$('#laPage2').load('02_listedeconnectes/utilisateur.php');
									}
								})
								.fail(function () {
									alert("error dans ajax_verificationAutaurisation");
								});
							};
							ajax_verificationAutaurisation(etape, pseudo, contenuMDP);

/*

							function ajax_requeteContact(pseudo) {// afficher les requetes de contact
					
								$.ajax({
								method: "POST",
								url: "01_connexion/fonctionnement/requeteContact.php",
								data: {pseudo:pseudo}
								})
								.done(function (retour2_html) {
			
								})
								.fail(function () {
									alert("error dans ajax_verificationExistanceMDP");
								});
							};
							ajax_requeteContact(pseudo)
							
							function ajax_demandeContact(pseudo) {//afficher les demande de contact
					
								$.ajax({
								method: "POST",
								url: "01_connexion/fonctionnement/demandeContact.php",
								data: {pseudo:pseudoP}
								})
								.done(function (retour2_html) {
			
								})
								.fail(function () {
									alert("error dans ajax_verificationExistanceMDP");
								});
							};
							ajax_demandeContact(pseudo)
			*/				

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
				if (zoneSaisieMail_ID.val()!="" && saisie_MDP_ID.val()!="" && saisie_MDP_ID.val()===saisie_ConfirmMDP_ID.val()) {//nouvel utilisateur
					saisiePseudo_ID.on('input', verifierSaisies);
					zoneSaisieMail_ID.on('input', verifierSaisies);
					saisie_MDP_ID.on('input', verifierSaisies);
					saisie_ConfirmMDP_ID.on('input', verifierSaisies);
					// ==> enregistrement dans la BDD, puis étape suivante

				}
				else{
					// ==> supprimer les eventuelles saisies, forcees ou non, puis connexion en annonyme
					supprimerSaisies(); 
					 min = 1000;
					 max = 999999999;
					
					 randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
					
					 nomUtilisateurConnecte.text("annonyme " + randomNumber);
					 humeurConnecte.text("");

				}
			}
		}else{// connexion en annonyme
			// supprimer les eventuelles saisies, forcees ou non
			supprimerSaisies();
			 min = 1000;
			 max = 999999999;
			
			 randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
			
			 nomUtilisateurConnecte.text("annonyme " + randomNumber);
			 humeurConnecte.text("");

			$('.ListeDesContacts').fadeOut();
			$('.Discution').fadeIn();
	
		}

		const logSaisieLangue=$('#listDeroulLang').val();
		const logSaisieStatut=$('#listDeroulStatut').val();

		etapeEnregistrement=3;
		enregistrementPseudo=contenusaisis;
		enregistrementMail="";
		enregistrementMDP="";
		enregistrementLangue=logSaisieLangue;
		enregistrementStatut=logSaisieStatut;

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
	});

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	//clic PSEUDO
	function ajax_verificationExistance(etape, pseudo, contenuMDP, contenusaisi) {//verifier l'existance du pseudo
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
				
				saisieMail_ID.fadeOut();//masquer la zone de saisie d'adresse mail
				saisieMDP_ID.fadeIn();//affiche la zone de saisie de mot de passe
				BlocMDP_Perdu_ID.fadeIn();	

				ajax_verificationAvatar(contenusaisi);
	
				message1='Pseudo déjà enregistré';
				message2='indiquer votre mot de passe'; 
	
	
			} 
			else { // dans cas contraire 
				
				saisiePseudo_ID.css('background-color', ''); //retirer la bordure verte de la zone de saisie
				saisiePseudo_ID.removeClass('existe');
				boolExistancePseudo=false;
	
				saisieMail_ID.fadeIn();//masquer la zone de saisie d'adresse mail
				saisieMDP_ID.fadeOut();//masquer la zone de saisie d'adresse mail
	
				cheminComplet= avatarDeb + 'msn' +avatarFin;
				cheminComplet2= "../"+avatarDeb + 'msn' +avatarFin;
	
				avatarFenetreConnexion_class.attr("src", cheminComplet)
				avatarNotificationConnection_class.attr("src", cheminComplet);
				avatarNotificationConnection_class.css("height", '50px');
	
				$('#P2_avatar').attr("src", cheminComplet2);
				$('#avatarDiscutionUtilisateur').attr("src", cheminComplet2);
	
				message1='Pseudo non enregistré';
				message2='Créer un compte?';  
				
			}
		})
		.fail(function () {
			alert("error dans ajax_verificationExistance");//si le traitement retourne une erreur
		});
	};

	function ajax_verificationAvatar(contenusaisi) {// afficher l'avatar de l'utilisateur (enregistré dans la BDD), dans tous les endroits ou il est voulu
		$.ajax({
		method: "POST",
		url: "00_general/fonctionnement/TraitementVerificationAvatar.php",
		data: { contenusaisi: contenusaisi },
		})
		.done(function (retour2_html) {//affiche l'avatar
				cheminComplet= avatarDeb + retour2_html +avatarFin;
			
				avatarFenetreConnexion_class.attr("src", cheminComplet);
				$('#P2_avatar').attr("src", cheminComplet);
				$('.P1_app__notification__user--photo').css("height", '50px');
	
				$('.P1_app__notification__user--photo').attr("src", cheminComplet);
				$('#avatarDiscutionUtilisateur').attr("src", cheminComplet);
				$('#avatarDiscutionUtilisateur').attr("alt", pseudo);//saisiePseudo_ID.val()
				
	
		})
		.fail(function () {
		alert("error dans ajax_verificationAvatar");
		
		});
	};
//--------------	



function verifierFormatEmail(chaine) {
	// Définition de l'expression régulière pour vérifier le format d'un email
	const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	// Test de la chaîne avec l'expression régulière
	return regexEmail.test(chaine);
};

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

			saisieMail_ID.fadeOut();//masquer la zone de saisie d'adresse mail
			saisieConfirmMDP_ID.fadeOut();//masque la zone de confirmation de mot de passe
			saisiestatut_ID.fadeIn();//masquer le "statut" et le choix de la langue
			saisielangue_ID.fadeIn();//masquer le "statut" et le choix de la langue
			saisieGlypheSecurite_ID.fadeIn();//masquer l'ensemble de glyphes de securité'
			glypheAChoisir_ID.fadeIn();//masque l'indication de glyphe a Choisir

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
};

function verifierSaisies(event) {
	var input = event.target;
	var value = input.value;
	var newValue = "";
	for (var i = 0; i < value.length; i++) {
		if (!(/[<>?:"'()\[\]«{}/»*`;$#,]/.test(value[i]))) {
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

	  
// ------------------------------------------ APPARITION / DISPARITION DE LA NOTIFICATION DE CONNECTION ==> --------------------------------------------------------------------------


$('#P1_app__login-button').on("click", function() {
	
	$('#P1_app__notification').css("display", "block");
	var userNameValue = $('#saisiePseudo').val() || 'anonyme';
	$('.P1_notification-username').html(userNameValue);
	setTimeout(closeNotification, 4000);
});

function closeNotification() {
	$('#P1_app__notification').css("display", "none");
}

$('.P1_app__notification__close').on("click", closeNotification);

// ------------------------------------------ <== APPARITION / DISPARITION DE LA NOTIFICATION DE CONNECTION  --------------------------------------------------------------------------

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

