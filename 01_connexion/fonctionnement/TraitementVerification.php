<?php 	
    include '../../conectBDD.php'; 

    $sasieEtape=htmlspecialchars($_POST['etape']);
    $sasiePseudo=htmlspecialchars($_POST['pseudo']);
    $sasieMDP=htmlspecialchars($_POST['contenuMDP']);

    // LISTE DES ETAPES (POSSIBILITE DE RAJOUTER D'AUTRES ETAPES DANS LE FUTUR) :
        //ETAPE 1 : Verifier si le pseudo est deja enregistre sur la BDD
        //ETAPE 2 : Verifier si le mot de Passe saisi est bien celui enregistre sur la BDD

    if ($sasieEtape==1) {
        # code...

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

    else  {// le pseudo n'est pas dans la BDD
        echo "";
    }
    }
    if ($sasieEtape==2) {

            try {
                $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=? AND mot_de_passe=?";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array($sasiePseudo, $sasieMDP));
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
/*
// Déclaration et initialisation d'un tableau associatif
$profilUtilisateur = array(
    'Pseudo' => $sasiePseudo,
    );

// Convertir le tableau en format JSON
$profilUtilisateur_encode = json_encode($profilUtilisateur);

// Chemin vers le fichier où vous souhaitez enregistrer le JSON
$cheminFichierJSON = 'donneesUtilisateur.json';

// Enregistrer le JSON dans le fichier
file_put_contents($cheminFichierJSON, $profilUtilisateur_encode);
*/