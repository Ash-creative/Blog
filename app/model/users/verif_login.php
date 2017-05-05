<?php
	function verif_login($form) {
        global $connexion;

        try {
            // On envoie la requète
            $query = $connexion->prepare("SELECT *
										FROM blog_users
										WHERE user_login=:login
										and user_pass=:password");
            // offset = choisit à partir de quel endroit il prend les données.
            // limit = jusqu'où il prend les données


            // On initialise les paramètres
            $query->bindParam(':login', $form["login"], PDO::PARAM_STR);
            $query->bindParam(':password', $form["password"], PDO::PARAM_STR);
            // On exécute la requête
            $query->execute();

            // On récupère tout les résultats
            $users = $query->fetchAll();

            // Supprime le curseur
            $query->closeCursor();

            // On retourne un user ou bien false
            if ((empty($users)) || (sizeof($users) > 1))
                return false;
            else
                return $users[0];
        }

        catch ( Exception $e ) {
            die("Une erreur, une de plus..." . $e->getMessage());
        }
    }