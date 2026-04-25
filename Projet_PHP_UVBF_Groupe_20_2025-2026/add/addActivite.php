<?php
    include "../connexion.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $lieu = $_POST['lieu'];

        $sql = "INSERT INTO activites (titre, description, date, lieu) VALUES (:titre, :description, :date, :lieu)";
        $stmt = $base_Donnee->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':lieu', $lieu);

        if ($stmt->execute()) {
            echo "Activité ajoutée avec succès!";
            header("Location: ../activite.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'activité.";
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
    <h1>Ajouter une activité</h1>
    <div class="activite_form">
    <form method="POST">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="date">Date de l'événement:</label>
        <input type="date" id="date" name="date" required>

        <label for="lieu">Lieu de l'événement:</label>
        <input type="text" id="lieu" name="lieu" required>

        <button type="submit">Ajouter une activité</button>
    </form>
    </div>
</body>
</html>