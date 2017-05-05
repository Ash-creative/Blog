<?php
	define("PAGE_LANG" , "fr");
	define("PAGE_CHARSET" , "utf-8");
	define("DEFAULT_MODULE" , "article");
	define("DEFAULT_ACTION" , "index");
	define("PAGINATION_ARTICLES" , 3);
	define("PAGINATION_COMMENTS" , 5);
    define("USER_LAMBDA", 0);
    define("USER_ADMIN", 1);

	// Appel du controleur du module demandé
	if (!isset($_GET["module"])) {
		$module = DEFAULT_MODULE;
	} else {
		$module = $_GET["module"];
	}
	if (!isset($_GET["action"])) {
		$action = DEFAULT_ACTION;
	} else {
		$action = $_GET["action"];
	}