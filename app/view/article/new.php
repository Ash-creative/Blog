<?php include("app/view/layout/header.php"); ?>

    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <article class="col-md-6">

                        <form action="?module=article&action=new" method="POST">
                            <h2>Poster un nouvel article</h2>
                            <table>
                                <tr>
                                    <td><label for="listcat">Catégorie</label></td>
                                    <td>
                                        <?php scrolllist("post_category", "dropdown", "listcat", $categories,
                                            "cat_id", "cat_descr"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="post_title">Titre</label></td>
                                    <td>
                                        <input type="text" name="post_title" id="post_title">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="post_content">Content</label></td>
                                    <td>
                                        <textarea cols="80" rows="10" name="post_content" id="post_content"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" value="Envoyer">
                                    </td>
                                </tr>
                            </table>
                        </form>
                </article>
            </div>
        </div>
    </main>
<?php include("app/view/layout/footer.php"); ?>