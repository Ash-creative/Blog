<?php protection("user", "users", "login", USER_LAMBDA);

    //Appeler le modèle
    $list_users = selecttable("blog_users");

// Crée un titre pour la page
define("PAGE_TITLE" , "Liste des users");

//Appeler la vue
include_once("app/view/users/list.php");