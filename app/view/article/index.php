<?php include("app/view/layout/header.php"); ?>

	<main class="container-fluid">
		<div class="container">
			<div class="row">

				<article class="col-md-6">
					<h2>Derniers articles du blog</h2>
					<?php
					// Pour chaque article du tableau des articles
					foreach($articles as $article) { ?>
							<h4><a href="?module=article&action=detail&id=<?= $article["post_ID"]; ?>"><?php echo $article["post_title"]; ?>
								</a>"
							</h4>

							<?php echo $article["post_date"]; ?>
							<br>
							<?php echo $article["contenu"]; ?>
							<span>...</span>
					<?php } ?>

					<?php paginate($nb_articles, PAGINATION_ARTICLES, "article", "index"); ?>
                </article>
            </div>
        </div>
    </main>
<?php include("app/view/layout/footer.php"); ?>