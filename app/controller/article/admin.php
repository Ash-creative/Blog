<?php
protection("user", "users", "login", USER_ADMIN);
// Niveau 1: réservé aux admins
include("app/view/layout/header.php"); ?>

    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <article class="col-md-6">
                    <h2>Accueil du back office</h2>
                        <p>Page en construction</p>
                    <a href='?module=article&action=index'>Retour à l'accueil</a>
                </article>
            </div>
        </div>
    </main>

<?php include("app/view/layout/footer.php"); ?>