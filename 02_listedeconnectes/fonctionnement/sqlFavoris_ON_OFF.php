<?php 
  include '../../conectBDD.php'; // connection a la base de donnees

$utilisateur=htmlspecialchars($_POST['utilisateur']);
$destinataire=htmlspecialchars($_POST['destinataire']);
  
  try {
      // Sélection des ID_utilisateur correspondants aux pseudos
      $sql = "SELECT u1.ID_utilisateur AS ID_utilisateur, u2.ID_utilisateur AS ID_destinataire
              FROM forum_utilisateur u1
              JOIN forum_utilisateur u2 ON u1.pseudo = ? AND u2.pseudo = ?";
      $stmt = $bdd->prepare($sql);
      $stmt->execute([$utilisateur, $destinataire]);
      $resultatRequeteID = $stmt->fetch(PDO::FETCH_ASSOC);
  
      if ($resultatRequeteID) {
          $ID_deutilisateur = $resultatRequeteID['ID_utilisateur'];
          $ID_dedestinataire = $resultatRequeteID['ID_destinataire'];
  
          // Vérification et mise à jour de la catégorie dans la table forum_contact
          $sql = "SELECT categorie FROM forum_contact WHERE ID_utilisateur = ? AND ID_contact = ?";
          $stmt = $bdd->prepare($sql);
          $stmt->execute([$ID_deutilisateur, $ID_dedestinataire]);
          $resultatRequeteCat = $stmt->fetch(PDO::FETCH_ASSOC);
  
          if ($resultatRequeteCat && $resultatRequeteCat['categorie'] == 'favoris') {
              $sql = "UPDATE forum_contact SET categorie = 'normal' WHERE ID_utilisateur = ? AND ID_contact = ?";
              $stmt = $bdd->prepare($sql);
              $stmt->execute([$ID_deutilisateur, $ID_dedestinataire]);
              echo "contact pas en favoris";
          } else {
              $sql = "UPDATE forum_contact SET categorie = 'favoris' WHERE ID_utilisateur = ? AND ID_contact = ?";
              $stmt = $bdd->prepare($sql);
              $stmt->execute([$ID_deutilisateur, $ID_dedestinataire]);
              echo "contact en favoris";
          }
      } else {
          echo "Utilisateur ou destinataire introuvable.";
      }
  } catch (Exception $e) {
      echo "Erreur : " . $e->getMessage();
  }