<?php 	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contenubrut= urldecode($_POST['contenu']);
    $contenu = mb_convert_encoding($contenubrut, 'UTF-8', 'UTF-8');
    $timestamp = $_POST['timestamp'];
    $type = $_POST['type'];
    $PseudoExpediteur=$_POST['PseudoExpediteur'];
    $PseudoDestinataire=$_POST['PseudoDestinataire'];
    $LangueUtilisee=$_POST['LangueUtilisee'];
    // Charger le contenu du fichier JSON
    $json_file = file_get_contents('historiqueS_messages.json');
    $data = json_decode($json_file, true);

    // Ajouter les nouvelles données au tableau JSON
    $data['utilisateur']['2']['destinataire']['4']['contenu']['tableauTimestamp'][] = $timestamp;
    $data['utilisateur']['2']['destinataire']['4']['contenu']['typeDuMessage'][] = $type;
    $data['utilisateur']['2']['destinataire']['4']['contenu']['tableauMessage'][] = $contenu;
    $data['utilisateur']['2']['destinataire']['4']['contenu']['LangueDuMessage'][] = $LangueUtilisee;

    // Réencoder les données en JSON
    $updated_json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Écrire les données mises à jour dans le fichier JSON
    file_put_contents('historiqueS_messages.json', $updated_json);

    // Afficher un message de confirmation
    echo 'enregistrement Fait';
}
?>