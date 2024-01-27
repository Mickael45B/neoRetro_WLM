<?php 
		include 'conectBDD.php'; 
        
        $sasieSecupseudo=strip_tags($_POST['test']);
        
        
        try {
            $sql = "SELECT * FROM  forum_utilisateur  WHERE pseudo=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($sasieSecupseudo));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatStmt=$stmt->fetch(PDO::FETCH_ASSOC);
        echo $resultatStmt['ID_utilisateur'];












/*
        <div class="aEnvoyer" data-typeEnvoi="text"></div>
        <button data-changeType="text">evoi</button>
        <button data-changeType="gif">gif</button>
        <button data-changeType="gift">gift</button>
        <button data-changeType="wizz">wizz</button>
        <div class="aEnregistrer" data-typeEnregistrer=""></div>  AXhqoAacAXRevxc3pOqNZl6gBAEDEnSz
        */
        ?>
