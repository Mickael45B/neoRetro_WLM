<?php 	
    include '../../conectBDD.php'; 

    $sasieEtape=htmlspecialchars($_POST['etape']);
    $sasiePseudo=htmlspecialchars($_POST['pseudo']);
    $sasieMDP=htmlspecialchars($_POST['contenuMDP']);
        $sasieMDPsecu=hash('sha256', $sasieMDP);

    // LISTE DES ETAPES (POSSIBILITE DE RAJOUTER D'AUTRES ETAPES DANS LE FUTUR) :
        //ETAPE 1 : Verifier si le pseudo est deja enregistre sur la BDD
        //ETAPE 2 : Verifier si le mot de Passe saisi est bien celui enregistre sur la BDD

    if ($sasieEtape==1) {

        try {
            $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($sasiePseudo));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $nombreDeLignes = $stmt->rowCount();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($nombreDeLignes==1) {// Le pseudo est dans la BDD
            echo"existe";
        }

        else {// le pseudo n'est pas dans la BDD
            echo "";
        }
    }

    if ($sasieEtape==2) {

        try {
            $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=? AND mot_de_passe=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($sasiePseudo, $sasieMDPsecu));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignes = $stmt->rowCount();
    
        if ($nombreDeLignes==1) {
            echo"correct";
        } else {
            echo "";

        }
    }

    if ($sasieEtape==3) {

        if ($sasiePseudo!="riend") {
            $prendre=$sasiePseudo;
        }else{
            $prendre=$sasieMDP;
        }

        try {
            $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($prendre));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignes = $stmt->rowCount();
    
        if ($nombreDeLignes==1) {
            echo $resultat['ID_utilisateur'];
        } else {
            echo "";

        }
    }

    
    if ($sasieEtape==5) {

        try {
            $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=? AND mot_de_passe=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($sasiePseudo, $sasieMDPsecu));
        
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombreDeLignes = $stmt->rowCount();
        
            if ($nombreDeLignes == 1) {
                $resultats = array(
                    'NivAutorisation' => $resultat['niveau_autaurisation'],
                    'Pseudo' => $resultat['pseudo'],
                    'Humeur' => $resultat['humeur']
                );
            } else {
                // Si aucun résultat trouvé, retourner des valeurs par défaut ou vides
                $resultats = array(
                    'NivAutorisation' => "", // Valeur par défaut pour NivAutorisation
                    'Pseudo' => "", // Valeur par défaut pour Pseudo
                    'Humeur' => "" // Valeur par défaut pour Humeur
                );
            }
        
            // Encodez les résultats en JSON
            $json_response = json_encode($resultats);
        
            // Envoyez la réponse JSON
            header('Content-Type: application/json');
            echo $json_response;
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }

    }