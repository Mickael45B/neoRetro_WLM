<?php 	
		include 'conectBDD.php'; 
//contenusaisi
$sasieSecu=strip_tags($_POST['contenusaisi']);
$longeur_sasieSecu=strlen($sasieSecu);

//if ($longeur_sasieSecu>=3) {

    try {
        $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($sasieSecu));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
    $nombreDeLignes = $stmt->rowCount();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($nombreDeLignes==1) {
    //echo $nombreDeLignes;
    echo"existe";
    }

 else  {
    echo "";
  }
//}
