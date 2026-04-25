<?php
// Connexion à la base de données 
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "sitho_db"; 
try{
    $base_Donnee = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $password); 
    $base_Donnee->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    die("Connexion échouée : " . $e->getMessage()); 
    
}