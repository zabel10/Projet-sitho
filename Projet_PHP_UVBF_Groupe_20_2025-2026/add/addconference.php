<?php
    include "../connexion.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $theme = $_POST['theme'];
        $description = $_POST['description'];
        $date_conference = $_POST['date_conference'];
        $intervenant = $_POST['intervenant'];
        $organisme = $_POST['organisme'];

        $sql = "INSERT INTO conferences (titre, theme, description, date_conference, intervenant, organisme) VALUES (:titre, :theme, :description, :date_conference, :intervenant, :organisme)";
        $stmt = $base_Donnee->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':theme', $theme);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date_conference', $date_conference);
        $stmt->bindParam(':intervenant', $intervenant);
        $stmt->bindParam(':organisme', $organisme);

        if ($stmt->execute()) {
            echo "Conférence ajoutée avec succès!";
            header("Location: ../activite.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de la conférence.";
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
    <h1>Ajouter une conférence</h1>
    <div class="conference_form">
    <form method="POST">
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required>

        <label for="theme">Thème:</label>
        <input type="text" id="theme" name="theme" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="date_conference">Date de la conférence:</label>
        <input type="date" id="date_conference" name="date_conference" required>

        <label for="intervenant">Intervenant:</label>
        <input type="text" id="intervenant" name="intervenant" required>

        <label for="organisme">Organisme:</label>
        <input type="text" id="organisme" name="organisme" required>

        <button type="submit">Ajouter une conférence</button>
    </form>
    </div>
</body>
</html>                                                          