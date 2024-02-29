<?php
// -------------------- BLOCAGE --------------------------------

// 0= blocage temporaire : le temps que l'utilisateur change son mot de passe, son profil est bloque, au cas ou ses données de compte soit piratées.(blocage au niveau pseudo)
// 1= 24h : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
// 2= 30jours  : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
// 3= 60jours  : au cas ou des activités annormales ont été découvertes, renouvelable 1 fois, avant de passer au niveu suivant.(blocage au niveau IP)
// 4= définitif  : trop d'activités annormales ont été découvertes, l'utilisateur ne pourra plus acceder au site.(blocage au niveau IP)

// ------------------- EN COURS ---------------------------------

include 'conectBDD.php'; //connection a la BDD

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/Exception.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/PHPMailer.php';
require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/SMTP.php';

// PARTIE 01 ==> -------------------------------------------------------------------------------------------------------------------------------------- RECUPERATION DES DONNEES TRANSMISE EN $_GET ==>
    //$pseudoutilisateur=htmlspecialchars($_GET['pseudo']);
    $pseudoutilisateur="Jean";
    //$mail=htmlspecialchars($_GET['mail']);
    $mail="michaloiret@gmail.com";
    //$token=htmlspecialchars($_GET['refDemande']);
    $token="123456789";
        $secuPartie1token=hash('sha256', $token);
        $secuPartie2token=hash('sha512', $token);
    $ipEnCours=$_SERVER['REMOTE_ADDR'];
// <== PARTIE 01 -------------------------------------------------------------------------------------------------------------------------------------- <== RECUPERATION DES DONNEES TRANSMISE EN $_GET

