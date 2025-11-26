<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movie_id = isset($_POST['movie_id']) ? $_POST['movie_id'] : null;
    $username = isset($_POST['username']) ? $_POST['username'] : 'Anonyme';  
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

   
    if ($movie_id && $comment) {
       
        $sql = "INSERT INTO comments (movie_id, username, comment) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
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

