<?php
	// Traitement des paramètres
	if(!isset($_GET["page"]))
		$page = 1;
	else
		$page = $_GET["page"];
	$offset = ($page - 1) * PAGINATION_ARTICLES;


	// Appel du modèle pour obtenir le nombre d'articles
	//include_once("app/model/article/lire_nb_articles.php");
	//$nb_articles = lire_nb_articles();

    $nb_articles = counttable("blog_posts");

    //$nb_pages = ceil($nb_articles/PAGINATION_ARTICLES);

	// Appel du modèle pour obtenir les 5 derniers articles par page
	include_once("app/model/article/lire_article.php");
	$articles = lire_article($offset, PAGINATION_ARTICLES);

	// Traitement sur les données renvoyées par le modèle
	foreach($articles as $cle => $article)
	{
			$articles[$cle]["post_date"] = "Publié le: ".$article["post_date"];
			$articles[$cle]["post_title"] = htmlspecialchars($article["post_title"]);
	}

	// Crée un titre pour la page
	define("PAGE_TITLE" , "Liste des articles");

	// Appel de la vue correspondante
	include_once("app/view/article/index.php");