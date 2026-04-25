<?php 
include "connexion.php";
    // Je définis une table  pour stocker les informations de chaque module
$modules = [

    "actualite" => [
        "table" => "actualites",
        "champs" => ["titre", "description","date_evenement"],
        "rediriger" => "actualite.php"
    ],

    "exposant" => [
        "table" => "exposants",
        "champs" => ["nom_exposant", "photo", "localisation", "domaine", "description"],
        "rediriger" => "partenaires.php"
    ],

    "partenaire" => [
        "table" => "partenaires",
        "champs" => ["nom_structure", "statut", "localisation", "logo"],
        "rediriger" => "partenaires.php"
    ],

    "activite" => [
        "table" => "activites",
        "champs" => ["titre", "description", "type", "date", "lieu" ],
        "rediriger" => "activite.php"
    ],

    "conference" => [
        "table" => "conferences",
        "champs" => ["titre", "intervenant", "organisme", "date_conference", "theme", "description"],
        "rediriger" => "activite.php"
    ],

    "galerie" => [
        "table" => "galeries",
        "champs" => ["fichier", "description"],
        "rediriger" => "galerie.php"
    ]


];

// ================== Recuperation de l'id ==================
$type = $_GET['type'] ?? null;
$id = intval($_GET['id'] ?? 0);

if(!isset($modules[$type])){
    die("Type invalide");
}

$table = $modules[$type]['table'];
$champs = $modules[$type]['champs'];

// ================== Selectionner les données ==================
$sql = "SELECT * FROM $table WHERE id = ?";
$stmt = $base_Donnee->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$data){
    die("Donnée introuvable");
}
// si le champ est un fichier, je dois le traiter avant de faire l'update
foreach($champs as $champ){
    if($champ == "photo" || $champ == "logo" || $champ == "fichier"){
        if(isset($_FILES[$champ]) && $_FILES[$champ]['error'] == 0){
            $upload_dir = 'images/';
            $file_name = basename($_FILES[$champ]['name']);
            $target_file = $upload_dir . $file_name;
            move_uploaded_file($_FILES[$champ]['tmp_name'], $target_file);
            $_POST[$champ] = $target_file;
        }
    }
}


// ================== UPDATE ==================
if(isset($_POST['update'])){

    $set = [];
    $values = [];

    foreach($champs as $champ){
        $set[] = "$champ = ?";
        $values[] = $_POST[$champ];
    }

    $values[] = $id;

    $sql = "UPDATE $table SET " . implode(", ", $set) . " WHERE id = ?";
    $stmt = $base_Donnee->prepare($sql);
    $stmt->execute($values);

    header("Location:" . $modules[$type]['rediriger']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/add.css">
    
</head>
<body>

<h2>Modifier <?= $type ?></h2>
<!-- ========================= Formulaire de modification ==================== -->
<form method="POST" enctype="multipart/form-data">

<?php foreach($champs as $champ): ?>

    <label><?= ucfirst($champ) ?></label><br>

    <?php if($champ == "description"): ?>
        <textarea name="<?= $champ ?>" width="200"><?= $data[$champ] ?></textarea>
    <?php elseif($champ == "photo" || $champ == "logo" || $champ == "fichier"): ?>
        <input type="file" name="<?= $champ ?>" value="<?= $data[$champ] ?>">
    <?php elseif($champ == "date_evenement" || $champ == "date_conference" || $champ == "date"): ?>
        <input type="date" name="<?= $champ ?>" value="<?= $data[$champ] ?>">
    <?php elseif($champ == "heure"): ?>
        <input type="time" name="<?= $champ ?>" value="<?= $data[$champ] ?>">
    <?php else: ?>
        <input type="text" name="<?= $champ ?>" value="<?= $data[$champ] ?>">
    <?php endif; ?>

    <br><br>

<?php endforeach; ?>

<button name="update">Mettre à jour</button>

</form>

</body>
</html>
