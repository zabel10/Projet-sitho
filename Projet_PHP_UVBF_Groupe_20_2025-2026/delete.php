<?php
include "connexion.php";

$type = $_GET['type'];
$id = $_GET['id'];
// Utiliser une structure de contrôle pour déterminer la table à interroger en fonction du type
switch($type){
    case "actualite":
        $table = "actualites";
        $rediriger = "actualite.php";
        break;
    case "activite":
        $table = "activites";
        $rediriger = "activite.php";
        break;
    case "conference":
        $table = "conferences";
        $rediriger = "activite.php";
        break;
    case "partenaire":
        $table = "partenaires";
        $rediriger = "partenaires.php";
        break;
    case "exposant":
        $table = "exposants";
        $rediriger = "partenaires.php";
        break;
    case "galerie":
        $table = "galeries";
        $rediriger = "galerie.php";
        break;
}
// Supprimer l'enregistrement de la table correspondante
$sql = "DELETE FROM $table WHERE id = :id";
$stmt = $base_Donnee->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: $rediriger");
exit();
?>