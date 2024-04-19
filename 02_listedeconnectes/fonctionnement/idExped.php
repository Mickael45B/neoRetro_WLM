<?php
    include '../../conectBDD.php'; 

$sasieMDP=htmlspecialchars($_POST['contenuMDP']);



    $prendre=$sasieMDP;





        try {
            $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($sasieMDP));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignes = $stmt->rowCount();
    
            echo $resultat['ID_utilisateur']." toto";
