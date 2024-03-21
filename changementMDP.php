<?php
include 'conectBDD.php'; //connection a la BDD
$identifiantUtilisateur=htmlspecialchars($_POST['idDuPseudoChangement']); //id de l'utilisateur

$motDePasse=htmlspecialchars($_POST['saisieNouveauMDP']);// nouveau mdp
    $secuMDP=hash('sha256', $motDePasse);

    try { // mettre a jour les informations
        $query = "UPDATE forum_utilisateur SET tokenRecuperation=null, validiteToken=null, codeValidation=null, mot_de_passe=?  WHERE ID_utilisateur=?";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$secuMDP, $identifiantUtilisateur]); 
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }


    try {//desactiver le blocage du compte
        $query = "UPDATE repertoirebloquage SET actif=0  WHERE pseudo=?";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$identifiantUtilisateur]); 
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
echo"ok";












