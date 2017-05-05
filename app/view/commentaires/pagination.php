<nav class="container-fluid">
        <div class="row">
            <article class="col-md-6">
    <?= $nb_pages ?> pages
    <?php for($i=1; $i<$nb_pages+1; $i++) { ?>
        <a href="?module=article&action=detail&page=<?= $i; ?>"> <?=$i; ?></a>
    <?php	} ?>
            </article>
        </div>
</nav>