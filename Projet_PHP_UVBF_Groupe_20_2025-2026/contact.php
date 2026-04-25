<?php
include "connexion.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date_envoi = $_POST['date_envoi'];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO contacts (nom, prenom, email, message, date_envoi) VALUES (:nom, :prenom, :email, :message, :date_envoi)";
    $stmt = $base_Donnee->prepare($sql);

    // Lier les paramètres et exécuter la requête
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':message' => $message,
        ':date_envoi' => $date_envoi
    ]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=menu,search" />
</head>
<body> 
    <?php include "header.html" ?>
    <!--==================== Formulaire de contact ======================== -->
    <form method="POST" class="myForm">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <label for="date_envoi">Date:</label>
        <input type="date" id="date_envoi" name="date_envoi" required>

        <button type="submit">Envoyer</button>
    </form>
    <?php include "footer.html" ?>
    <script>
        // Validation du formulaire de contact
        const Form = document.querySelector('.myForm');
        Form.addEventListener('submit', (e) => {
            const nom = document.getElementById('nom').value.trim();
            const prenom = document.getElementById('prenom').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            const date_envoi = document.getElementById('date_envoi').value.trim();

            if (!nom || !prenom || !email || !message || !date_envoi) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs du formulaire.');
            }
            else if (!/\S+@\S+\.\S+/.test(email)) {
                e.preventDefault();
                alert('Veuillez entrer une adresse email valide.');
            }else if (message.length < 10) {
                e.preventDefault();
                alert('Le message doit contenir au moins 10 caractères.');
            }else {
                alert('Votre message a été envoyé avec succès!');
            }

        });
    </script>
</body>
</html>