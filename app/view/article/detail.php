<?php include("app/view/layout/header.php"); ?>
<main class="container">
	<h2 class="title"><?=$article["post_title"] ?></h2>
	<h2>Classé dans: <?=$article["cat_descr"]; ?></h2>
	<h3>Rédigé par: <?=$article["display_name"]; ?></h3>

	<div class="row">
		<article class="col-sm-4 col-md-8">
			<?=$article["post_content"]; ?>
		</article>
	</div>

	<?php include_once("app/view/commentaires/commentaires.php"); ?>
	</main>

<?php include("app/view/layout/footer.php"); ?>