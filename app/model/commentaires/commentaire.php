<?php
function insert_com() {
    global $connexion;

    try {
        // On envoie la requète
        $query = $connexion->prepare("INSERT INTO blog_comments (comment_content)
										VALUES ()");

        // On initialise les paramètres
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        // On exécute la requête
        $query->execute();

        // On récupère tout les résultats
        $commentaires = $query->fetchAll();

        // Supprime le curseur
        $query->closeCursor();

        // On retourne tous les articles sélectionnés
        return $commentaires;
    }

    catch ( Exception $e ) {
        die("Une erreur, une de plus..." . $e->getMessage());
    }
}