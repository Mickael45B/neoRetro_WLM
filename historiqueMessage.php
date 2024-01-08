<?php 	
		include 'conectBDD.php'; 
// Contenu saisi
$sasieSecuDestinataire = strip_tags($_POST['numerodestinataire']); // 4
$sasieSecuUtilisateur = strip_tags($_POST['numeroutilisateur']); // 2

try {
    $sql = "SELECT * FROM forum_message WHERE (BINARY ID_emetteur = :destinataire AND BINARY ID_receveur = :utilisateur) OR (BINARY ID_emetteur = :utilisateur AND BINARY ID_receveur = :destinataire)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindValue(':destinataire', $sasieSecuDestinataire, PDO::PARAM_INT);
    $stmt->bindValue(':utilisateur', $sasieSecuUtilisateur, PDO::PARAM_INT);
    $stmt->execute();
} 
catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br>";
    print "Code d'erreur : " . $e->getCode() . "<br>";
    print "Trace de l'erreur : " . $e->getTraceAsString() . "<br>";
}
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Effacer tout le contenu du fichier
$cheminFichierJSON = 'historiqueS_messages.json';
file_put_contents($cheminFichierJSON, '');



// Déclaration et initialisation d'un tableau associatif
$monTableauJSON = array(
    'tableauTimestamp' =>  array(
    0 => $sasieSecuUtilisateur,
    ),
    'tableauMessage' =>  array(
        0 => $sasieSecuDestinataire,
        ),
    );

// Convertir le tableau en format JSON
$monTableauJSON_encode = json_encode($monTableauJSON);

// Chemin vers le fichier où vous souhaitez enregistrer le JSON
$cheminFichierJSON = 'historiqueS_messages.json';

// Enregistrer le JSON dans le fichier
file_put_contents($cheminFichierJSON, $monTableauJSON_encode);

/*
$monTableauJSON = json_decode(file_get_contents('historiqueS_messages.json'), true);

// Utiliser le tableau JSON
echo $monTableauJSON['tableauTimestamp'][0];
*/



foreach ($resultat as $traitementRequete) {

$i=1;
 
    // Charger le JSON depuis un fichier ou une source de données
    $monTableauJSON = json_decode(file_get_contents('historiqueS_messages.json'), true);
    
    // Ajouter une nouvelle valeur en dernière position
    $monTableauJSON['tableauTimestamp'][$i] = $traitementRequete['timestamp_message'];
    $monTableauJSON['tableauMessage'][$i] = $traitementRequete['messageposte'];

    
    // Réencoder le tableau mis à jour en JSON
    $monTableauJSON_encode = json_encode($monTableauJSON);
    

















    $dateTimestamp = $traitementRequete['timestamp_message'];
    // Créer un objet DateTime à partir du timestamp
    $date = new DateTime();
    $date->setTimestamp($dateTimestamp);

    // Obtenir la date et l'heure au format souhaité
    $date_format = $date->format('d-m-Y'); // Format de date : Jour-Mois-Année
    $heure_format = $date->format('H:i:s'); // Format d'heure : Heures:Minutes:Secondes

    // Afficher la date et l'heure
    $dateHeureMessage = "Le : " . $date_format . " à : " . $heure_format;

   /* echo '<div style="color: darkgray;">'.$dateHeureMessage.'</div><br>';

    echo $traitementRequete['messageposte'] . '<br>';*/
}

