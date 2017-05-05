<!--Personnaliser l'affichage du nombre de commentaire selon leur nombre (0 com, 1 com, 2 ou plus)-->
<h2>Les commentaires</h2>

<form id="form_com" method="post" action="?module=commentaires&action=new">
    <table>
        <tr>
            <td>
                <input name="post_ID" type="text" value="<?= $_GET['id'];?>" hidden>
            </td>
        </tr>
        <?php
        // Pour chaque commentaire du tableau des commentaires
        foreach($commentaires as $commentaire)
        { ?>
            <tr>
                <td>
                    #<?=$commentaire["comment_ID"]; ?>
                </td>

                <td>
                    <?=$commentaire["comment_date"]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?=$commentaire["comment_content"]; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>
<?php include_once ("app/view/commentaires/pagination.php"); ?>

<?php if (isset($_SESSION["user"])) { ?>
<label for="contenu">Poster un nouveau commentaire</label><br>
<textarea name="contenu" rows="5" cols="50" required></textarea><br>
<input type="submit" value="Poster">

<?php } else { ?>
<a href="?module=users&action=login">Veuillez vous connecter pour poster un nouveau commentaire</a>
<? } ?>