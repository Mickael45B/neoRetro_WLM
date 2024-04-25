<head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="bibliotheque/00_GENERAL/logo.png" type="image/ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Ephesis&family=Festive&display=swap" rel="stylesheet">

        <title>
            neo-retro WLM
        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1"><meta charset="UTF-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js"></script>
        <script  type ="module"  src ="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script> 
        
	</head>

<?php
//recuperation.php
// ------------------- EN COURS ---------------------------------

    include 'conectBDD.php'; //connection a la BDD

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/Exception.php';
    require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/PHPMailer.php';
    require 'C:/Users/Proprietaire/Desktop/forum/PHPMailer/src/SMTP.php';
// ----------------------------------------------------

// PARTIE 01 ==> -------------------------------------------------------------------------------------------------------------------------------------- RECUPERATION DES DONNEES TRANSMISE EN $_GET ==>
    $pseudoutilisateur=htmlspecialchars($_GET['pseudo']);
    $mail=htmlspecialchars($_GET['mail']);
    $token=htmlspecialchars($_GET['refDemande']);
        $secuPartie1token=hash('sha256', $token);
        $secuPartie2token=hash('sha512', $token);
    $ipEnCours=$_SERVER['REMOTE_ADDR'];
    $codeValidationReenvoiMail=genererMotDePasse();
    //NOTE : les niveaux de bloquage sont detaillé sur le fichier "utilisateurBloque.php"
// <== PARTIE 01 -------------------------------------------------------------------------------------------------------------------------------------- <== RECUPERATION DES DONNEES TRANSMISE EN $_GET

