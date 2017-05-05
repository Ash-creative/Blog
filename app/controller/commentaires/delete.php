<?php
$retour = deletetable("blog_comments", array("idcolumn" => "comment_ID",
                                              "idvalue" => $_GET["id"]));

if ($retour) {
    location("commentaires", "admin", "page=" . $_GET["page"] . "notif=ok");
} else {
    location("commentaires", "admin", "page=" . $_GET["page"] . "notif=nok");
}