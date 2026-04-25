<?php
    include "../connexion.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $type = $_POST['type'];
        $description = $_POST['description'];

        // Récupérer le fichier téléchargé
        $fichier = $_FILES['fichier'];

        // Créer un nom unique pour le fichier
        $nom_fichier = time()."_".str_replace(" ","_",$fichier['name']); 

        // Définir le chemin de destination pour le fichier
        $chemin_serveur = "../images/".$nom_fichier;

        // Définir le chemin à stocker dans la base de données
        $chemin_base = "images/".$nom_fichier;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($fichier["tmp_name"], $chemin_serveur)) {
            // Le fichier a été téléchargé et ajouter à la base de données
            $sql = "INSERT INTO galeries (type, fichier, description) VALUES (:type, :fichier, :description)";
            $stmt = $base_Donnee->prepare($sql);
            

            if ($stmt->execute(
                [
                    ':type' => $type,
                    ':description' => $description,
                    ':fichier' => $chemin_base
                ]
            )) {
                echo "Galerie ajoutée avec succès!";
                header("Location: ../galerie.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout de la galerie.";
            }
        } else {
            echo "Erreur lors du téléchargement du fichier.";
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
    <h1>Ajouter une galerie</h1>
    <form method="POST" enctype="multipart/form-data">

        <label for="type">Type de fichier:</label>  
        <select id="type" name="type" required>
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="fichier">File:</label>
        <input type="file" id="fichier" name="fichier" accept="images/*" required>

        <button type="submit">Ajouter une galerie</button>
    </form>
</body>
</html>