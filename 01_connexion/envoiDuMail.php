<?php
include '../../conectBDD.php'; //connection a la BDD

$utilisateur=htmlspecialchars($_POST['utilisateurPseudo']);//recupere le Pseudo
$heureDemande=htmlspecialchars($_POST['heureLocale']);//recupere le Pseudo
$dateDemande=htmlspecialchars($_POST['dateLocale']);//recupere le Pseudo
$finValiditeToken=htmlspecialchars($_POST['dateActuellePlusUn']);//recupere le Pseudo

//$date_heureDemande=htmlspecialchars($_POST['D_H_Demande']);

$mailPourDev="toto@gmail.com";
$clefMessagerie= 'azertyuiop';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/Exception.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/PHPMailer.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);


//Génération d'un jeton unique : 
$token = bin2hex(random_bytes(32)); 


try {
    $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($utilisateur));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
//$nombreDeLignes = $stmt->rowCount();
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
$pseudo=$resultat['ID_utilisateur'];//obtenir l'ID de l'utilisateur

//$adressemail=$resultat['mail'];// Decommenter cette ligne, et commenter celle du dessous, quand le  site sera actif    
$adressemail=$mailPourDev; // adresse pour les tests/developpement    


function genererMotDePasse() { //code de validation affiche sur la page de connexion au moment de la demande de reinitialisation du mot de passe. il sera demande pour valider le changement de mot de passe
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $motDePasse = '';
    $longueurCaracteres = strlen($caracteres);
    for ($i = 0; $i < 8; $i++) {
        // Sélectionner un caractère aléatoire parmi les caractères disponibles
        $caractereAleatoire = $caracteres[rand(0, $longueurCaracteres - 1)];
        // Ajouter le caractère à la chaîne du mot de passe
        $motDePasse .= $caractereAleatoire;
    }
    return $motDePasse;
  } 
  $validationChangementMDP=genererMotDePasse();// afficher le code de validation sur la page de connexion, grace au retour de requete AJAX



// ==> enregistrment de la date/heure de fin de validite (date(...)), du token envoye par mail ($token), et du code validation
    try {
        $query = "UPDATE forum_utilisateur SET tokenRecuperation=?, validiteToken=?, codeValidation=?  WHERE ID_utilisateur=?";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$token, $finValiditeToken, $validationChangementMDP, $pseudo]); 
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
// <== enregistrment de la date/heure de fin de validite (date(...)), du token envoye par mail ($token), et du code validation



// ==> enregistrment du token sur "journal_tokenutilise"JSON
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ID_Secu_Utilisateur=hash('sha512', $pseudo);// ID de l'utilisateur
        $token_Secu_Utilisateur=hash('sha512', $token);//token
        // Charger le contenu du fichier JSON
        $json_file = file_get_contents('../../bibliotheque/01_connexion/journalToken.json');
        $data = json_decode($json_file, true);

        // Ajouter les nouvelles données au tableau JSON
        $data['utilisateur'][] = $ID_Secu_Utilisateur;
        $data['token'][] = $token_Secu_Utilisateur;
        
        // Réencoder les données en JSON
        $updated_json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        // Écrire les données mises à jour dans le fichier JSON
        file_put_contents('../..//bibliotheque/01_connexion/journalToken.json', $updated_json);

    //}
// <== enregistrment du token sur "journal_tokenutilise"JSON
// ==> enregistrment du token sur "journal_tokenutilise"BDD
    $ID_Secu_Utilisateur=hash('sha256', $pseudo);// ID de l'utilisateur
    $token_Secu_Utilisateur=hash('sha256', $token);//token

    try {
        $sql = "INSERT INTO journal_tokenutilise(utilisateur,refDemande) VALUES (?,?)";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array($ID_Secu_Utilisateur,$token_Secu_Utilisateur));
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
// <== enregistrment du token sur "journal_tokenutilise"BDD




//lien de réinitialisation : 
$lienAEnvoyer='http://forum/recup.php?pseudo='.$utilisateur.'&mail='.$adressemail.'&refDemande='.$token;

// OBJET DU MAIL
$nomDuSite='neo-rétro WLM';
$objetMail= 'Réinitialisation du mot de passe';

// CORP DU MAIL (HTML/CSS)
/*
$date = time();
$dateDemande = date('d/m/Y',$date);
$heureDemande=date('H:i',$date);
*/
$corpMail='Bonjour '.$utilisateur.'.<br><br>'.

'Le '.$dateDemande.' à '.$heureDemande.', vous avez fait une demande de réinitialisation de votre mot de passe.<br><br>'.

"Vous trouverez ci-joint un lien permettant de le faire.
<a href='".$lienAEnvoyer."'>lien de réinitialisation</a>
Veuillez noter au bout de 1 heure a compter de l'heure mentioné plus haut de ce présent message, le lien ne sera plus correct, vous devrez alors refaire une demande.<br><br>

Lors de votre réinitialisation, il vous sera demandé, un code de validation, il se trouve sous la case que vous avez coché pour le renouvellement de mot de passe.
";

//CORP DU MAIL (ALTBODY)
$corpMail_alt=`

`;

//PARAMETRES ET ENVOI

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;//Enable verbose debug output
    $mail->isSMTP();//Send using SMTP
    $mail->Host       = 'smtp.gmail.com';//Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $adressemail;                     //SMTP username
    $mail->Password   = $clefMessagerie;                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($adressemail, $nomDuSite);
    //$mail->addAddress($adressemail, 'Joe User');     //Add a recipient
    //$mail->addAddress($adressemail);               //Name is optional
    //$mail->addReplyTo($adressemail, 'Information');
    $mail->addCC($adressemail);
    //$mail->addBCC($adressemail);

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  $objetMail;

    $mail->Body    = $corpMail;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //$mail->send();


    echo "code de validation, à renseigner lors du renouvellement du mot de passe : ".$validationChangementMDP;
} catch (Exception $e) {
    echo "Le message n'a pas pu etre envoyer, reeseyer?: {$mail->ErrorInfo}";
}








