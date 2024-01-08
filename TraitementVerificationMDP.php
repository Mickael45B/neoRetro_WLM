<?php 	
		include 'conectBDD.php'; 
//contenusaisi
$sasieSecuPseudo=strip_tags($_POST['contenusaisiPseudo']);
$sasieSecuMDP=strip_tags($_POST['contenusaisiMDP']);

$longeur_sasieSecu=strlen($sasieSecuMDP);



    try {
        $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=? AND mot_de_passe=?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($sasieSecuPseudo, $sasieSecuMDP));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombreDeLignes = $stmt->rowCount();

    if ($nombreDeLignes==1) {
    //echo"<span id='resultat' class='corect' style='color: green;'>
    //Vous pouvez acceder au site.</span>";
    echo"correct";
    } else {
        //echo"<span id='resultat' class='incorect' style='color: red;'>Votre mot de passe n'est pas correct</span>";
        //echo"incorrect";
    }


