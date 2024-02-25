<?php 
?>
<script>

$('#envoyerMessage').on('click',function() {
		//enregistrementJSON

		contenu = $('#messageAEnvoye').val();alert(contenu)
		timestamp = Date.now(); // Timestamp en secondes depuis l'époque UNIX
		type = "text";
		PseudoExpediteur=$('#avatarDiscutionUtilisateur').attr('alt');
		PseudoDestinataire=$('#avatarDiscutionDestinataire').attr('alt');
	
		ajax_connexionUtilisateurDejaEnregistre(contenu,timestamp,type, PseudoExpediteur,PseudoDestinataire);

		function ajax_connexionUtilisateurDejaEnregistre(contenu,timestamp,type,PseudoExpediteur,PseudoDestinataire) {
		$.ajax({
			method: "POST",
			url: "EnregistrementDuMessage.php",
			data: { contenu: contenu,timestamp:timestamp,type:type, PseudoExpediteur:PseudoExpediteur, PseudoDestinataire:PseudoDestinataire},
		})
		.done(function (retourenvoiMGG) {
			console.log(retourenvoiMGG);
			$('#messageAEnvoye').text("");

		})
		.fail(function () {
			alert("error dans ajax_connexionUtilisateurDejaEnregistre");
		});
		};

	});
</script>