// PARTIE 02 ==> --------------------------------------------------------------------------------------------------------------------------------------------------------- VERIFICATION DES DONNEES ==>
    // PARTIE 02.01 ==> ------------------------------------------------------------------------------------------------------------------------------- LE "PSEUDO" DU LIEN EXISTE T'IL DANS LA BDD ==>
        //Etape 01 : chercher le pseudo dans la BDD
            try {
                $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
                $stmt = $bdd->prepare($sql);
                $stmt->execute(array($pseudoutilisateur));
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombreDeLignes = $stmt->rowCount();
        //Etape 02 : recuperer l'ID de l'utilisateur
            if ($nombreDeLignes==1) {
                $pseudo=$resultat['ID_utilisateur'];// ID de l'utilisateur
        //Etape 03 : chercher l'ID' dans la BDD
            try {
                $query = "SELECT * FROM  forum_utilisateur WHERE ID_utilisateur=?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$pseudo]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            $resultat_BDD_Utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        //Etape 04 : recuperer les donnees de cet utilisateur
            $mailUtilisateur=$resultat_BDD_Utilisateur['mail'];// obtenir son adresse mail
            $tokenDeRecuperation=$resultat_BDD_Utilisateur['tokenRecuperation'];// obtenir le jeton 
            $tokenDeRecuperationhash=hash('sha256', $tokenDeRecuperation);
            $finDeValidite=$resultat_BDD_Utilisateur['validiteToken'];// obtenir la limite de validite de son jeton
            $codeVerification=$resultat_BDD_Utilisateur['codeValidation'];// obtenir le code de validation qu'il devra renseigner
    // <== PARTIE 02.01 ------------------------------------------------------------------------------------------------------------------------------- <== LE "PSEUDO" DU LIEN EXISTE T'IL DANS LA BDD

    // PARTIE 02.02 ==> --------------------------------------------------------------------------------------------------------------------------- DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN ==>
        //Etape 01 : date et heure actuelle
            $date = time();

            $dateDemande = date('d/m/Y',$date);
            $heureDemande=date('H:i',$date);

        //Etape 02 : date et heure inscrite sur la BDD
            $timestamp = intval($finDeValidite / 1000); 
            $dateFinValidite = date("d/m/Y", $timestamp);
            $heureFinValidite = date("H:i", $timestamp); 

            $timestamp2 = intval($date / 1000); 
            $heureFinValidite2 = date("H:i", $timestamp2); 
                
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
        //Etape 01 :  Charger le contenu du fichier JSON
            $contenuFichier = file_get_contents("bibliotheque/01_connexion/journalToken.json");
        //Etape 02 :  Décoder le contenu JSON en un tableau associatif
            $donnees = json_decode($contenuFichier, true);

        //Etape 03 :  Vérifier si la valeur de $token est présente dans le tableau associatif
            $cle = in_array($secuPartie2token, $donnees['token']);
            if ($cle !== false) {
                $existanceJSON=true;
            } else {
                $existanceJSON=false;
            }
    // <== PARTIE 02.04 -------------------------------------------------------------------------------------------------------------------- <== DATE ET HEURE POUR EVALUER LA VALIDITE DU TOKEN (JSON)

    // PARTIE 02.05 ==> ------------------------------------------------------------------------------------------------------------------------------------------------ TOKEN EN COURS DE VALIDITE ==>
        try {// token dans journal ==>BDD
            $query = "SELECT * FROM  forum_utilisateur WHERE tokenRecuperation=?";
        $stmt = $bdd->prepare($query);
        $stmt->execute([$token]); 
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
            if ($tokenDeRecuperationhash===$secuPartie1token) {//token rattaché au bon ID
    //Cas 01 :  token : répertorie dans BDD et fichier JSON / token : valide et en cours de validite / token correspondant a l'ID utilisateur 
        //Etape 01 :  insertion du formulaire de renouvellement (sur un autre fichier)
                include "renouvelement.php";// formulaire de renouvellement
        //Etape 02 :  suppression des données néssaisaire au renouvellement apres qu'il ait ete utilises
            /*
            try {
                $query = "UPDATE forum_utilisateur SET tokenRecuperation=null, validiteToken=null, codeValidation=null WHERE ID_utilisateur =?";
                $stmt = $bdd->prepare($query);
                $stmt->execute([$pseudo]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            */
        //Etape 03 : desactiver le blocage
            /*
            try {
                $query = "UPDATE repertoirebloquage SET actif=0 WHERE ID_utilisateur =?";
                $stmt = $bdd->prepare($query);
                $stmt->execute([$pseudo]); 
            } catch (Exception $e) {
                print "Erreur ! " . $e->getMessage() . "<br/>";
            }
            */
    //Cas 02 :  token : répertorie dans BDD et fichier JSON / token : valide et en cours de validite / token ne correspondant pas a l'ID utilisateur 
            }else{// La variable "pseudo" ou le token ont ete change dans le lien
                avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudoutilisateur,$token);
                enregistrerDansMouchard($ipEnCours, $date, $resultatUtilisateurBloque_niveau, $resultatUtilisateurBloque_avertissement,$pseudo);
            }
        }else{
    //Cas 03 :  token : répertorie dans BDD et fichier JSON / token : non valide et/ou périmé / token  correspondant a l'ID utilisateur 
            if ($tokenDeRecuperationhash===$secuPartie1token) {//token rattaché au bon ID
                renvoyerMailNormal($pseudoutilisateur, $pseudo, $codeValidationReenvoiMail);// l'utilisateur a attendu trop longtemps avant de renouveler son mot de passe; token périmé. renvoi d'un mail pour le renouvelement.
                // code de validation affiché sur cette page + message l'informant qu'il a trop attendu.
                echo $codeValidationReenvoiMail ;
            }else{
    //Cas 04 :  token : répertorie dans BDD et fichier JSON / token : non valide et/ou périmé / token ne correspondant pas a l'ID utilisateur 
                avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudoutilisateur,$token);
                enregistrerDansMouchard($ipEnCours, $date, $resultatUtilisateurBloque_niveau, $resultatUtilisateurBloque_avertissement,$pseudo);
            }
        }
        }else{
    //Cas 05 :  token : répertorie soit dans BDD soit dans fichier JSON 
        avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudoutilisateur,$token);
        enregistrerDansMouchard($ipEnCours, $date, $resultatUtilisateurBloque_niveau, $resultatUtilisateurBloque_avertissement,$pseudo);
        //envoi d'un mail d'alerte au gérant du site (et webmaster) ==> des donnees ont ete modifies dans la BDD ou dans le fichier JSON
        }
// <== PARTIE 03 ------------------------------------------------------------------------------------------------------------------------------------------------------ <== ACTIONS EN FONCTION DES CAS

