<?php
include '../../conectBDD.php'; //connection a la BDD

$utilisateur=htmlspecialchars($_POST['utilisateurPseudo']);//recupere le Pseudo

$mailPourDev="toto@gmail.com";
$clefMessagerie= 'azertyuiop';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/Exception.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/PHPMailer.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);



$ipEnCours=$_SERVER['REMOTE_ADDR'];
$secuPartie1=hash('sha256', $ipEnCours);
$secuPartie2=hash('sha512', $ipEnCours);

//info dans le lien envoye par mail
    //token
    //@mail
    //id




//==>@mail + IP
// ==> position dans BDD
    //chercher dans table "liste_noire"
        //PRESENT
            //==>sa position (id)
            // BOOL => true    
        //ABSENT
            //==>sa position (id)
            // BOOL_BDD => true    
// <== position dans BDD

// ==> position dans JSON
    //chercher dans "liste_noire.json"
        //PRESENT
            //==>sa position (id)
            // BOOL_JSON => true    
        //ABSENT
            //==>sa position [id]
            // BOOL => true    
// <== position dans JSON

// BOOL_BDD==true ou BOOL_JSON==true  ===> intrusion revele
    // ==> blocage définitif de l'IP
    // ==> redirection vers une page (google par ex)
    // ==> correction des modifications
    // ==> alerte mail envoyé au detenteur du site (et au webmaster)

// BOOL_BDD==true et BOOL_JSON==true  ===> utilisateur bloque
    //redirection vers page de bloquage

// BOOL_BDD==false et BOOL_JSON==false  ===> utilisateur normal
    //continuer



try {
    $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($utilisateur));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
//$nombreDeLignes = $stmt->rowCount();
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);
$pseudo=$resultat['ID_utilisateur'];


//$adresseail=$resultat['mail'];// Decommenter cette ligne, et commenter celle du dessous, quand le  site sera actif    
$adresseail=$mailPourDev; // adresse pour les tests/ en developpement    

//Formulaire de demande de réinitialisation de mot de passe : 
//Créez une page où les utilisateurs peuvent saisir leur adresse e-mail pour demander une réinitialisation de mot de passe.


 



//Génération d'un jeton unique : 
//Lorsqu'un utilisateur demande une réinitialisation de mot de passe, générez un jeton unique (par exemple, un jeton aléatoire) associé à leur compte utilisateur. Ce jeton servira de lien sécurisé pour réinitialiser le mot de passe.
$token = bin2hex(random_bytes(32)); // Utilisez une méthode sécurisée pour générer un jeton


//Stockage du jeton : 
//Stockez ce jeton associé à l'utilisateur dans votre base de données, enregistrez également une date d'expiration pour le jeton.



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
    $stmt->execute([$token, date('Y-m-d H:i:s', strtotime('+1 hour')), $validationChangementMDP, $pseudo]); 
    } catch (Exception $e) {
        print "Erreur ! " . $e->getMessage() . "<br/>";
    }
// <== enregistrment de la date/heure de fin de validite (date(...)), du token envoye par mail ($token), et du code validation
// ==> enregistrment du token sur "journal_tokenutilise"

// <== enregistrment du token sur "journal_tokenutilise"





//Envoi du lien de réinitialisation : 
//Envoyez un e-mail à l'utilisateur contenant un lien vers une page sur votre site où ils peuvent réinitialiser leur mot de passe. Le lien doit inclure le jeton unique comme paramètre dans l'URL.

 //<a href="http://forum/index.php"> lien </a> //PROBLEME D4INSTALATION DE CERTIFICAT SSL, DONC PAS D'ENVOIS POSSIBLE DE LIEN

// OBJET DU MAIL
$nomDuSite='neo-rétro WLM';
$objetMail= 'Réinitialisation du mot de passe';
// CORP DU MAIL (HTML/CSS)
$date = time();
$dateDemande = date('d/m/Y',$date);
$heureDemande=date('H+1:i',$date);

$corpMail='Bonjour '.$utilisateur.'.<br><br>'.

'Le '.$dateDemande.' à '.$heureDemande.', vous avez fait une demande de réinitialisation de votre mot de passe.<br><br>'.

"Vous trouverez ci-joint un lien permettant de le faire.
<a href='http://forum/index.php'>lien de réinitialisation</a>
Veuillez noter au bout de 1 heure a compter de l'heure mentioné plus haut de ce présent message, le lien ne sera plus correct, vous devrez alors refaire une demande.<br><br>

Lors de votre réinitialisation, il vous sera demandé, un code de validation, il se trouve sous la case que vous avez coché pour le renouvellement.
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
    $mail->Username   = $mailPourDev;                     //SMTP username
    $mail->Password   = $clefMessagerie;                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mailPourDev, $nomDuSite);// mailer = nom qui va apparaitre
    //$mail->addAddress($mailPourDev, 'Joe User');     //Add a recipient
    //$mail->addAddress($mailPourDev);               //Name is optional
    //$mail->addReplyTo($mailPourDev, 'Information');
    $mail->addCC($mailPourDev);
    //$mail->addBCC($mailPourDev);

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =  $objetMail;

    $mail->Body    = $corpMail;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Le message n'a pas pu etre envoyer, reeseyer?: {$mail->ErrorInfo}";
}








