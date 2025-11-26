// Fonction pour soumettre un commentaire
function submitFeedback() {
    const commentText = document.getElementById("comment").value;
    const username = prompt("Quel est votre nom ?");
    const movieId = getMovieIdFromURL();  // Récupérer l'ID du film depuis l'URL

    if (commentText.trim() === "") {
        alert("Veuillez écrire un commentaire avant d'envoyer !");
        return;
    }

    // Créer une requête AJAX pour envoyer le commentaire à submit_feedback.php
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "submit_feedback.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Créer les paramètres de la requête
    const params = `movie_id=${movieId}&username=${encodeURIComponent(username)}&comment=${encodeURIComponent(commentText)}`;

    // Envoyer la requête
    xhr.send(params);

    // Lorsque la requête est terminée, afficher la réponse
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);  // Affiche le message de succès ou d'erreur
            displayComments();  // Mettre à jour la section des commentaires
        }
    };
}

// Fonction pour récupérer l'ID du film depuis l'URL
function getMovieIdFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return parseInt(urlParams.get('id'));  // Récupère l'ID du film
}

// Fonction pour afficher les commentaires
function displayComments() {
    const commentsContainer = document.getElementById("comments");
    commentsContainer.innerHTML = "";  // Vider la section avant de réajouter les nouveaux commentaires

    // Récupérer les commentaires depuis la base de données (en production, cette fonction serait appelée via AJAX)
    // Cette partie peut être améliorée pour récupérer les commentaires du serveur
    // Exemple simplifié :
    const comments = [
        "Super film !",
        "Très bon action, j'ai adoré !"
    ];

    comments.forEach(comment => {
        const commentElement = document.createElement("p");
        commentElement.textContent = comment;
        commentsContainer.appendChild(commentElement);
    });
}
