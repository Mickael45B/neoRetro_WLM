<?php 	
		include 'conectBDD.php'; 
//contenusaisi
$sasieSecuPseudo=strip_tags($_POST['contenusaisi']);




    try {
        $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($sasieSecuPseudo));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    $nom=$resultat['avatar'];
        echo $nom;


