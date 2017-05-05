<nav>
	Barre de pagination: <?= $nb_pages ?> pages
<?php for($i=1; $i<$nb_pages+1; $i++) { ?>
		<a href="?module=article&action=index&page=<?= $i; ?>"> <?=$i; ?></a>
<?php	} ?>
</nav>