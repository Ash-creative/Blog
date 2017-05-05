<?php
    if (!isset($_POST["login"])) {
        define("PAGE_TITLE" , "Connexion");
        include("app/view/users/login.php");

    } else {
        // Appel du modèle pour chercher un user
        include_once("app/model/users/verif_login.php");
        $retour = verif_login($_POST);

        if (!$retour) {
            header("Location:?module=users&action=login&notif=nok");
            exit;
        } else {

            $_SESSION["user"] = $retour;

            if ($retour["ID"] == 1) {
                $_SESSION["level"] = USER_ADMIN;
                header("Location:?module=article&action=admin");
                exit;
            } else {
                $_SESSION["level"] = 0;
                header("Location:?");
                exit;
            }
        }
    }