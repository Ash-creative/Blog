<?php
	function lire_categories() {
        global $connexion;

        try {
            // On envoie la requète
            $query = $connexion->query("SELECT * FROM blog_categories");

            // On récupère tout les résultats
            $categories = $query->fetchAll();

            // Supprime le curseur
            $query->closeCursor();

            // On retourne tous les articles sélectionnés
            return $categories;
        }

        catch ( Exception $e ) {
            die("Une erreur, une de plus..." . $e->getMessage());
        }
    }