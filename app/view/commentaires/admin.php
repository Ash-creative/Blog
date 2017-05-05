<?php include("app/view/layout/header.php"); ?>

<main class="container">

Liste des users
    <p>
        <?php if(isset($_GET["user"])) {
            scrolllist("users", "dropdown", "listusers", $users, "ID", "display_name", array("selected" => $_GET["user"]));
        } else {
            scrolllist("users", "dropdown", "listusers", $users, "ID", "display_name", array("default" => "Tout les users"));
        }?>
    </p>

    <h3>Liste des commentaires</h3>


    <?php foreach ($comments as $comment) {
        var_dump($comment);
        echo "<br>";
    ?>

    <a href="?module=commentaires&action=delete&page=<?php echo $page ?>&id=<?php echo $comment['comment_ID'] ?>"
    onclick="return confirm('Supprimer le commentaire ?'); " >Supprimer</a>
<br><br><br>
<?php
    }
?>

    <?php if(isset($_GET['user'])) {
        paginate($nb_comments, PAGINATION_COMMENTS, 'commentaires', 'admin', '&user=' . $_GET['user']);
    } else {
        paginate($nb_comments, PAGINATION_COMMENTS, 'commentaires', 'admin');
    }
    ?>
</main>

<script src="webroot/js/commentaire_admin.js"></script>

<?php include("app/view/layout/footer.php"); ?>


<!--
Rajouter des commentaires:

INSERT INTO blog_comments (comment_post_ID, comment_author, comment_content)
 VALUES
 (1, '', ''),
 (2, '', ''),
 (3, '', ''),
 (4, '', ''),
 (5, '', ''),
 (6, '', '');
 (1, 'Baptiste', 'Je retourne lire mes actu sur LeMonde.fr'),
 (2, 'David', 'Les soldes Steam c\'est pour bientôt ?'),
 (3, 'Kevin', 'Petit test de commentaire'),
 (4, 'Hugo', 'olol'),
 (5, 'Beauf459', 'Test 123'),
 (6, 'Pseudo', 'Blog abominable. Remboursé')
->
