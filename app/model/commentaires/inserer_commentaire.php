<?php
    function inserer_commentaire($commentaire, $user_id) {
        global $connexion;

        try {
            $req = "INSERT INTO blog_comments
                    (comment_post_ID, comment_author, comment_content)
                    VALUES (:comment_post_ID, :comment_author, :comment_content)";
            // Remplacer par l'ID du user de ↑ la session

            // On envoie la requète
            $query = $connexion->prepare($req);

            // offset = choisit à partir de quel endroit il prend les données.
            // limit = jusqu'où il prend les données

            // On initialise les paramètres
            $query->bindValue(':comment_post_ID', $commentaire["post_ID"], PDO::PARAM_INT);
            $query->bindValue(':comment_author', $user_id, PDO::PARAM_INT);
            $query->bindValue(':comment_content', $commentaire["contenu"], PDO::PARAM_STR);

            // On exécute la requête
            $query->execute();

            // Supprime le curseur
            $query->closeCursor();

            // On retourne tous les articles sélectionnés
            return true;
        }

        catch ( Exception $e ) {
            return false;
        }
    }