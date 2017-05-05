<?php include("app/view/layout/header.php"); ?>
    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <article class="col-md-6">

                    <form action="?module=users&action=login" method="POST">
                        <h2>Login</h2>
                        <table>
                            <tr>
                                <td><label for="identifant">Utilisateur</label></td>
                                <td>
                                    <input type="text" name="login">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="password">Mot de passe</label></td>
                                <td>
                                    <input type="password" name="password">
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