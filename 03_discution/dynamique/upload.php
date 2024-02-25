<?php

include '../../conectBDD.php'; 


function genererMotDePasse() {
  $longueur = rand(20, 40); // Générer une longueur aléatoire entre 15 et 30 caractères
  $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $motDePasse = '';
  $longueurCaracteres = strlen($caracteres);
  for ($i = 0; $i < $longueur; $i++) {
      // Sélectionner un caractère aléatoire parmi les caractères disponibles
      $caractereAleatoire = $caracteres[rand(0, $longueurCaracteres - 1)];
      // Ajouter le caractère à la chaîne du mot de passe
      $motDePasse .= $caractereAleatoire;
  }
  return $motDePasse;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {// Vérifier si une photo a été soumise
    // Chemin vers le répertoire où seront stockées les photos téléchargées
    $cheminStockage = '../../cheminversrepertoirephotos/';

    // Valider le type de fichier et la taille
    $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'gif'];
    $tailleMax = 5 * 1024 * 1024; // 5 Mo

    // Vérifier s'il y a des erreurs lors du téléchargement
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      // Valider le type de fichier et la taille
      $extensionsAutorisees = ['jpg', 'jpeg', 'png', 'gif'];
      $tailleMax = 1 * 1024 * 1024; // 5 Mo
      $infoFichier = pathinfo($_FILES['photo']['name']);
      $extensionFichier = strtolower($infoFichier['extension']);

      if (in_array($extensionFichier, $extensionsAutorisees) && $_FILES['photo']['size'] <= 5000000) {
          // Générer un nom unique pour la photo
          $motDePasseAleatoire = genererMotDePasse();
          $nomPhoto = $motDePasseAleatoire . '.' . $extensionFichier;

          // Déplacer le fichier téléchargé vers le répertoire de stockage
          $cheminDestination = $cheminStockage . $nomPhoto;
          move_uploaded_file($_FILES['photo']['tmp_name'], $cheminDestination);

          // Rediriger vers une page de succès ou afficher un message de succès
          unset($_FILES['photo']);
          //unlink($_FILES['photo']);

          if(isset($_SERVER['HTTP_REFERER'])) {
            // Redirigez vers la page précédente
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            //header('Location: http://forum/#');
            //exit();
        } else {
            // Si HTTP_REFERER n'est pas défini, redirigez vers une page par défaut
            //header('Location: http://forum/#');// Remplacez index.php par l'URL de votre choix
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            //exit();
        }
        function verifierSaisies($valeur) {
            // Utilisez une expression régulière pour supprimer les caractères spéciaux non autorisés
            $nouvelleValeur = preg_replace('/[<>?:"\'()\[\]{}\/\*\`;$#,]/', '', $valeur);
            return $nouvelleValeur;
        }
        $valeur = htmlspecialchars( $_POST['photoNomUtilisateur']);
        $valeurFiltree = verifierSaisies($valeur);


        $sasiePseudo=$_COOKIE['pseudo_utilisateur'];
        try {
            $sql = "SELECT * FROM  forum_utilisateur  WHERE BINARY pseudo=?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array($sasiePseudo));
        } catch (Exception $e) {
            print "Erreur ! " . $e->getMessage() . "<br/>";
        }
        $nombreDeLignes = $stmt->rowCount();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        $utilisateurNumero = $resultat['ID_utilisateur'];
        $type = $_POST['type'];
        $PseudoExpediteur=$_POST['PseudoExpediteur'];
        $PseudoDestinataire=$_POST['PseudoDestinataire'];
        $LangueUtilisee=$_POST['LangueUtilisee'];
        // Charger le contenu du fichier JSON
        $json_file = file_get_contents('../../bibliotheque/00_GENERAL/biblioImages.json');
        $data = json_decode($json_file, true);

        // Ajouter les nouvelles données au tableau JSON
        $data['Pseudo'][$utilisateurNumero]['nom'][] = $valeurFiltree;
        $data['Pseudo'][$utilisateurNumero]['vraiNom'][] = $motDePasseAleatoire;
        $data['Pseudo'][$utilisateurNumero]['type'][] = $extensionFichier;

        // Réencoder les données en JSON
        $updated_json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        // Écrire les données mises à jour dans le fichier JSON
        file_put_contents('../../bibliotheque/00_GENERAL/biblioImages.json', $updated_json);
        exit();
    }
  }
}
?>
