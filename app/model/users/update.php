<?php
function update_user() {
    global $connexion;

    try {
        // On envoie la requète
        $query = $connexion->prepare("UPDATE blog_users
										SET user_login = $user_login,
										user_pass = $user_pass,
										user_email = $user_email,
										display_name = $display_name
										WHERE ID = $ID");
        // On exécute la requête
        $query->execute();

        // Supprime le curseur
        $query->closeCursor();
    }

    catch ( Exception $e ) {
        die("Une erreur, une de plus..." . $e->getMessage());
    }
}