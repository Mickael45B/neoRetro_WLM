<?php 	
/*		include 'conectBDD.php'; 
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $contenu = "me voila";//$_POST['messageAEnvoye'];
    $timestamp =time(); // Timestamp en secondes depuis l'époque UNIX
    $type = "texte";

    // Charger le contenu du fichier JSON
    $json_file = file_get_contents('historiqueS_messages.json');
    $data = json_decode($json_file, true);

    // Ajouter les nouvelles données au tableau JSON
    $data['utilisateur']['2']['destinataire']['4']['contenu']['tableauTimestamp'][] = $timestamp;
    $data['utilisateur']['2']['destinataire']['4']['contenu']['typeDuMessage'][] = $type;
    $data['utilisateur']['2']['destinataire']['4']['contenu']['tableauMessage'][] = $contenu;

    // Réencoder les données en JSON
    $updated_json = json_encode($data);

    // Écrire les données mises à jour dans le fichier JSON
    file_put_contents('historiqueS_messages.json', $updated_json);

    // Afficher un message de confirmation
    echo 'PHP Fait';
}
*/


/*


// Charger le fichier JSON
//fetch('historiqueS_messages.json')
 // Charger le JSON depuis un fichier ou une source de données
monTableauJSON = json_decode(file_get_contents('historiqueS_messages.json'), true);
  .then(response => response.json())
  .then(data => {
    // Accéder à la clé "tableauTimestamp" et compter le nombre de valeurs
    var nombreDeValeurs = data.utilisateur["2"].destinataire["4"].contenu.tableauTimestamp.length;

// Ajouter le nouveau timestamp au tableau
monTableauJSON.utilisateur["2"].destinataire["4"].contenu.tableauTimestamp.push(timestamp);

    // Afficher le nombre de valeurs dans la console
    console.log("Nombre de valeurs dans la clé 'tableauTimestamp': " + nombreDeValeurs);
// Afficher la longueur du tableau dans la console
console.log("Nouvelle longueur du tableau 'tableauTimestamp': " + data.utilisateur["2"].destinataire["4"].contenu.tableauTimestamp.length);

  })
  .catch(error => {
    console.error('Erreur lors du chargement du fichier JSON :', error);
  });

    // Réencoder le tableau mis à jour en JSON
    $monTableauJSON_encode = json_encode($monTableauJSON);

alert('fait');
*/

/*
foreach ($resultat as $traitementRequete) {

$i=1;
 
    // Charger le JSON depuis un fichier ou une source de données
    $monTableauJSON = json_decode(file_get_contents('historiqueS_messages.json'), true);
    
    // Ajouter une nouvelle valeur en dernière position
    $monTableauJSON['tableauTimestamp'][$i] = $traitementRequete['timestamp_message'];
    $monTableauJSON['tableauMessage'][$i] = $traitementRequete['messageposte'];

    
    // Réencoder le tableau mis à jour en JSON
    $monTableauJSON_encode = json_encode($monTableauJSON);

}



utilisateur['2']destinataire['4']contenu['tableauTimestamp['']']

    "utilisateur": {
        "2": {
            "destinataire": {
                "4": {
                    "contenu": {
                        "tableauTimestamp": ["1704659982273", "1704659992641", "1704661143870", "1704663072727"],
                        "typeDuMessage": ["text", "text", "text", "text"],
                        "tableauMessage": ["coucou", "coucou", "je teste", "ceci est un test pour voir si ça marche"]
                    }














*/
?>