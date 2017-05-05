<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        include_once("app/model/article/lire_articles.php");
        include_once ("app/model/commentaires/commentaires.php");
        $articles = lire_articles("$id");
        $article = $articles[0];

        $commentaires = lire_commentaires("$id");

    }
        define("PAGE_TITLE", "Liste des articles"); //$_GET["post_title"]);
        include_once("app/controller/commentaires/commentaires.php");