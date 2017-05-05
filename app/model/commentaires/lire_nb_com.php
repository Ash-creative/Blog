<?php
function lire_nb_com() {
    global $connexion;

    try {
        // On envoie la requète
        $query = $connexion->prepare("SELECT count(comment_post_ID) as nb_com FROM blog_comments");

        // On exécute la requête
        $query->execute();

        // On récupère le résultat
        $nb_com = $query->fetch();

        // Supprime le curseur
        $query->closeCursor();

        // On retourne le nombre de commentaires
        return $nb_com["nb_com"];
    }

    catch ( Exception $e ) {
        die("Une erreur, une de plus..." . $e->getMessage());
    }
}