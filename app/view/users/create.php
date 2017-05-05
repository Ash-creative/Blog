<?php include("app/view/layout/header.php"); ?>
<?php if (isset($_GET["notif"])) {
    if ($_GET["notif"] == "ok") {
        echo "<div id='notifok'> Le user a correctement été ajouté</div>";
    }
    else {
        echo "<div id='notifnok'> Une erreur s'est produite </div>";
    }
} ?>
<main class="container-fluid">
    <div class="container">
        <div class="row">
            <article class="col-md-6">
                <form action="?module=users&action=new" method="POST">
                    <h2>Créer un nouvel user</h2>
                    <table>
                        <tr>
                            <td><label for="user_login">Identifiant</label></td>
                            <td><input type="text" name="user_login" id="user_login" required /></td>
                        </tr>

                        <tr>
                            <td><label for="display_name">Pseudo affiché</label></td>
                            <td><input type="text" name="display_name" id="display_name" required /></td>
                        </tr>

                        <tr>
                            <td><label for="user_pass">Mot de passe</label></td>
                            <td><input type="password" name="user_pass" id="user_pass" required /></td>
                        </tr>

                        <tr>
                            <td><label for="user_email">Email</label></td>
                            <td><input type="text" name="user_email" id="user_email" required /></td>
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