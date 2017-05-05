<?php include("app/view/layout/header.php"); ?>
    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <article class="col-md-6">
                    <h2>Liste des users</h2>
                    <form action="?module=users&action=update" method="POST">
                        <table id="user_table">
                        <?php
                            // Pour chaque article du tableau des users
                            foreach($list_users as $list_user)
                            { ?>
                            <tr>
                                <th>Identifiant</th>
                                <td><input type="text" value="<?php echo $list_user['user_login']; ?>" id="user_login" name="user_login"/></td>
                            </tr>
                            <tr>
                                <th>Pseudo affiché</th>
                                <td><input type="text" value="<?php echo $list_user['display_name']; ?>" id="display_name" name="display_name"/></td>
                            </tr>
                            <tr>
                                <th>Mot de passe</th>
                                <td><input type="text" value="<?php echo $list_user['user_pass']; ?>" id="user_pass" name="user_pass" /></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><input type="text" value="<?php echo $list_user['user_email']; ?>" id="user_email" name="user_email"/></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Modifier" /></td>
                            </tr>
                        <?php } ?>
                        </table>
                    </form>
                </article>
            </div>
        </div>
    </main>
<?php include("app/view/layout/footer.php"); ?>