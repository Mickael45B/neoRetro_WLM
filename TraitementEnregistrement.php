<?php 	
		include 'conectBDD.php'; 
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


echo"";





/*

    try {
		$sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
		$stmt = $bdd->prepare($sql);
		$stmt->execute(array($sasieSecuPseudo));
	  } catch (Exception $e) {
		print "Erreur ! " . $e->getMessage() . "<br/>";
	  }
	
	
		$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
	
$humeur=$resultat['humeur'];$humeur=$resultat['statut'];
echo $humeur;*/