<?php 	
		include 'conectBDD.php'; 
//contenusaisi
$sasieSecuPseudo=strip_tags($_POST['contenusaisis']);

    try {
		$sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
		$stmt = $bdd->prepare($sql);
		$stmt->execute(array($sasieSecuPseudo));
	  } catch (Exception $e) {
		print "Erreur ! " . $e->getMessage() . "<br/>";
	  }
	
	
		$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
	
$humeur=$resultat['humeur'];
echo $humeur;