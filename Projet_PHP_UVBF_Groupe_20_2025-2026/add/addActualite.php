
<?php
    include "../connexion.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $date_evenement = $_POST['date_evenement'];

        $sql = "INSERT INTO actualites (titre, description, date_evenement) VALUES (:titre, :description, :date_evenement)";
        $stmt = $base_Donnee->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date_evenement', $date_evenement);

        if ($stmt->execute()) {
            echo "Actualité ajoutée avec succès!";
            header("Location: ../actualite.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'actualité.";
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
    <h1>Ajouter une actualité</h1>
    <div class="actualite_form">
    <form method="POST">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="date_evenement">Date de l'événement:</label>
        <input type="date" id="date_evenement" name="date_evenement" required>

        <button type="submit">Ajouter une actualité</button>
    </form>
    </div>
</body>
</html>