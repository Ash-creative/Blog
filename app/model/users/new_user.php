<?php
function inserer_user($user_param) {
    global $connexion;

    try {
        $req = "INSERT INTO blog_users
                    (user_login, user_pass, user_email, display_name)
                    VALUES (:user_login, :user_pass, :user_email, :display_name)";

        // Remplacer par l'ID du user de ↑ la session

        // On envoie la requète
        $query = $connexion->prepare($req);

        // offset = choisit à partir de quel endroit il prend les données.
        // limit = jusqu'où il prend les données

        // On initialise les paramètres
        $query->bindValue(':user_login', $user_param["user_login"], PDO::PARAM_INT);
        $query->bindValue(':user_pass', $user_param["user_pass"], PDO::PARAM_INT);
        $query->bindValue(':user_email', $user_param["user_email"], PDO::PARAM_STR);
        $query->bindValue(':display_name', $user_param["display_name"], PDO::PARAM_STR);

        // On exécute la requête
        $query->execute();


        // On retourne l'id du dernier user inséré
        return $connexion->lastInsertId();
    }

    catch ( Exception $e ) {
        return false;
    }
}