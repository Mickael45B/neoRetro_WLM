$('#P0_logoDeDemarageButton').on('click',function() {//LORS DU CLICK SUR LE LOGO  

	$('#P0_logoDeDemarage').fadeOut();// masque le logo
	$('.P0_connexion_ASonCompte').fadeIn();// affiche la fenetre de connexion
});
message1='vous pouvez vous connecter en anonyme';
message2='en cliquant sur le bouton';  

//----- VARIABLES MODIFIABLES ==>

longeurMiniPseudo =3;
longeurMiniMDP=6;



//----- <== VARIABLES MODIFIABLES 

$('#saisiePseudo, #P1_app__login--email, #saisieMDP, #P1_app__login--confirmPass, .P1_app__login-inner--select, #bocDeGlypsDeSecurite, .GlyphAChoisir').on('input', () =>{



	var contenusaisi = $('#saisiePseudo').val();//caractere(s) saisi
		////console.log(contenusaisi);
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
			////console.log(retour1_html);

			if(retourPseudo_html=="existe"){//si la "class" retourné apres traitement AJAX est "corect"
				
			message1='Pseudo OK';
			message2='Renseigner MDP';
			$('.P1_app__login--pseudo').css('background-color', 'green');// entoure la zone de saisie de vert
			$('#saisiePseudo').addClass('existe'); 
			} 
			else { // dans cas contraire 
				
			message1='Pseudo non pris';
			message2='creer un compte';
			$('.P1_app__login--pseudo').css('background-color', ''); //retirer la bordure verte de la zone de saisie
			$('#saisiePseudo').removeClass('existe');

			}
		})
		.fail(function () {
			alert("error dans ajax_verificationExistance");//si le traitement retourne une erreur
		});
		};





});
$('#saisiePseudo, #P1_app__login--email, #saisieMDP, #P1_app__login--confirmPass, .P1_app__login-inner--select, #bocDeGlypsDeSecurite, .GlyphAChoisir').on('keyup', () =>{
	////console.log('traitement');

	//-------------------------------------- ANONYME ==>
	if($('.P1_app__login').val()==="" ){

		////console.log('anonyme');
		
		$('#saisiePseudo').fadeIn();
		$('#P1_app__login--email').fadeOut();//masquer la zone de saisie d'adresse mail
		$('#saisieMDP').fadeOut();//masquer la zone de saisie d'adresse mail
		$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
		$('.P1_app__login-inner--select').fadeOut();//masquer le "statut" et le choix de la langue
		$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
		$('.GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
		$('#P1_app__login-button').fadeIn();

		$('#P1_app__login-button').text('se connecter en anonyme');
	
		message1='vous pouvez vous connecter en anonyme';
		message2='en cliquant sur le bouton';  
	
	}
	//-------------------------------------- <== ANONYME


  // ----------------------------------------------------   VERIFICATION DU MOT DE PASSE POUR UN PSEUDO ==> -------------------------------------------------------------------------------
  /*
	const contenusaisiPseudo = $('#saisiePseudo').val();//saisie du pseudo
	const contenusaisiMDP = $('#saisieMDP').val();// saisie du Mot de Passe
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
		} 
		else {
			// Réinitialisez la bordure si le texte n'est pas "ok"
			$('.P1_app__login--pass').css('background-color', 'transparent'); 
			message1='Pseudo non pris';
			message2='creer un compte'; 
			$('#saisieMDP').removeClass('existe');
		}
		})
		.fail(function () {
		alert("error dans ajax_verificationExistance");
		
		});
	};*/
  // ---------------------------------------------------- <== VERIFICATION DU MOT DE PASSE POUR UN PSEUDO -------------------------------------------------------------------------------

  // ----------------------------------------------------   VERIFICATION DE LA VALIDITE DU MAIL ==> -------------------------------------------------------------------------------

	function verifierFormatEmail(chaine) {
		// Définition de l'expression régulière pour vérifier le format d'un email
		const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		// Test de la chaîne avec l'expression régulière
		return regexEmail.test(chaine);
	}
	adressemail=$('#saisieMail').val();
	// Exemple d'utilisation
	var emailValide = verifierFormatEmail(adressemail);////console.log('mail : '+emailValide);
  // ---------------------------------------------------- <== VERIFICATION DE LA VALIDITE DU MAIL -------------------------------------------------------------------------------

	//-------------------------------------- NOUVEAU ==>
	if($('#saisiePseudo').val().length>=longeurMiniPseudo){
		if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") ){ //pseudo renseigné et inexistant

			//console.log('cas1');

			$('#saisiePseudo').fadeIn();
			$('#P1_app__login--email').fadeIn();//masquer la zone de saisie d'adresse mail
			$('#saisieMDP').fadeOut();//masquer la zone de saisie d'adresse mail
			$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
			$('.P1_app__login-inner--select').fadeOut();//masquer le "statut" et le choix de la langue
			$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
			$('.GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
			$('#P1_app__login-button').fadeOut();
			

			////console.log('ok');



			if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()=="" ){//pseudo renseigné et inexistant - mail renseigné

			} else {	
				if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()!="" && emailValide==false ){//pseudo renseigné et inexistant - mail renseigné et invalide
					// STOP
					//console.log('cas2');
				}	
				else {//pseudo renseigné et inexistant - mail renseigné et valide

					//console.log('cas3');

					$('#saisiePseudo').fadeIn();
					$('#P1_app__login--email').fadeIn();//masquer la zone de saisie d'adresse mail
					$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
					$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
					$('.P1_app__login-inner--select').fadeOut();//masquer le "statut" et le choix de la langue
					$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
					$('.GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
					$('#P1_app__login-button').fadeOut();
		
					if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()!="" && $('#saisieMDP').val()=="" ){//pseudo renseigné et inexistant - mail renseigné et valide - MDP non reseigné
						//STOP
						//console.log('cas4');
					}
					else{//pseudo renseigné et inexistant - mail renseigné et valide - MDP reseigné

						//console.log('cas5');

						$('#saisiePseudo').fadeIn();
						$('#P1_app__login--email').fadeIn();//masquer la zone de saisie d'adresse mail
						$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
						$('#P1_app__login--confirmPass').fadeIn();//masque la zone de confirmation de mot de passe
						$('.P1_app__login-inner--select').fadeOut();//masquer le "statut" et le choix de la langue
						$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
						$('.GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
						$('#P1_app__login-button').fadeOut();
	
						if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()!="" && $('#saisieMDP').val()!="" && $('#saisieConfirmMDP').val()!=$('#saisieMDP').val()){//pseudo renseigné et inexistant - mail renseigné et valide - MDP reseigné - confirmation differentes
							//STOP
							//console.log('cas6');
						}
						else{//pseudo renseigné et inexistant - mail renseigné et valide - MDP reseigné - confirmation egale

							//console.log('cas7');

							$('#saisiePseudo').fadeIn();
							$('#P1_app__login--email').fadeIn();//masquer la zone de saisie d'adresse mail
							$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
							$('#P1_app__login--confirmPass').fadeIn();//masque la zone de confirmation de mot de passe
							$('.P1_app__login-inner--select').fadeIn();//masquer le "statut" et le choix de la langue
							$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
							$('.GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir
							$('#P1_app__login-button').fadeOut();

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

	
							if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()=="" && $('#saisieMDP').val()!="" && $('#saisieConfirmMDP').val()===$('#saisieMDP').val() && $('.P1_app__login-inner--select').val()==""){ //statut 
							
								//console.log('cas8');

							}
							if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()=="" && $('#saisieMDP').val()!="" && $('#saisieConfirmMDP').val()===$('#saisieMDP').val() && $('.P1_app__login-inner--select').val()==""){ //langue

								//console.log('cas9');
							}
							if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()=="" && $('#saisieMDP').val()!="" && $('#saisieConfirmMDP').val()===$('#saisieMDP').val() && $('.P1_app__login-inner--select').val()=="" && !$('#bocDeGlypsDeSecurite').hasClass('correct')){
								//STOP.
								//console.log('cas10');
							}
							if($('#saisiePseudo').val()!="" && !$("#saisiePseudo").hasClass("existe") && $('#saisieMail').val()=="" && $('#saisieMDP').val()!="" && $('#saisieConfirmMDP').val()===$('#saisieMDP').val() && $('.P1_app__login-inner--select').val()=="" && $('#bocDeGlypsDeSecurite').hasClass('correct')){
								
								//console.log('cas11');

								$('#saisiePseudo').fadeIn();
								$('#P1_app__login--email').fadeIn();//masquer la zone de saisie d'adresse mail
								$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
								$('#P1_app__login--confirmPass').fadeIn();//masque la zone de confirmation de mot de passe
								$('.P1_app__login-inner--select').fadeIn();//masquer le "statut" et le choix de la langue
								$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
								$('.GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir
								$('#P1_app__login-button').fadeIn();

							}
						}
					}
				}
			}
		} else	{ //pseudo renseigné et existant
			//deja reseigne
			

					//console.log('cas12');
					
				$('#saisiePseudo').fadeIn();
				$('#P1_app__login--email').fadeOut();//masquer la zone de saisie d'adresse mail
				$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
				$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
				$('.P1_app__login-inner--select').fadeOut();//masquer le "statut" et le choix de la langue
				$('#bocDeGlypsDeSecurite').fadeOut();//masquer l'ensemble de glyphes de securité'
				$('.GlyphAChoisir').fadeOut();//masque l'indication de glyphe a Choisir
				$('#P1_app__login-button').fadeOut();

				// ----------------------------------------------------   VERIFICATION DU MOT DE PASSE POUR UN PSEUDO ==> -------------------------------------------------------------------------------
				
					const contenusaisiPseudo = $('#saisiePseudo').val();//saisie du pseudo
					const contenusaisiMDP = $('#saisieMDP').val();// saisie du Mot de Passe
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
						} 
						else {
							// Réinitialisez la bordure si le texte n'est pas "ok"
							$('.P1_app__login--pass').css('background-color', 'transparent'); 
							message1='Pseudo non pris';
							message2='creer un compte'; 
							$('#saisieMDP').removeClass('existe');
						}
						})
						.fail(function () {
						alert("error dans ajax_verificationExistance");
						
						});
					};
				// ---------------------------------------------------- <== VERIFICATION DU MOT DE PASSE POUR UN PSEUDO -------------------------------------------------------------------------------
				

				if($('#saisiePseudo').val()!="" && $("#saisiePseudo").hasClass("existe") && !$('#saisieMDP').hasClass("correct") ){ //pseudo renseigné et existant MDP non renseigne ==> y mettre la longeur
				}
				else{ //pseudo renseigné et existant MDP renseigne ==> y mettre la longeur
				
					$('#saisiePseudo').fadeIn();
					$('#P1_app__login--email').fadeOut();//masquer la zone de saisie d'adresse mail
					$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
					$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
					$('.P1_app__login-inner--select').fadeIn();//masquer le "statut" et le choix de la langue
					$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
					$('.GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir
					$('#P1_app__login-button').fadeOut();
		

					if($('#saisiePseudo').val()!="" && $("#saisiePseudo").hasClass("existe") && $('#saisieMDP').val()!="" && $('.P1_app__login-inner--select').val()=="" && $('.P1_app__login-inner--select').val()!=$('#P1_app__login--confirmPass').val()){ //statut
					}
					if($('#saisiePseudo').val()!="" && $("#saisiePseudo").hasClass("existe") && $('#saisieMDP').val()!="" && $('.P1_app__login-inner--select').val()=="" && $('.P1_app__login-inner--select').val()===$('#P1_app__login--confirmPass').val()){ //langue


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
						
					}
					if($('#saisiePseudo').val()!="" && $("#saisiePseudo").hasClass("existe") && $('#saisieMDP').val()!="" && $('.P1_app__login-inner--select').val()=="" && !$('#bocDeGlypsDeSecurite').hasClass('correct')){ //mauvais glyphe   
						//STOP
					}
					if($('#saisiePseudo').val()!="" && $("#saisiePseudo").hasClass("existe") && $('#saisieMDP').val()!="" && $('.P1_app__login-inner--select').val()=="" && $('#bocDeGlypsDeSecurite').hasClass('correct')){ //bon glyphe  
					
						$('#saisiePseudo').fadeIn();
						$('#P1_app__login--email').fadeOut();//masquer la zone de saisie d'adresse mail
						$('#saisieMDP').fadeIn();//masquer la zone de saisie d'adresse mail
						$('#P1_app__login--confirmPass').fadeOut();//masque la zone de confirmation de mot de passe
						$('.P1_app__login-inner--select').fadeIn();//masquer le "statut" et le choix de la langue
						$('#bocDeGlypsDeSecurite').fadeIn();//masquer l'ensemble de glyphes de securité'
						$('.GlyphAChoisir').fadeIn();//masque l'indication de glyphe a Choisir
						$('#P1_app__login-button').fadeIn();
		
						$('#P1_app__login-button').text('bienvenue ...');
					}
					
				}
			}
		
	}	
});

$('#P1_app__login-button').on('click',function(){


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







/*
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
$('#saisiePseudo').val().length && $("#saisiePseudo")=="existe" && $('#saisieMail') && $('#saisieMDP') && $('#saisieConfirmMDP') &&$('.P1_app__login-inner--select') && $('#bocDeGlypsDeSecurite') && $('#glyphASelectione')
*/