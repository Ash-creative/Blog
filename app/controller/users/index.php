<?php
    //include_once("app/model/users/lire_users.php");

/*
foreach($users as $cle => $user)
	{
			$users[$cle]["ID"] = "Publié le: ".$user["ID"];
			$users[$cle]["user_login"] = htmlspecialchars($user["user_login"]);
	}

*/
// Permet d'afficher des balises bruts
// echo $articles[$cle]["post_title"];

	// Créer un titre pour la page
	define("PAGE_TITLE" , "Liste des users");

	// Appel de la vue correspondante
	include_once("app/view/users/lire_users.php");