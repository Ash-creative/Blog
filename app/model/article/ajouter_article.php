<?php
    function inserer_article($article, $user_id) {
        global $connexion;

        try {
            $req = "INSERT INTO blog_posts
                    (post_author, post_category, post_content, post_title)
                    VALUES (:post_author, :post_category, :post_content, :post_title)";

            // Remplacer par l'ID du user de ↑ la session

            // On envoie la requète
            $query = $connexion->prepare($req);

            // offset = choisit à partir de quel endroit il prend les données.
            // limit = jusqu'où il prend les données

            // On initialise les paramètres
            $query->bindValue(':post_author', $user_id, PDO::PARAM_INT);
            $query->bindValue(':post_category', $article["post_category"], PDO::PARAM_INT);
            $query->bindValue(':post_content', $article["post_content"], PDO::PARAM_STR);
            $query->bindValue(':post_title', $article["post_title"], PDO::PARAM_STR);

            // On exécute la requête
            $query->execute();


            // On retourne tous les articles sélectionnés
            return $connexion->lastInsertId();
        }

        catch ( Exception $e ) {
            return false;
        }
    }