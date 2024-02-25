<?php 	
		include '../../conectBDD.php'; 
$etapeEnregistrement=htmlspecialchars($_POST['etapeEnregistrement']);
$enregistrementPseudo=htmlspecialchars($_POST['enregistrementPseudo']);
$enregistrementMail=htmlspecialchars($_POST['enregistrementMail']);
$enregistrementMDP=htmlspecialchars($_POST['enregistrementMDP']);
$enregistrementLangue=htmlspecialchars($_POST['enregistrementLangue']);
$enregistrementStatut=htmlspecialchars($_POST['enregistrementStatut']);


if ($etapeEnregistrement==1) { //MAJ de la langue et du statut

	try {
		$sql = "UPDATE forum_utilisateur SET langue=?, statut=? WHERE pseudo=?";
		$stmt = $bdd->prepare($sql);
		$stmt->execute(array($enregistrementLangue,$enregistrementStatut,$enregistrementPseudo));
	} catch (Exception $e) {
		print "Erreur ! " . $e->getMessage() . "<br/>";
	}

}

if ($etapeEnregistrement==2) { //enregistrement nouvel utilisateur

	try {
		$sql = "INSERT INTO forum_utilisateur(pseudo,mail,mot_de_passe,langue,statut) VALUES (?,?,?,?,?)";
		$stmt = $bdd->prepare($sql);
		$stmt->execute(array($enregistrementPseudo,$enregistrementMail,$enregistrementMDP,$enregistrementLangue,$enregistrementStatut));
	} catch (Exception $e) {
		print "Erreur ! " . $e->getMessage() . "<br/>";
	}
}

if ($etapeEnregistrement==3) {
	try {
		$sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
		$stmt = $bdd->prepare($sql);
		$stmt->execute(array($enregistrementPseudo));
	} catch (Exception $e) {
		print "Erreur ! " . $e->getMessage() . "<br/>";
	}

	$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
	$nombreDeLignes = $stmt->rowCount();

	if($nombreDeLignes>0){
		$langueEnregitre=$resultat['langue'];//fr
		$idEnregitre=$resultat['ID_utilisateur'];//

		$langueChoisie=$langueEnregitre;

		if ($enregistrementLangue!=$langueEnregitre) {
			$sql = "UPDATE forum_utilisateur SET langue=?, statut=? WHERE ID_utilisateur=?";
			$stmt = $bdd->prepare($sql);
			$stmt->execute(array($enregistrementLangue, $enregistrementStatut, $idEnregitre));
			$langueChoisie=$enregistrementLangue;
		}
		echo $langueChoisie." si tu vois ca c'est bon";//TEST
  	}
}