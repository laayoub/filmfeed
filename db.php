<?php
// Connexion à la base de données MySQL
$servername = "localhost";  // L'adresse du serveur MySQL
$username = "root";         // Nom d'utilisateur MySQL
$password = "";             // Mot de passe MySQL (vide pour un environnement local par défaut)
$dbname = "movie_reviews";  // Nom de la base de données

try {
    // Créer la connexion
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
}
?>
