<?php 	
		include 'conectBDD.php'; 

$sasieSecupseudo=strip_tags($_POST['enregistrerPseudo']);
$sasieSecumail=strip_tags($_POST['enregistrerMail']);
$sasieSecuMDP=strip_tags($_POST['enregistrerMDP']);
$sasieSecuLangur=strip_tags($_POST['enregistrerLang']);


try {
    $sql = "INSERT INTO forum_utilisateur(pseudo,mail,mot_de_passe,langue) VALUES (?,?,?,?)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($sasieSecupseudo,$sasieSecumail,$sasieSecuMDP,$sasieSecuLangur));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
