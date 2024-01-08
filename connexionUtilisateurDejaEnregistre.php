<?php 	
		include 'conectBDD.php'; 

        $logSaisiePseudo=strip_tags($_POST['contenusaisis']);
        $logSaisieLangue=strip_tags($_POST['logSaisieLangue']);
        $logSaisieStatut=strip_tags($_POST['logSaisieStatut']);



try {
	$sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute(array($logSaisiePseudo));
  } catch (Exception $e) {
	print "Erreur ! " . $e->getMessage() . "<br/>";
  }


	$resultat = $stmt->fetch(PDO::FETCH_ASSOC);

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
    echo $langueChoisie;