// PARTIE 02 ==> --------------------------------------------------------------------------------------------------------------------------------------------------------- VERIFICATION DES DONNEES ==>
    // PARTIE 02.01 ==> ------------------------------------------------------------------------------------------------------------------------------- LE "PSEUDO" DU LIEN EXISTE T'IL DANS LA BDD ==>
        try {
            $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($pseudoutilisateur));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        //$nombreDeLignes = $stmt->rowCount();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignes = $stmt->rowCount();

        if ($nombreDeLignes==1) {//l'utilisateur existe
            $pseudo=$resultat['ID_utilisateur'];

            try {
                $query = "SELECT * FROM  forum_utilisateur WHERE ID_utilisateur=?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$pseudo]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $resultat_BDD_Utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $mailUtilisateur=$resultat_BDD_Utilisateur['mail'];
            $tokenDeRecuperation=$resultat_BDD_Utilisateur['tokenRecuperation'];
            $finDeValidite=$resultat_BDD_Utilisateur['validiteToken'];
            $codeVerification=$resultat_BDD_Utilisateur['codeValidation'];
    // <== PARTIE 02.01 ------------------------------------------------------------------------------------------------------------------------------- <== LE "PSEUDO" DU LIEN EXISTE T'IL DANS LA BDD

    // PARTIE 02.02 ==> --------------------------------------------------------------------------------------------------------------------------- DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN ==>
        //date et heure actuelle
            $date = time();
            $dateDemande = date('d/m/Y',$date);
            $heureDemande=date('H:i',$date);

            //date et heure inscrite sur la BDD
            $timestamp = intval($finDeValidite / 1000); 
            $dateFinValidite = date("d/m/Y", $timestamp);
            $heureFinValidite = date("H:i", $timestamp); 
        }else{ //l'utilisateur a modifié la partie "peudo" dans le lien
        //==> bloquage (IP)
        }

    // <== PARTIE 02.02 --------------------------------------------------------------------------------------------------------------------------- <== DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN

    // PARTIE 02.03 ==> --------------------------------------------------------------------------------------------------------------------- DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN (BDD) ==>
        try {// token dans journal ==>BDD
            $query = "SELECT * FROM  journal_tokenutilise WHERE refDemande=?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$secuPartie1token]); 
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatJournalToken = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignes = $stmt->rowCount();
        if ($nombreDeLignes==1) {
            $existanceBDD=true;
        }else{
            $existanceBDD=false;
        }
    // <== PARTIE 02.03 --------------------------------------------------------------------------------------------------------------------- <== DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN (BDD)

    // PARTIE 02.04 ==> -------------------------------------------------------------------------------------------------------------------- DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN (JSON) ==>
        // Charger le contenu du fichier JSON
        $contenuFichier = file_get_contents("bibliotheque/01_connexion/journalToken.json");

        // Décoder le contenu JSON en un tableau associatif
        $donnees = json_decode($contenuFichier, true);

        // Vérifier si la valeur de $token est présente dans le tableau associatif
        if (in_array($secuPartie2token, array_column($donnees, 'token'))) {
            $existanceJSON=true;
        } else {
            $existanceJSON=false;
        }
    // <== PARTIE 02.04 -------------------------------------------------------------------------------------------------------------------- <== DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN (JSON)

    // PARTIE 02.05 ==> ------------------------------------------------------------------------------------------------------------------------------------------------ TOKEN EN COURS DE VALIDITE ==>
        try {// token dans journal ==>BDD
            $query = "SELECT * FROM  forum_utilisateur WHERE tokenRecuperation=?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$secuPartie1token]); 
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatJournalUtilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignesJournalUtilisateur = $stmt->rowCount();
        if ($nombreDeLignesJournalUtilisateur==1) {
            $existanceJournalUtilisateur=true;
        } else {
            $existanceJournalUtilisateur=false;
        }
    // <== PARTIE 02.05 ------------------------------------------------------------------------------------------------------------------------------------------------ <== TOKEN EN COURS DE VALIDITE

    // PARTIE 02.06 ==> ----------------------------------------------------------------------------------------------- RECUPERATION DU NIVEAU DE BLOQUAGE ET DU NOMBRE D'AVERTISSEMENT LIEE A L'IP ==>
        try {// token dans journal ==>BDD
            $query = "SELECT * FROM  repertoirebloquage WHERE IP=?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$ipEnCours]); 
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $resultatUtilisateurBloque = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombreDeLignesUtilisateurBloque_DansBDD = $stmt->rowCount();


        if ($nombreDeLignesUtilisateurBloque_DansBDD>=1) {
            $nombreDeLignesUtilisateurBloque=$nombreDeLignesUtilisateurBloque_DansBDD;
            $resultatUtilisateurBloque_avertissement=$resultatUtilisateurBloque["avertissement"];
            $resultatUtilisateurBloque_niveau=$resultatUtilisateurBloque["niveau"];

        }else{
            $nombreDeLignesUtilisateurBloque=0;
            $resultatUtilisateurBloque_avertissement="";
            $resultatUtilisateurBloque_niveau="";
        }
    // <== PARTIE 02.06 ----------------------------------------------------------------------------------------------- <== RECUPERATION DU NIVEAU DE BLOQUAGE ET DU NOMBRE D'AVERTISSEMENT LIEE A L'IP
// <== PARTIE 02 ---------------------------------------------------------------------------------------------------------------------------------------------------------<==  VERIFICATION DES DONNEES

// PARTIE 03 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------ ACTIONS EN FONCTION DES CAS ==>
    if ($existanceBDD AND $existanceJSON) {// dans bdd et json
        if ($existanceJournalUtilisateur AND $dateFinValidite==$dateDemande AND $heureDemande<=$heureFinValidite) {//en cours de validité
            if ($tokenDeRecuperation===$secuPartie1token) {//token rattaché au bon ID
                //==>Renouvellement
                //supprimer token de forum_utilisateur (=>token plus utilisable)
                // en fin de procedure retirer bloquage temporaire (rendre inactif)
            }else{// La variable "pseudo" ou le token ont ete change dans le lien
                avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudo);

            }
        }else{
            if ($tokenDeRecuperation===$secuPartie1token) {//token rattaché au bon ID
                renvoyerMailNormal();// l'utilisateur a attendu trop longtemps avant de renouveler son mot de passe; token périmé. renvoi d'un mail pour le renouvelement.
                // code de validation affiché sur cette page + message l'informant qu'il a trop attendu.
            }else{
                avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudo);

            }
        }
    }else{
        avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudo);

        //envoi d'un mail d'alerte au gérant du site (et webmaster) ==> des donnees ont ete modifier dans la BDD ou dans le fichier JSON
    }
// <== PARTIE 03 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== ACTIONS EN FONCTION DES CAS


function avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudo){
    include 'conectBDD.php'; //connection a la BDD

    if ($nombreDeLignesUtilisateurBloque>=1) {//si l'Ip (ou l'ID pseudo) a déjà été bloqué, ou as reçu un ou plusieurs avertissements dans le passé
        if ($resultatUtilisateurBloque_avertissement==2) {//si il a deja recu 2 avertissements. $resultatUtilisateurBloque['niveau'] +1  

            $niveauBlocquageSuperieur = ($resultatUtilisateurBloque_niveau == null) ? 1 : $resultatUtilisateurBloque_niveau + 1;
            try {
                $query = "UPDATE repertoirebloquage SET actif=?, avertissement=?, niveau=?, timestampblocage=?  WHERE IP=?";
                $stmt = $bdd->prepare($query);
                $stmt->execute([1, 0, $niveauBlocquageSuperieur, $date, $ipEnCours]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }

            try {
                $query = "UPDATE forum_utilisateur SET tokenRecuperation=null, validiteToken=null, codeValidation=null WHERE ID_utilisateur =?";//suppresion des donnees de renouvelement du tableau utilisateur
                $stmt = $bdd->prepare($query);
                $stmt->execute([$pseudo]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }

            if ($niveauBlocquageSuperieur==4) {// Si, au vu de trop grands nombre d'infractions, l'utilisateur se retrouve au niveau de blocage 4 (definitif)

                //redirection vers page blache "vous avez été bloqué définitivement du sité à cause de trop nombreuses infraction au réglement. Vous ne pouvez plus accéder au site. si vous voulez contester la sanction, adresser un mail a ... .
                    $variable1 = "valeur1";
                    $variable2 = "valeur2";
                // Redirection avec les variables
                    //header("Location: utilisateurBloque.php?var1=" . urlencode($variable1) . "&var2=" . urlencode($variable2));
                    //exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
                    //----------------------------------------------------------------------
                        /*
                            // Récupération des variables passées
                            $variable1_recue = $_GET['var1'];
                            $variable2_recue = $_GET['var2'];

                            // Utilisation des variables reçues
                            echo "Variable 1 : " . $variable1_recue . "<br>";
                            echo "Variable 2 : " . $variable2_recue . "<br>";
                        */
                    //----------------------------------------------------------------------

                //mail a l'utilisateur lui notifiant son blocage

            }else{//redirection vers page de bloquage utilisateur avec temps restant avant débloquage
                //redirection vers page de bloquage utilisateur avec temps restant avant débloquage
                    $variable1 = "valeur1";
                    $variable2 = "valeur2";
                // Redirection avec les variables
                    //header("Location: utilisateurBloque.php?var1=" . urlencode($variable1) . "&var2=" . urlencode($variable2));
                    //exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
                    //----------------------------------------------------------------------
                        /*
                            // Récupération des variables passées
                            $variable1_recue = $_GET['var1'];
                            $variable2_recue = $_GET['var2'];

                            // Utilisation des variables reçues
                            echo "Variable 1 : " . $variable1_recue . "<br>";
                            echo "Variable 2 : " . $variable2_recue . "<br>";
                        */
                    //----------------------------------------------------------------------

                //mail a l'utilisateur lui notifiant son blocage

            }
        }else{
            $niveauAvertissementSuperieur = ($resultatUtilisateurBloque_avertissement == null) ? 1 : $resultatUtilisateurBloque_avertissement + 1;
            try {
                $query = "UPDATE repertoirebloquage SET avertissement=? WHERE IP=?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$niveauAvertissementSuperieur, $ipEnCours]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
        }
    }else{// l'utilisateur n'a jamais eu d'avertissements
        //header("Location: index.php");
        /*
        try {
            $sql = "INSERT INTO repertoirebloquage(IP, pseudo, actif, avertissement, niveau, timestampblocage) VALUES (?,?,?,?,?,?)";// $ipEnCours $pseudo 0 1 0 $date
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($ipEnCours, $pseudo, 0, 1, 0, $date));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
    
*/








    }

}



function renvoyerMailNormal(){
    $mailPourDev="toto@gmail.com";
    $clefMessagerie= 'azertyuiop';

    //$adressemail=$resultat['mail'];// Decommenter cette ligne, et commenter celle du dessous, quand le  site sera actif    
    $adressemail=$mailPourDev; // adresse pour les tests/ en developpement    

    $mail = new PHPMailer(true);

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




    //Envoi du lien de réinitialisation : 
    //Envoyez un e-mail à l'utilisateur contenant un lien vers une page sur votre site où ils peuvent réinitialiser leur mot de passe. Le lien doit inclure le jeton unique comme paramètre dans l'URL.

    //<a href="http://forum/index.php"> lien </a> //PROBLEME D4INSTALATION DE CERTIFICAT SSL, DONC PAS D'ENVOIS POSSIBLE DE LIEN

    //lien de réinitialisation : 
    $lienAEnvoyer='http://forum/recup.php?pseudo='.$pseudoutilisateur.'&mail='.$adressemail.'&refDemande='.$token;

    // OBJET DU MAIL
    $nomDuSite='neo-rétro WLM';
    $objetMail= 'Réinitialisation du mot de passe';

    // CORP DU MAIL (HTML/CSS)
    /*
    $date = time();
    $dateDemande = date('d/m/Y',$date);
    $heureDemande=date('H:i',$date);
    */
    $corpMail='Bonjour '.$pseudoutilisateur.'.<br><br>'.

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

}

/*

$objetMail= 'Réinitialisation du mot de passe';

                    // CORP DU MAIL (HTML/CSS)
                    /*
                    $date = time();
                    $dateDemande = date('d/m/Y',$date);
                    $heureDemande=date('H:i',$date);
                   
$corpMail='Bonjour '.$utilisateur.'.<br><br>'.

                            'Le '.$dateDemande.' à '.$heureDemande.', vous avez fait une demande de réinitialisation de votre mot de passe.<br><br>'.

                            "Vous trouverez ci-joint un lien permettant de le faire.
                            <a href='".$lienAEnvoyer."'>lien de réinitialisation</a>
                            Veuillez noter au bout de 1 heure a compter de l'heure mentioné plus haut de ce présent message, le lien ne sera plus correct, vous devrez alors refaire une demande.<br><br>

                            Lors de votre réinitialisation, il vous sera demandé, un code de validation, il se trouve sous la case que vous avez coché pour le renouvellement de mot de passe.
                            ";

                            //CORP DU MAIL (ALTBODY)
$corpMail_alt


*/