<?php
	function lire_articles($id) {
	global $connexion;

	try {
		// On envoie la requète
		$query = $connexion->prepare("SELECT *
										FROM blog_posts, blog_users, blog_categories
										WHERE post_author=ID
										and post_category=cat_id
										and post_ID=:id");

	// offset = choisit à partir de quel endroit il prend les données.
	// limit = jusqu'où il prend les données

		// On initialise les paramètres
		$query->bindParam(':id', $id, PDO::PARAM_INT);

		// On exécute la requête
		$query->execute();

		// On récupère tout les résultats
		$articles = $query->fetchAll();

		// Supprime le curseur
		$query->closeCursor();

		// On retourne tous les articles sélectionnés
		return $articles;
	}

	catch ( Exception $e ) {
		die("Une erreur, une de plus..." . $e->getMessage());
	}
}