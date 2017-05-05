<?php // New

    //Appeler le modèle
    include_once("app/model/categorie/lire_categorie.php");
    $categories = lire_categories();

    var_dump($categories);

    //Appeler la vue
    include_once("app/view/article/new.php");