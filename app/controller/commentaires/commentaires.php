<?php
    // Traitement des paramètres
    if(!isset($_GET["page"]))
    $page = 1;

    else
        $page = $_GET["page"];

    // Nombre de commentaires par page
    $p = 10;

    // Rajouter des tests pour voir si le paramètre est positif, un chiffre entier etc.
    $offset = ($page - 1) *2;


    // Appel du modèle pour obtenir le nombre d'articles
    include_once("app/model/commentaires/lire_nb_com.php");
    $nb_com = lire_nb_com();
    $nb_pages = ceil($nb_com/$p);

     //Appel du modèle pour obtenir les 4 derniers commentaires par page
    include_once("app/model/commentaires/commentaires.php");
    $commentaires = lire_commentaires($id);

    // Traitement sur les données renvoyées par le modèle
    foreach($commentaires as $cle => $commentaire)
    {
        $commentaires[$cle]["comment_date"] = "Publié le: ".$commentaire["comment_date"];
      $commentaires[$cle]["comment_content"] = $commentaire["comment_content"];
       $commentaires[$cle]["comment_ID"] = $commentaire["comment_ID"];
    }

    $file = "app/controller/" . $module . "/" . $action . ".php";
    if (file_exists($file)) {
        include_once($file);
    } else {
    //header("location: app/view/404.php");
    }


//define("PAGE_TITLE" , "Liste des articles");
include_once("app/view/article/detail.php");
