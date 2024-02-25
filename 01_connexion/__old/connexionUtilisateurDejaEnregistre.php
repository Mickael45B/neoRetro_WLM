<?php 	
		include '../../conectBDD.php'; 

        $logSaisiePseudo=htmlspecialchars($_POST['contenusaisis']);
        $logSaisieLangue=htmlspecialchars($_POST['logSaisieLangue']);
        $logSaisieStatut=htmlspecialchars($_POST['logSaisieStatut']);



try {
	$sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute(array($logSaisiePseudo));
  } catch (Exception $e) {
	print "Erreur ! " . $e->getMessage() . "<br/>";
  }


	$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
  $nombreDeLignes = $stmt->rowCount();

if($nombreDeLignes>0){

    $langueEnregitre=$resultat['langue'];//fr
    $idEnregitre=$resultat['ID_utilisateur'];//

    $langueChoisie=$langueEnregitre;

    if ($logSaisieLangue!=$langueEnregitre) {
        # code...
        $sql = "UPDATE forum_utilisateur SET langue=?, statut=? WHERE ID_utilisateur=?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($logSaisieLangue, $logSaisieStatut, $idEnregitre));
        $langueChoisie=$logSaisieLangue;
    }
    echo $langueChoisie." si tu vois ca c'est bon";//TEST
  }