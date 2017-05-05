<?php
    session_start();
	// Chargement du fichier de config
	include_once("app/config/config.inc.php");
	// Connexion à la BD
	include_once("app/model/pdo.inc.php");
    // Protection
    include_once("core/corecontroller.php");
    // Core model
    include_once("core/coremodel.php");
    // Pagination
    include_once("core/coreview.php");

	$url = "app/controller/" . $module . "/" . $action . ".php";
	if (file_exists($url))
		include_once($url);
    else
        include_once("app/view/404.php");

	// Chargement du core de l'architecture
	include_once("core/core.php");

	// Chargement des librairies
	include_once("lib/cogi.inc.php");

// Réécriture d'URL à faire pour les personnaliser