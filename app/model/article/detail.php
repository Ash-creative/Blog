<?php
function lire_commentaire($offset, $limite) {
    global $connexion;

    try {
        // On envoie la requète
        $query = $connexion->prepare("SELECT *
										FROM blog_comments
										ORDER BY comment_date DESC
										LIMIT :offset, :limite");

        // offset = choisit à partir de quel endroit il prend les données.
        // limit = jusqu'où il prend les données

        // On initialise les paramètres
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->bindParam(':limite', $limite, PDO::PARAM_INT);

        // On exécute la requête
        $query->execute();

        // On récupère tout les résultats
        $articles = $query->fetchAll();

        // Supprime le curseur
        $query->closeCursor();

        // On retourne tous les commentaires sélectionnés
        return $commentaires;
    }

    catch ( Exception $e ) {
        die("Une erreur, une de plus..." . $e->getMessage());
    }
}