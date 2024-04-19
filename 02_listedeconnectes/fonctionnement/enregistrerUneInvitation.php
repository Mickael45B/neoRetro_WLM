<?php

//enregistrerUneInvitation
include '../../conectBDD.php'; // connection a la base de donnees
require '../../vendor/autoload.php';

$destinataire = htmlspecialchars($_POST['destinataire']);
$utilisateur = htmlspecialchars($_POST['utilisateur']);
$dateHeureInvitation = htmlspecialchars($_POST['dateHeureInvitation']);
$messageInvitation = htmlspecialchars($_POST['messageInvitation']);

//`pseudo`, `ID_utilisateur `, `ID_destinataire`, `timestamp_invitation`, `messageDInvitation`


try {
    $sql = "SELECT `pseudo`, `ID_utilisateur` FROM  forum_utilisateur  WHERE BINARY pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($utilisateur));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
$nombreDeLignes = $stmt->rowCount();
$IDutilisateur=$resultat['ID_utilisateur'];



try {
    $sql = "SELECT `pseudo`, `ID_utilisateur` FROM  forum_utilisateur  WHERE BINARY pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($destinataire));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
$nombreDeLignes = $stmt->rowCount();
$IDdestinataire=$resultat['ID_utilisateur'];



try {
    $sql = "INSERT INTO forum_invitation(ID_utilisateur, ID_destinataire, timestamp_invitation, messageDInvitation) VALUES (?,?,?,?)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($IDutilisateur, $IDdestinataire, $dateHeureInvitation, $messageInvitation));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
echo  $destinataire." tu vois ça? ".$utilisateur." et ".$dateHeureInvitation." et ".$messageInvitation;


// Connexion à la base de données MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->utilisateurs_invitation;
$collection = $database->requetes_invitation;

// Vérifier si les données existent déjà dans la collection
$existingData = $collection->findOne([
    'ID_de_l_utilisateur' => $IDutilisateur,
    'ID_du_destinataire' => $IDdestinataire,
]);




if (!$existingData) {
    // Les données n'existent pas, on peut les insérer dans la collection
    $document = [
        'ID_de_l_utilisateur' => $IDutilisateur,
        'ID_du_destinataire' => $IDdestinataire,
        'timestamp_invitation' => $dateHeureInvitation,
        'messageDInvitation' => $messageInvitation
    ];

    // Utilisation de $addToSet pour éviter les doublons
    $result = $collection->updateOne(
        ['ID_de_l_utilisateur' => $IDutilisateur],
        ['$addToSet' => ['invitations' => $document]],
        ['upsert' => true]
    );

    if ($result->getModifiedCount() > 0) {
        echo "Données insérées avec succès dans MongoDB.";
    } else {
        echo "Les données existent déjà dans la collection.";
    }
} else {
    echo "Les données existent déjà dans la collection.";
}


