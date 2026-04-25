<?php
include "connexion.php";

$type = $_GET['type'];
// Utiliser une structure de contrôle pour déterminer la table à interroger en fonction du type
switch($type){
    case "actualite":
        $table = "actualites";

        break;
    case "activite":
        $table = "activites";
        break;
    case "conference":
        $table = "conferences";
        break;
    case "partenaire":
        $table = "partenaires";
        break;
    case "exposant":
        $table = "exposants";
        break;
    case "galerie":
        $table = "galeries";
        break;
    default:
        die("Type invalide");
}
// sélectionner tous les enregistrements de la table correspondante
$sql = "SELECT * FROM $table";
$result = $base_Donnee->query($sql);
$result->execute();

while($row = $result->fetch(PDO::FETCH_ASSOC)){
?>
    <div class="box">
        <p><?= $row['domaine'] ?? $row['nom'] ?? $row['nom_structure'] ??$row['nom_exposant'] ??  $row['description'] ?? "sans nom" ?></p>

        <div class="btn">
            <a href="delete.php?type=<?= $type ?>&id=<?= $row['id'] ?>">
                <button>Supprimer</button>
            </a>
        </div>
    </div>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/liste.css">
</head>
<body>
    
</body>
</html>