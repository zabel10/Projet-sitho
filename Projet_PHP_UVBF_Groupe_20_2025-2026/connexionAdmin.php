<?php
session_start();
include "connexion.php";

// Durée de vie de la session (10 minutes = 600 secondes)
$vie_session = 600;

// Vérifier si une session existe déjà et n'est pas expirée
if (isset($_SESSION['admin_id']) && isset($_SESSION['derniere_activite'])) {
    $temps_ecoule = time() - $_SESSION['derniere_activite'];
    
    if ($temps_ecoule < $vie_session) {
        // Session encore valide, rediriger vers admin.php
        $_SESSION['derniere_activite'] = time(); 
        header("Location: admin.php");
        exit();
    } else {
        // Session expirée, détruire la session
        session_unset();
        session_destroy();
        // Créer une nouvelle session pour le formulaire
        session_start(); 
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// traitement des données du formulaire de connexion
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password_inserer = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password_inserer)) {
        $sql = "SELECT * FROM admins WHERE nom = :username OR email = :email";
        $stmt = $base_Donnee->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email
        ]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe
        if ($admin && $password_inserer === $admin['mot_de_passe']) {
            // Connexion réussie
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['nom'];
            $_SESSION['derniere_activite'] = time(); // Enregistrer le temps de la dernière activité

            header("Location: admin.php");
            exit();
        } else {
            // Connexion échouée
            echo "Nom d'utilisateur, email ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
    <!-- ========================Formulaire de connexion====================== -->
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>