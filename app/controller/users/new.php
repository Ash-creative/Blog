<?php // redirection vers le module "users" et l'action "login
protection("user", "users", "login", USER_ADMIN);

if (!isset($_POST["user_login"])) {
    //Appeler la vue
    include_once("app/view/users/create.php");
    echo "Vous devez renseigner tout les champs";
}
else {
    //Appeler le modèle
    include_once("app/model/users/new_user.php");
    $retour = inserer_user($_POST, $_SESSION["user"]["ID"]); //$_POST, $user_id
    // inserer_un user ($_post); quand on aura le formulaire

    if (!$retour)
        location("users", "create", "notif=nok");
    else
        //header("location: ?module=article&action=detail&id=" . $retour . "&notif=ok" );
        location("users", "create", "notif=ok");
}