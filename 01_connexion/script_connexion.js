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


	//----- VARIABLES MODIFIABLES ==>

	longeurMiniPseudo =3;
	longeurMiniMDP=6;

//----- <== VARIABLES MODIFIABLES 

//let ligneSelectione;


$('#P0_logoDeDemarageButton').on('click',function() {//LORS DU CLICK SUR LE LOGO  

	$('#P0_logoDeDemarage').fadeOut();// masque le logo
	$('.P0_connexion_ASonCompte').fadeIn();// affiche la fenetre de connexion

	$('#saisiePseudo').fadeIn();
	$('#blocSaisieMail').fadeOut();//masquer la zone de saisie d'adresse mail
	$('#blocSaisieMDP').fadeOut();//masquer la zone de saisie d'adresse mail
	$('#blocSaisieConfirmMDP').fadeOut();//masque la zone de confirmation de mot de passe
	$('#blocSaisieStatut').fadeOut();//masquer le "statut" et le choix de la langue
	$('#blocSaisieLangue').fadeOut();//masquer le "statut" et le choix de la langue
	$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
	$('#GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
	$('#P1_app__login-button').fadeIn();

});
	message1='vous pouvez vous connecter en anonyme';
	message2='en cliquant sur le bouton';  


$('#soumettrePseudo').on('click', function(){

	//console.log($('#saisiePseudo').val());
	
	var contenusaisi = $('#saisiePseudo').val();//caractere(s) saisi
		//console.log(contenusaisi);
		// Traitement AJAX de la saisie
	ajax_verificationExistance(contenusaisi);

	function ajax_verificationExistance(contenusaisi) {
	$.ajax({
		method: "POST",
		url: "TraitementVerificationPseudo.php",
		data: { contenusaisi:contenusaisi},
	})
	.done(function (retourPseudo_html) {
		//$('#messageInfoConnexion').html(retour1_html);
			const avatarDeb = "00_general/avatars/";
			const avatarFin = ".png";
		

		if(retourPseudo_html=="existe"){//si la "class" retourné apres traitement AJAX est "corect"
			
			boolExistancePseudo=true;

			$('#saisiePseudo').css('background-color', 'green');// entoure la zone de saisie de vert
			$('#saisiePseudo').addClass('existe');
			
			$('#saisiePseudo').fadeIn();
			$('#blocSaisieMail').fadeOut();//masquer la zone de saisie d'adresse mail
			$('#blocSaisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
			$('#blocSaisieConfirmMDP').fadeOut();//masque la zone de confirmation de mot de passe
			$('#blocSaisieStatut').fadeOut();//masquer le "statut" et le choix de la langue
			$('#blocSaisieLangue').fadeOut();//masquer le "statut" et le choix de la langue
			$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
			$('#GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
			$('#P1_app__login-button').fadeOut();

			ajax_verificationAvatar(contenusaisi);

			function ajax_verificationAvatar(contenusaisi) {
				$.ajax({
				method: "POST",
				url: "TraitementVerificationAvatar.php",
				data: { contenusaisi: contenusaisi },
				})
				.done(function (retour2_html) {

					//if ($('#saisiePseudo').hasClass('existe')) {
						cheminComplet= avatarDeb + retour2_html +avatarFin
						$('.P1_app__profile--image').attr("src", cheminComplet);
						$('.P1_app__notification__user--photo').attr("src", cheminComplet);
						$('.P1_app__notification__user--photo').css("height", '50px');

						$('#avatarDiscutionExpediteur').attr("src", cheminComplet);
						$('#P2_avatar').attr("src", cheminComplet);


					//}
					/*else{
						cheminComplet= avatarDeb + 'msn' +avatarFin
						$('.P1_app__profile--image').attr("src", cheminComplet)
					}*/
			
				})
				.fail(function () {
				alert("error dans ajax_verificationAvatar");
				
				});
			};
			message1='Pseudo déjà enregistré';
			message2='indiquer votre mot de passe';  
				} 
		else { // dans cas contraire 
			
			$('#saisiePseudo').css('background-color', ''); //retirer la bordure verte de la zone de saisie
			$('#saisiePseudo').removeClass('existe');boolExistancePseudo=false;

			$('#saisiePseudo').fadeIn();
			$('#blocSaisieMail').fadeIn();//masquer la zone de saisie d'adresse mail
			$('#blocSaisieMDP').fadeOut();//masquer la zone de saisie d'adresse mail
			$('#blocSaisieConfirmMDP').fadeOut();//masque la zone de confirmation de mot de passe
			$('#blocSaisieStatut').fadeOut();//masquer le "statut" et le choix de la langue
			$('#blocSaisieLangue').fadeOut();//masquer le "statut" et le choix de la langue
			$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
			$('#GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
			$('#P1_app__login-button').fadeOut();

			cheminComplet= avatarDeb + 'msn' +avatarFin
			$('.P1_app__profile--image').attr("src", cheminComplet)
			message1='Pseudo non enregistré';
			message2='Créer un compte?';  

		}
	})
	.fail(function () {
		alert("error dans ajax_verificationExistance");//si le traitement retourne une erreur
	});

	};
});

$('#soumettreMail').on('click', function(){

	function verifierFormatEmail(chaine) {
		// Définition de l'expression régulière pour vérifier le format d'un email
		const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		// Test de la chaîne avec l'expression régulière
		return regexEmail.test(chaine);
	}
	adressemail=$('#saisieMail').val();
	// Exemple d'utilisation
	var emailValide = verifierFormatEmail(adressemail);////console.log('mail : '+emailValide);

	if (emailValide==true) {

		$('#saisiePseudo').fadeIn();
		$('#blocSaisieMail').fadeIn();//masquer la zone de saisie d'adresse mail
		$('#blocSaisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
		$('#blocSaisieConfirmMDP').fadeOut();//masque la zone de confirmation de mot de passe
		$('#blocSaisieStatut').fadeOut();//masquer le "statut" et le choix de la langue
		$('#blocSaisieLangue').fadeOut();//masquer le "statut" et le choix de la langue
		$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
		$('#GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
		$('#P1_app__login-button').fadeOut();
		message1='format de mail correct';
		message2='Créer un mot de passe?';  
}

});

$('#soumettreMDP').on('click', function(){

if (boolExistancePseudo==true) {
	//console.log('marche');
	
	//console.log($('#saisieMDP').val());

	contenusaisiPseudo = $('#saisiePseudo').val();//saisie du pseudo

	contenusaisiMDP = $('#saisieMDP').val();// saisie du Mot de Passe


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
			$('.P1_app__login--pass').css('background-color', 'green');
			//$('#P1_app__login-button').text('Entrer');
			$('#saisieMDP').addClass('correct');
			message1='Pseudo et mot de passe OK';
			message2='Vérifier la langue et le statut'; 


			$('#saisiePseudo').fadeIn();
			$('#blocSaisieMail').fadeOut();//masquer la zone de saisie d'adresse mail
			$('#blocSaisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
			$('#blocSaisieConfirmMDP').fadeOut();//masque la zone de confirmation de mot de passe
			$('#blocSaisieStatut').fadeIn();//masquer le "statut" et le choix de la langue
			$('#blocSaisieLangue').fadeIn();//masquer le "statut" et le choix de la langue
			$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
			$('#GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir
			$('#P1_app__login-button').fadeOut();
					
		} 
		else {
			// Réinitialisez la bordure si le texte n'est pas "ok"
			$('.P1_app__login--pass').css('background-color', 'transparent'); 
			message1='Pseudo non pris';
			message2='creer un compte'; 
			$('#saisieMDP').removeClass('existe');

			$('#P1_app__login-button').fadeOut();
			
		}
		})
		.fail(function () {
		alert("error dans ajax_verificationExistance");
		
		});
	};
	message1='Votre mot de passe est correct';
	message2='vous pouvez vous connecter';  
} else{


	$('#saisiePseudo').fadeIn();
	$('#blocSaisieMail').fadeIn();//masquer la zone de saisie d'adresse mail
	$('#blocSaisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
	$('#blocSaisieConfirmMDP').fadeIn();//masque la zone de confirmation de mot de passe
	$('#blocSaisieStatut').fadeOut();//masquer le "statut" et le choix de la langue
	$('#blocSaisieLangue').fadeOut();//masquer le "statut" et le choix de la langue
	$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
	$('#GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
	$('#P1_app__login-button').fadeOut();

	message1='mot de passe enregistré';
	message2='veuilez le confirmer';  



}
	// ----------------------------------------------------   CHOIX AUTOMATIQUE / MODIFICATION DE LA LANGUE UTILISE ==> ------------------------------------------------------------------------------- 
	const userLanguage = navigator.language || navigator.userLanguage; 
	const liste=document.getElementById('listDeroulLang');
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


});

$('#soumettreConfirmMDP').on('click', function(){

	if ($('#saisieMDP').val()===$('#saisieConfirmMDP').val()) {
		console.log('ok');

		$('#P1_app__login-button').fadeOut();
		$('#blocSaisieStatut').fadeIn();//masquer le "statut" et le choix de la langue
		$('#blocSaisieLangue').fadeIn();//masquer le "statut" et le choix de la langue
		$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
		$('#GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir

		message1='mot de passe et confirmation identique';
		message2='vérifiez les rubriques suivantes';  

		}else{console.log('nooooooo')

	$('#P1_app__login-button').fadeOut();
	message1='mot de passe et confirmation différentes';
	message2='vérifiez les informations';  
}

});

$('#P1_app__login-button').on('click', function(){
	$('.ListeDesContacts').fadeIn();
	$('.P0_connexion_ASonCompte').fadeOut();

	$('#ProfilConnecte').text($('#saisiePseudo').val());

	var contenusaisis = $('#saisiePseudo').val();//caractere(s) saisi
	//console.log(contenusaisis);
	// Traitement AJAX de la saisie

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
			console.log('statut : ' + retourhumeur_html);
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
			console.log('humeur : '+ retourStatut_html);
			$('#P2_status').text(retourStatut_html);

		})
		.fail(function () {
			alert("error dans ajax_verificationHumeur");//si le traitement retourne une erreur
		});
	};

	const logSaisieLangue=$('#listDeroulLang').val();//console.log(logSaisieLangue); 
	const logSaisieStatut=$('#listDeroulStatut').val();//console.log(logSaisieLangue);


	ajax_connexionUtilisateurDejaEnregistre(contenusaisis,logSaisieLangue,logSaisieStatut);

	function ajax_connexionUtilisateurDejaEnregistre(contenusaisis,logSaisieLangue,logSaisieStatut) {
	  $.ajax({
		method: "POST",
		url: "connexionUtilisateurDejaEnregistre.php",
		data: { contenusaisis: contenusaisis,logSaisieLangue:logSaisieLangue,logSaisieStatut:logSaisieStatut },
	  })
	  .done(function (retour3_html) {
		//console.log(retour3_html);
	  })
	  .fail(function () {
		alert("error dans ajax_connexionUtilisateurDejaEnregistre");
	  });
	};

});

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
		//$('#P1_app__login-button').on('click', function() { 
			
			//$('.P0_connexion_ASonCompte').fadeOut();
			//$('.ListeDesContacts').fadeIn();
		//});
	}
	else{

		message1='reverifiez vos informations';
		message2='des erreurs ont été détecté'; 

	$(classAVise).css('background-color', 'red');
	$(bocDeGlypsDeSecurite).attr('class','incorrect');

	$('#P1_app__login-button').fadeOut();
	}
});

$('#envoyerMessage').on('click',function() {

	//console.log($('#messageAEnvoye').val());

});

$('#quitter').on('click',function() {

	$('.Discution').fadeOut();
	$('#P0_logoDeDemarage').fadeIn();

});

$('#envoyerMessage').on('click', function(){



});

// ---------------------------------------------------- AlTERNER ENTRE 2 MESSAGES ==> ------------------------------------------------------------------------------- 
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

