<?php

if(isset($_POST["post_ID"])) {
    //var_dump($_POST);
    include_once("app/model/commentaires/inserer_commentaire.php");
    $resultat = inserer_commentaire($_POST, $_SESSION["user"]["ID"]);

    // Redirection selon la réussite de la requête
    if($resultat)
    header(":location:?module=article&action=detail&id=" . $_POST["post_ID"] . "&notif=ok");

    else
    header(":location:?module=article&action=detail&id=" . $_POST["post_ID"] . "&notif=nok");
}

else {
    die("POST absent");
}