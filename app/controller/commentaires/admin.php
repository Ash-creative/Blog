<?php
protection("user", "users", "login", USER_ADMIN);
// Niveau 1: réservé aux admins

$users = selecttable("blog_users",
    array(  "orderby" => "display_name",
            "order" => "ASC"));

// Traitement du paramètre du numéro de page
if(!isset($_GET["page"]))
    $page = 1;
else
    $page = $_GET["page"];
$offset = ($page - 1) * PAGINATION_COMMENTS;

$options = array( "orderby" => "comment_date",
                 "order"     => "DESC",
                 "limit"     => PAGINATION_COMMENTS,
                 "offset"    => $offset);

if(isset($_GET["user"])) {
    $options["wherecolumn"] = "comment_author";
    $options["wherevalue"] = $_GET["user"];
}

$comments = selecttable("blog_comments", $options);

if (isset($_GET["user"])) {
    $options = array( "wherecolumn" => "comment_author",
                        "wherevalue" => $_GET["user"]);
} else {
    $options = array();
}
//var_dump($options);
//exit;

$nb_comments = counttable("blog_comments", $options);

define("PAGE_TITLE" , "Admin des commentaires");
include_once ("app/view/commentaires/admin.php");