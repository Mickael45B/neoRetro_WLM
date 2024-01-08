<?php 	
		include 'conectBDD.php'; 
//contenusaisi
$destinataire=strip_tags($_POST['destinataire']);
$utilisateur=strip_tags($_POST['utilisateur']);
$messagePoste=strip_tags($_POST['messagePoste']);
$date=strip_tags($_POST['date']);

    try {
		$sql = "INSERT INTO forum_message (ID_emetteur, ID_receveur,  messageposte , timestamp_message) VALUES (?, ?, ?, ?)";
		$stmt = $bdd->prepare($sql);
		$stmt->execute(array($utilisateur, $destinataire, $messagePoste, $date));
	  } catch (Exception $e) {
		print "Erreur ! " . $e->getMessage() . "<br/>";
	  }
	
	

