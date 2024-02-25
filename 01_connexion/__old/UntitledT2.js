



  $('.P1_app__login-button').on('click',function() {//LORS DE LA VALIDATION DE LA CONNEXION ==>
	$('.P0_connexion_ASonCompte').fadeOut();//masque la fenetre de connexion
	$('.ListeDesContacts').fadeIn();//affiche la liste de connectes
  });

  $('.P2_listitem').on('click',function() {//LORS DU CHOIX DE LA PERSONNE AVEC QUI DISCUTER ==>
	$('.ListeDesContacts').fadeOut();//Masque la liste de connectes
	$('.Discution').fadeIn();// affiche la fenetre de discution
	
  });

  $('#quitter').on('click',function() {//LORS DU CHOIX DE QUITTER LA CONVERSATION ==>
	$('.Discution').fadeOut();// masque la fenetre de discution
	$('#P0_logoDeDemarage').fadeIn();//affiche le logo
  });
  // ---------------------------------------------------- <== AFFICHER CHAQUE PARTIE SEPAREMENT -------------------------------------------------------------------------------

  // ----------------------------------------------------   VERIFICATION DE L'EXISTANCE DU PSEUDO ==> -------------------------------------------------------------------------------
  
  $('#saisiePseudo').on('keyup', () => { //Lors de la saisie d'un caractere dans la zone "Pseudo"
	const contenusaisi = $('#saisiePseudo').val();//caractere(s) saisi

	// Traitement AJAX de la saisie
	ajax_verificationExistance(contenusaisi);

	function ajax_verificationExistance(contenusaisi) {
	  $.ajax({
		method: "POST",
		url: "TraitementVerificationPseudo.php",
		data: { contenusaisi:contenusaisi},
	  })
	  .done(function (retour1_html) {
		//$('#messageInfoConnexion').html(retour1_html);
		//console.log(retour1_html);

		if(retour1_html=="existe"){//si la "class" retourné apres traitement AJAX est "corect"
		  message1='Pseudo OK';
		  message2='Renseigner MDP';
		  $('.P1_app__login--pseudo').css('background-color', 'green');// entoure la zone de saisie de vert
		  $('#P1_app__login--email').fadeOut();//masquer la zone de saisie d'adresse mail
		  $('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
		  $('#saisiePseudo').addClass('existe'); 
		  $('#P1_app__login-button').fadeOut();//masque le boutoon de connexion
		} 
		if(retour1_html=="inexistant") { // dans cas contraire 
		  message1='Pseudo non pris';
		  message2='creer un compte';
		  $('.P1_app__login--pseudo').css('background-color', ''); //retirer la bordure verte de la zone de saisie
		  $('#P1_app__login--email').fadeIn();// affiche la zone de saisie d'adresse mail
		  $('#P1_app__login--confirmPass').fadeIn();//affiche la zone de confirmation de mot de passe
		  $('#saisiePseudo').removeClass('existe');
		  $('#P1_app__login-button').fadeOut();//masque le boutoon de connexion

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
		  $('.P1_app__login--pass').css('background-color', 'green');
		  $('#P1_app__login-button').text('Entrer');
		  $('#saisieMDP').addClass('correct');
		  $('#P1_app__login-button').fadeIn();//affiche le boutoon de connexion
		  message1='Pseudo et mot de passe OK';
		  message2='Vérifier la langue et le statut'; 
		} 
		if (retour2_html=="incorrect") {
		  // Réinitialisez la bordure si le texte n'est pas "ok"
		  $('.P1_app__login--pass').css('background-color', 'transparent'); 
		  message1='Pseudo non pris';
		  message2='creer un compte'; 
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
	iconeAttendue=$('#glyphASelectione').text();
	iconeClicque=$(this).attr('value');
	classAVise='#iconeSecu'+iconeClicque;
	if(iconeAttendue==iconeClicque){  //- oui ==>continuer
	
	  $(classAVise).css('background-color', 'green');
	  //$(classAVise).css('scale', '2');
	  $(bocDeGlypsDeSecurite).attr('class','correct');
	  message1='Tout a été vérifié, et est correct';
	  message2='vous pouvez vous connecter'; 

	}
	if(iconeAttendue!=iconeClicque){
	  $(classAVise).css('background-color', 'red');
	  $(bocDeGlypsDeSecurite).attr('class','incorrect');
	  message1='reverifiez vos informations';
	  message2='des erreurs ont été détecté'; 

	}

  });
  // ---------------------------------------------------- <==  VERIFICATION SI ON A CLIQUE SUR LE BON GLYPHE DE SECURITE -------------------------------------------------------------------------------

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

//------------------------------------------------ PROCEDURE D'ENREGISTREMENT ==> ------------------------------------------------------------------------
//$('.P1_app__login-button').on('click',function(){ 
  //console.log('Le bouton de connexion a ete clique');// ------------------------------------------------------------------------ LIGNE DE TEST
  if($('#saisiePseudo').text==""){//                                                                                     =>ANONYME
	//console.log('connexion en anonyme'); // ------------------------------------------------------------------------------------ LIGNE DE TEST
	$('#P1_app__login-button').hover(function(){ 
	  //console.log('connexion en anonyme'); // ---------------------------------------------------------------------------------- LIGNE DE TEST
	  $('#P1_app__login-button').text('se connecter en anonyme');
	});
	$('#P1_app__login-button').on('click',function(){
	  //console.log('Cette partie affichera ou masquera certaines parties');// --------------------------------------------------- LIGNE DE TEST
	  $('.P0_connexion_ASonCompte').fadeOut();//masque la fenetre de connexion
	  $('.ListeDesContacts').fadeOut();//affiche la liste de connectes
	  $('.Discution').fadeIn();// affiche la fenetre de discution
	});
  }else {  
	if ($('#saisiePseudo').hasClass('existe')) {//=>DEJA ENREGISTRE
	  //console.log('cette parie traite les utilisateurs deja enregistre');// ---------------------------------------------------- LIGNE DE TEST
	  $('#saisiePseudo').on('keyup',function(){ 
		  $('#P1_app__login-button').fadeOut();
	  });
	  $('#P1_app__login-button').on('click',function(){ //$('.ListeDesContacts').fadeOut();//affiche la liste de connectes
			if($('#saisieMDP').hasClass('correct')){
			  console.log('traitement AJAX de l utilisateur deja enregistre');// ----------------------------------------------- LIGNE DE TEST

			  const logSaisiePseudo=$('#saisiePseudo').val();console.log(logSaisiePseudo);
			  const logSaisieLangue=$('#listDeroulLang').val();console.log(logSaisieLangue);


			  ajax_connexionUtilisateurDejaEnregistre(logSaisiePseudo,logSaisieLangue);

			  function ajax_connexionUtilisateurDejaEnregistre(logSaisiePseudo,logSaisieLangue) {
				$.ajax({
				  method: "POST",
				  url: "connexionUtilisateurDejaEnregistre.php",
				  data: { logSaisiePseudo: logSaisiePseudo,logSaisieLangue:logSaisieLangue },
				})
				.done(function (retour3_html) {
				  console.log(retour3_html);
				})
				.fail(function () {
				  alert("error dans ajax_connexionUtilisateurDejaEnregistre");
				});
			  };
			}
		  });

	} else { //=>NOUVEAU    
	  //console.log('traitement dun nouvel utilisateur');// ---------------------------------------------------------------------- LIGNE DE TEST   
	  let longeurMDP = document.getElementById('saisieMDP').value;

	  function verifierFormatEmail(chaine) {
		// Définition de l'expression régulière pour vérifier le format d'un email
		const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		// Test de la chaîne avec l'expression régulière
		return regexEmail.test(chaine);
	  }
	  adressemail=$('#saisieMail').val();
	  // Exemple d'utilisation
	  const emailValide = verifierFormatEmail(adressemail);

	  if (!$('#saisiePseudo').hasClass('existe') && $('#saisieMail').val()!="" && longeurMDP.length>=6 && $('#saisieMDP').val()===$('#saisieConfirmMDP').val() && $('#bocDeGlypsDeSecurite').hasClass("correct")) {
		if (emailValide) {
		// console.log('enregistrement du nouvel utilisateur');// ----------------------------------------------------------------- LIGNE DE TEST    

		enregistrerPseudo=$('#saisiePseudo').val();
		enregistrerMail=$('#saisieMail').val();
		enregistrerMDP=$('#saisieMDP').val();
		enregistrerLang=liste.options[selectValue].value;

		/*
		ajax_enregistrementNouveauProfil(enregistrerPseudo,enregistrerMail,enregistrerMDP,enregistrerLang);

		function ajax_enregistrementNouveauProfil(enregistrerPseudo,enregistrerMail,enregistrerMDP,enregistrerLang) {
		  $.ajax({
			method: "POST",
			url: "TraitementEnregistrementNouvelUtilisateur.php",
			data: { enregistrerPseudo:enregistrerPseudo,enregistrerMail:enregistrerMail,enregistrerMDP:enregistrerMDP,enregistrerLang:enregistrerLang },
		  })
		  .done(function (retour2_html) {
			$('#messageInfoConnexion').html(retour2_html);
			if ($('#resultat').hasClass("corect")) {
			  $('.P1_app__login--pass').css('background-color', 'green');
			  $('#P1_app__login-button').text('Entrer')//$('#P1_app__login-button').attr('disabled', true);

			} else {
			  // Réinitialisez la bordure si le texte n'est pas "ok"
			  $('.P1_app__login--pass').css('background-color', 'transparent'); 
			}
		  })
		  .fail(function () {
			alert("error dans ajax_verificationExistance");
			
		  });
		};

		*/
		} else {
		console.log("Format d'email invalide.");
		}
	  } else{
	  console.log('veuillez reverifier les informations');
	  }
	}
  }  




});
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

