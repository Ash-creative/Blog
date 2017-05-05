<?php // redirection vers le module "users" et l'action "login
protection("user", "users", "login", USER_LAMBDA);

if (!isset($_POST["post_title"])) {
    //Appeler le modèle
    $categories = selecttable("blog_categories",
        array("orderby" => "cat_descr",
            "order" => "DESC"));

    //var_dump($categories);

    //Appeler la vue
    include_once("app/view/article/new.php");

}
else {
    //Appeler le modèle
    include_once("app/model/article/ajouter_article.php");
    $retour = inserer_article($_POST, $_SESSION["user"]["ID"]); //$_POST, $user_id
    // inserer_article ($_post); quand on aura le formulaire

    if (!$retour)
        //header("location: ?module=article&action=new&notif=nok");
        location("article", "new", "notif=nok");
    else
        //header("location: ?module=article&action=detail&id=" . $retour . "&notif=ok" );
        location("article", "new", "id=' . $retour . '&notif=ok");
}