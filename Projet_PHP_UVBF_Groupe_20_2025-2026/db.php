<?php
$host = 'localhost';
$dbname = 'sitho_db'; // le nom de la base de données
$user = 'root';    // Par défaut sur XAMPP/Wamp
$pass = '';        // Vide par défaut sur XAMPP/Wamp

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    // On active la gestion des erreurs pour voir s'il y a un souci
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>