<?php
	function lire_article($offset, $limite) {
	global $connexion;

	try {
		// On envoie la requète
		$query = $connexion->prepare("SELECT post_ID,post_title,post_date,left(post_content,500) as contenu
										FROM blog_posts
										ORDER BY post_date DESC
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

		// On retourne tous les articles sélectionnés
		return $articles;
	}

	catch ( Exception $e ) {
		die("Une erreur, une de plus..." . $e->getMessage());
	}
}