// PARTIE 04 ==> ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ FONCTIONS ==>
    //Fonction 01 : generer une suite de 8 caracteres (code) aleatoire
        function genererMotDePasse() { 
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
            //code de validation affiche sur la page de connexion au moment de la demande de reinitialisation du mot de passe. il sera demande pour valider le changement de mot de passe
        } 
    //Fonction 02 : mettre un avertissement ou bloquer un utilisateur
        function avertissement_bloquage( $nombreDeLignesUtilisateurBloque, $resultatUtilisateurBloque_avertissement, $resultatUtilisateurBloque_niveau, $date, $ipEnCours, $pseudoutilisateur,$token){
                include 'conectBDD.php'; //connection a la BDD
                if ($nombreDeLignesUtilisateurBloque>=1) {
                    if ($resultatUtilisateurBloque_avertissement==2) {
            //Cas 01 : IP deja bloque dans le passé / IP a déja eu 2 avertissements
                        $niveauBlocquageSuperieur = ($resultatUtilisateurBloque_niveau == null) ? 1 : $resultatUtilisateurBloque_niveau + 1;// on augmente le niveau de bloquge de 1
                        try {
                            $query = "UPDATE repertoirebloquage SET actif=?, avertissement=?, niveau=?, timestampblocage=?  WHERE IP=?";
                            $stmt = $bdd->prepare($query);
                            $stmt->execute([1, 0, $niveauBlocquageSuperieur, $date, $ipEnCours]); 
                        } catch (Exception $e) {
                            print "Erreur ! " . $e->getMessage() . "<br/>";
                        }
                        $motdepassechange_partie1=genererMotDePasse();
                        $motdepassechange_partie2=genererMotDePasse();
                        $motdepassechange=$motdepassechange_partie1.$motdepassechange_partie2;// on attribut un nouveau mot de passe aleatoire, dans le cas ou l'utilisateur soit victime de vol de données

                        /*
                        try {
                            $query = "UPDATE forum_utilisateur SET tokenRecuperation=null, validiteToken=null, codeValidation=null,mot_de_passe=? WHERE ID_utilisateur =?";//suppresion des donnees de renouvelement du tableau utilisateur
                            $stmt = $bdd->prepare([$motdepassechange, $query]);
                            $stmt->execute([$pseudo]); 
                        } catch (Exception $e) {
                            print "Erreur ! " . $e->getMessage() . "<br/>";
                        }*/
                //Cas 01.01 : IP deja bloque dans le passé / IP a déja eu 2 avertissements / son niveau de bloquage actuel est de 5, soit le maximum
                        if ($niveauBlocquageSuperieur==5) {// Si, au vu de trop grands nombre d'infractions, l'utilisateur se retrouve au niveau de blocage 5 (definitif)

                            //redirection vers page blache "vous avez été bloqué définitivement du sité à cause de trop nombreuses infraction au réglement. Vous ne pouvez plus accéder au site. si vous voulez contester la sanction, adresser un mail a ... .
                                header("Location: utilisateurBloque.php?pseudo=" . urlencode($pseudoutilisateur) . "&token=" . urlencode($token)); 
                                exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
                //Cas 01.02 : IP deja bloque dans le passé / IP a déja eu 2 avertissements / son niveau de bloquage actuel est inferieur a 5
                        }else{//redirection vers page de bloquage utilisateur avec temps restant avant débloquage
                            //redirection vers page de bloquage utilisateur avec temps restant avant débloquage
                            header("Location: utilisateurBloque.php?pseudo=" . urlencode($pseudoutilisateur) . "&token=" . urlencode($token)); 
                                exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
                        }
            //Cas 02 : IP deja bloque dans le passé / IP a moins de 2 avertissements
                    }else{
                        $niveauAvertissementSuperieur = ($resultatUtilisateurBloque_avertissement == 0) ? 1 : $resultatUtilisateurBloque_avertissement + 1;//on lui met un avertissement
                        try {
                            $query = "UPDATE repertoirebloquage SET avertissement=? WHERE IP=?";
                        $stmt = $bdd->prepare($query);
                        $stmt->execute([$niveauAvertissementSuperieur, $ipEnCours]); 
                        } catch (Exception $e) {
                            print "Erreur ! " . $e->getMessage() . "<br/>";
                        }
                        //redirection vers page de bloquage utilisateur pour lui notifier son avertissement
                        header("Location: utilisateurBloque.php?pseudo=" . urlencode($pseudoutilisateur) . "&token=" . urlencode($token)); 
                        exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
                    }
            //Cas 03 : l'IP n'a jamais ete bloque
                }else{
                    /*
                    try {
                        $sql = "INSERT INTO repertoirebloquage(IP, pseudo, actif, avertissement, niveau, timestampblocage) VALUES (?,?,?,?,?,?)";// $ipEnCours $pseudo 0 1 0 $date
                        $stmt = $bdd->prepare($sql);
                        $stmt->execute(array($ipEnCours, $pseudo, 0, 1, 0, $date));
                    } catch (Exception $e) {
                        print "Erreur ! " . $e->getMessage() . "<br/>";
                    }
                    // message :"veuillez ne pas modifier les données transmise", ceci est un avertissement, si cela se reproduit nous seron dans l'obligation de prendre des sanctions a votre encontre.
                    */
                        //redirection vers page de bloquage utilisateur pour lui notifier son avertissement
                        header("Location: utilisateurBloque.php?pseudo=" . urlencode($pseudoutilisateur) . "&token=" . urlencode($token)); 
                        exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
                    
                }
        }
    //Fonction 03 : enregistrer l'infraction dans une BDD "mouchard"
        function enregistrerDansMouchard($ipEnCours, $date, $resultatUtilisateurBloque_niveau, $resultatUtilisateurBloque_avertissement,$pseudo){
            include 'conectBDD.php'; //connection a la BDD
            //Etape 01 : recuperer les donnees de navigations
                $userAgent = $_SERVER['HTTP_USER_AGENT'];
            //Etape 02 : recuperer l'IP
                    $ipUtilisateur=$ipEnCours;
            //Etape 03 : attribuer un numero de dossier aléatoire
                    $numeroDeDossier=genererMotDePasse();
            //Etape 04 : recuperer le timstamp du moment de l'infraction
                    $timestampUtilisateur=$date;
            //Etape 05 : recuperer le niveau de blocage
                    $niveauDeBloquage=$resultatUtilisateurBloque_niveau;
            //Etape 06 : recuperer le niveau d'avertissement
                    $nombreDAvertissements=$resultatUtilisateurBloque_avertissement;
            //Etape 07 : Détection du navigateur
                    if (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
                        $navigateur = 'Internet Explorer';
                    } elseif (strpos($userAgent, 'Firefox') !== false) {
                        $navigateur = 'Firefox';
                    } elseif (strpos($userAgent, 'Chrome') !== false) {
                        $navigateur = 'Chrome';
                    } elseif (strpos($userAgent, 'Safari') !== false) {
                        $navigateur = 'Safari';
                    } elseif (strpos($userAgent, 'Opera') !== false) {
                        $navigateur = 'Opera';
                    } else {
                        $navigateur = 'Autre';
                    }
            //Etape 08 : Détection du type d'appareil
                    if (strpos($userAgent, 'Mobile') !== false) {
                        $typeAppareil = 'Mobile';
                    } elseif (strpos($userAgent, 'Tablet') !== false) {
                        $typeAppareil = 'Tablette';
                    } else {
                        $typeAppareil = 'Ordinateur de bureau';
                    }
            //Etape 09 : inserer les données la bdd
                    try {
                        $sql = "INSERT INTO mouchard_avertissementsbloquage(dossier, IP, typeappareil, timestamp_infraction, navigateur, blocage, avertissement,pseudo) VALUES (?,?,?,?,?,?,?,?)";
                        $stmt = $bdd->prepare($sql);
                        $stmt->execute(array($numeroDeDossier, $ipUtilisateur, $typeAppareil, $timestampUtilisateur, $navigateur, $niveauDeBloquage, $nombreDAvertissements, $pseudo));
                    } catch (Exception $e) {
                        print "Erreur ! " . $e->getMessage() . "<br/>";
                    }
        }
    //Fonction 04 : renvoyer un @mail
        function renvoyerMailNormal($pseudoutilisateur, $pseudo, $codeValidationReenvoiMail){
            //Etape 01 : autres donnees de replisage du mail
                $mailPourDev="michaloiret@gmail.com";
                $clefMessagerie= '';
                include 'conectBDD.php'; //connection a la BDD

                //$adressemail=$resultat['mail'];// Decommenter cette ligne, et commenter celle du dessous, quand le  site sera actif    
                $adressemail=$mailPourDev; // adresse pour les tests/ en developpement    

                $mail = new PHPMailer(true);

                //Génération d'un jeton unique : 
                //Lorsqu'un utilisateur demande une réinitialisation de mot de passe, générez un jeton unique (par exemple, un jeton aléatoire) associé à leur compte utilisateur. Ce jeton servira de lien sécurisé pour réinitialiser le mot de passe.
                $token = bin2hex(random_bytes(32)); // Utilisez une méthode sécurisée pour générer un jeton

                $validationChangementMDP=genererMotDePasse();// afficher le code de validation sur la page de connexion, grace au retour de requete AJAX

                //lien de réinitialisation : 
                $lienAEnvoyer='http://forum/recuperation.php?pseudo='.$pseudoutilisateur.'&mail='.$adressemail.'&refDemande='.$token;

                // OBJET DU MAIL
                $nomDuSite='neo-rétro WLM';
                $objetMail2= 'Reinitialisation ';

                // CORP DU MAIL (HTML/CSS)
                
                $date = time();
                $dateDemande = date('d/m/Y',$date);

                $nouvelleHeureactuel = strtotime('+1 hour', $date);//timestampactuel
                $nouvelleHeurePlusUn = strtotime('+2 hour', $date);//timestampfin de validité
                
                // Formatter la nouvelle date
                $nouvelleDateFormateeactuel = date('H:i', $nouvelleHeureactuel);//heure actuel
                //$nouvelleDateFormateePlusUn = date('H:i', $nouvelleHeurePlusUn);//heure fin de validite


                $corpMail='Bonjour '.$pseudoutilisateur.'.<br><br>'.

                'Le '.$dateDemande.' à '.$nouvelleDateFormateeactuel.', vous avez fait une demande de réinitialisation de votre mot de passe.<br><br>'.

                "Vous trouverez ci-joint un lien permettant de le faire.
                <a href='".$lienAEnvoyer."'>lien de réinitialisation</a>
                Veuillez noter au bout de 1 heure a compter de l'heure mentioné plus haut de ce présent message, le lien ne sera plus correct, vous devrez alors refaire une demande.<br><br>

                Lors de votre réinitialisation, il vous sera demandé, un code de validation, il se trouve sur la page oùvous étiez.
                ";

                //CORP DU MAIL (ALTBODY)
                $corpMail_alt=`rien

                `;

                //PARAMETRES ET ENVOI
            //Etape 02 : envoi du mail
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
                    $mail->CharSet = PHPMailer::CHARSET_UTF8;
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject =  $objetMail2;

                    $mail->Body    = $corpMail;
                    $mail->AltBody = $corpMail_alt;

                    $mail->send();






                    // ==> enregistrment de la date/heure de fin de validite (date(...)), du token envoye par mail ($token), et du code validation
                    try {
                        $query = "UPDATE forum_utilisateur SET tokenRecuperation=?, validiteToken=?, codeValidation=?  WHERE ID_utilisateur=?";
                    $stmt = $bdd->prepare($query);
                    $stmt->execute([$token, $nouvelleHeurePlusUn, $validationChangementMDP, $pseudo]); 
                    } catch (Exception $e) {
                        print "Erreur ! " . $e->getMessage() . "<br/>";
                    }
                    // <== enregistrment de la date/heure de fin de validite (date(...)), du token envoye par mail ($token), et du code validation



                    // ==> enregistrment du token sur "journal_tokenutilise"JSON
                    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $ID_Secu_Utilisateur=hash('sha512', $pseudo);// ID de l'utilisateur
                        $token_Secu_Utilisateur=hash('sha512', $token);//token
                        // Charger le contenu du fichier JSON
                        $json_file = file_get_contents('bibliotheque/01_connexion/journalToken.json');
                        $data = json_decode($json_file, true);

                        // Ajouter les nouvelles données au tableau JSON
                        $data['utilisateur'][] = $ID_Secu_Utilisateur;
                        $data['token'][] = $token_Secu_Utilisateur;
                        
                        // Réencoder les données en JSON
                        $updated_json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

                        // Écrire les données mises à jour dans le fichier JSON
                        file_put_contents('bibliotheque/01_connexion/journalToken.json', $updated_json);

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










                    echo "code de validation, à renseigner lors du renouvellement du mot de passe : ".$validationChangementMDP;
                } catch (Exception $e) {
                    echo "Le message n'a pas pu etre envoyer, reeseyer?";//: {$mail->ErrorInfo}";
                }

        }

// <== PARTIE 04 ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ <== FONCTIONS
