<?php
include '../../conectBDD.php'; 

$saisiePseudo = htmlspecialchars($_POST['pseudo']);
$saisieMDP = htmlspecialchars($_POST['contenuMDP']);

$responseTableau = array();

try {
    $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($saisiePseudo));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
$nombreDeLignesresultat = $stmt->rowCount();
$resultat = $stmt->fetch(PDO::FETCH_ASSOC); 
//echo$resultat['ID_utilisateur'];
if($nombreDeLignesresultat==1){
$responseTableau['valeur1'] =$resultat['ID_utilisateur'];
}else{
    $responseTableau['valeur1'] ="rien_1";
}




try {
    $sql = "SELECT * FROM forum_utilisateur WHERE pseudo=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array($saisieMDP));
} catch (Exception $e) {
    print "Erreur ! " . $e->getMessage() . "<br/>";
}
$nombreDeLignesresultat2 = $stmt->rowCount();
$resultat2 = $stmt->fetch(PDO::FETCH_ASSOC);


if($nombreDeLignesresultat2==1){
    $responseTableau['valeur2'] =$resultat2['ID_utilisateur'];
}else{
    $responseTableau['valeur2'] ="rien_2";
}
    

echo json_encode($responseTableau);
