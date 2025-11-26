<?php
// Inclure la connexion à la base de données
include 'db.php';

// Vérifier si les données sont envoyées via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées
    $movie_id = isset($_POST['movie_id']) ? $_POST['movie_id'] : null;
    $username = isset($_POST['username']) ? $_POST['username'] : 'Anonyme';  // Nom d'utilisateur (optionnel)
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    // Vérifier si les données sont valides
    if ($movie_id && $comment) {
        // Préparer la requête SQL pour insérer le commentaire
        $sql = "INSERT INTO comments (movie_id, username, comment) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Exécuter la requête avec les données
        if ($stmt->execute([$movie_id, $username, $comment])) {
            echo "Commentaire enregistré avec succès!";
        } else {
            echo "Erreur lors de l'enregistrement du commentaire.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
} else {
    echo "Méthode HTTP invalide.";
}
?>
