<?php
	function lire_nb_articles() {
	global $connexion;

	try {
		// On envoie la requète
		$query = $connexion->prepare("SELECT count(post_ID) as nb_articles FROM blog_posts");

		// On exécute la requête
		$query->execute();

		// On récupère le résultat
		$nb_articles = $query->fetch();

		// Supprime le curseur
		$query->closeCursor();

		// On retourne le nombre  sélectionnés
		return $nb_articles["nb_articles"];
	}

	catch ( Exception $e ) {
		die("Une erreur, une de plus..." . $e->getMessage());
	}
}