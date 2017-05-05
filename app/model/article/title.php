<?php
	function fetch_title($title) {
        global $connexion;

        try {
            // On envoie la requète
            $query = $connexion->prepare("SELECT *
										FROM blog_posts, blog_users, blog_categories
										WHERE post_author=ID
										and post_category=cat_id
										and post_title=:title");

            // offset = choisit à partir de quel endroit il prend les données.
            // limit = jusqu'où il prend les données

            // On initialise les paramètres
            $query->bindParam(':title', $title, PDO::PARAM_STR);

            // On exécute la requête
            $query->execute();

            // On récupère tout les résultats
            $articles = $query->fetchAll();

            // Supprime le curseur
            $query->closeCursor();

            // On retourne tous les articles sélectionnés
            return $title;
        }

        catch ( Exception $e ) {
            die("Une erreur, une de plus..." . $e->getMessage());
        }
    }