<?php
    include "../connexion.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom_exposant = $_POST['nom_exposant'];
        $localisation = $_POST['localisation'];
        $domaine = $_POST['domaine'];
        $description = $_POST['description'];

        // Récupérer le nom du fichier téléchargé
        $fichier = $_FILES['photo'];

        // creation d'un nom propre au fichier uploader
        $nom_fichier = time()."_".str_replace(" ","_",$fichier['name']); 

        //Ou le fichier sera stocker dans mon serveur
        $chemin_serveur = "../images/".$nom_fichier;

        //dans la base de donnée
        $chemin_base = "images/".$nom_fichier;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($fichier["tmp_name"], $chemin_serveur)) {
            $sql = "INSERT INTO exposants (nom_exposant, localisation, photo, domaine, description) VALUES (:nom_exposant, :localisation, :photo, :domaine, :description)";
            $stmt = $base_Donnee->prepare($sql);

            if ($stmt->execute([
                ':nom_exposant' => $nom_exposant,
                ':localisation' => $localisation,
                ':photo' => $chemin_base,
                ':domaine' => $domaine,
                ':description' => $description
            ])) {
                echo "Exposant ajouté avec succès!";
                header("Location: ../Partenaires.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout de l'exposant.";
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
    <h1>Ajouter un exposant</h1>
    <div class="exposant_form">
    <form method="POST" enctype="multipart/form-data">
        <label for="nom_exposant">Nom de l'exposant:</label>
        <input type="text" id="nom_exposant" name="nom_exposant" required>
        
        <label for="domaine">Domaine:</label>
        <input type="text" id="domaine" name="domaine" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="localisation">Localisation:</label>
        <input type="text" id="localisation" name="localisation" required>

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>

        <button type="submit">Ajouter un exposant</button>
    </form>
    </div>
</body>
</html>