<?php
    include "../connexion.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom_structure = $_POST['nom_structure'];
        $statut = $_POST['statut'];
        $localisation = $_POST['localisation'];

        // Récupérer le fichier téléchargé
        $fichier = $_FILES['logo'];

        // Créer un nom unique pour le fichier
        $nom_fichier = time()."_".str_replace(" ","_",$fichier['name']);

        // Définir le chemin de destination pour le fichier
        $chemin_serveur = "../images/".$nom_fichier;

        // Définir le chemin à stocker dans la base de données
        $chemin_base = "images/".$nom_fichier;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($fichier["tmp_name"], $chemin_serveur)) {
            $sql = "INSERT INTO partenaires (nom_structure, statut, localisation, logo) VALUES (:nom_structure, :statut, :localisation, :logo)";
            $stmt = $base_Donnee->prepare($sql);

            if ($stmt->execute([
                ':nom_structure' => $nom_structure,
                ':statut' => $statut,
                ':localisation' => $localisation,
                ':logo' => $chemin_base
            ])) {
                echo "Partenaire ajouté avec succès!";
                header("Location: ../Partenaires.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout du partenaire.";
            }
        } else {
            echo "Erreur lors du téléchargement du logo.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/add.css">
</head>
<body>
    <h1>Ajouter un partenaire</h1>
    <div class="partenaire_form">
    <form method="POST" enctype="multipart/form-data">
        <label for="nom_structure">Nom de la structure:</label>
        <input type="text" id="nom_structure" name="nom_structure" required>

        <label for="statut">Statut:</label>
        <input type="text" id="statut" name="statut" required>

        <label for="localisation">Localisation:</label>
        <input type="text" id="localisation" name="localisation" required>

        <label for="logo">Logo:</label>
        <input type="file" id="logo" name="logo" accept="image/*" required>

        <button type="submit">Ajouter un partenaire</button>
    </form>
    </div>
</body>
</html>