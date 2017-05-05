<!DOCTYPE html>
<html lang="<?php echo PAGE_LANG; ?>">
<head>
	<meta charset="<?php echo PAGE_CHARSET; ?>" />
	<title><?php echo PAGE_TITLE; ?></title>
	<link rel="stylesheet" type="text/css" href="webroot/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="webroot/css/global.css">
	<link rel="stylesheet" type="text/css" href="webroot/css/header.css">
	<script type="text/javascript">
		function createInstance()
		{
			var req = null;
			if (window.XMLHttpRequest)
			{
				// Mozilla, Safari,...
				req = new XMLHttpRequest();
			}
			else if (window.ActiveXObject)
			{
				// IE
				try
				{
					req = new ActiveXObject('Msxml2.XMLHTTP');
				}
				catch (e)
				{
					try
					{
						req = new ActiveXObject('Microsoft.XMLHTTP');
					}
					catch (e)
					{
						alert('XHR not created');
					}
				}
			}
			return req;
		}

		function monAffichage(data)
		{
			element = document.getElementById('connexion');
			element.innerHTML = data;
		}

		function monAjax(element)
		{
			var req = createInstance();
			var login = document.getElementById('login').value;
			var mdp = document.getElementById('password').value;
			data = "login=" + login + "&password=" + mdp;

			req.onreadystatechange = function()
			{
				if (req.readyState == 4 && (req.status == 200 || req.status == 0))
				{
					monAffichage(req.responseText);
				}
				else
				{
					console.log('Erreur AJAX : ' + req.status + " " + req.statusText);
				}
			};
			req.open("POST", "?module=users&action=ajax", true);
			req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			req.send(data);
			event.preventDefault();
		}
	</script>
</head>
<body>
<header id="infos">
	<h1><a href="index.php">Blog Antoine Saint-Hilaire 2A</a></h1>
	<?php if (isset($_SESSION["user"])) { ?>
		<nav>
			<ul id="list_backoff">
				<li><a href="?module=users&action=logout">Se déconnecter</a></li>
				<li><a href="?module=article&action=admin">Accès au back office</a></li>
				<li><a href="?module=article&action=new">Rédiger un nouvel article</a></li>
				<li><a href="?module=users&action=list">Liste des users</a></li>
				<li><a href="?module=users&action=create">Créer un user</a></li>
				<li><a href="?module=commentaires&action=admin">Administrer les commentaires</a></li>
			</ul>
		</nav>


	<?php } else { ?>
		<nav id="connexion">
			<form action="#" method="POST">
				<table>
					<tr>
						<td>
							<label for="utilisateur">Utilisateur</label>
						</td>

						<td>
							<input type="text" name="login" id="login" placeholder="Admin">
						</td>

						<td>
							<label for="password">Mot de passe</label>
						</td>

						<td>
							<input type="password" name="password" id="password" placeholder="Admin">
						</td>
						<td>
							<input type="submit"  value="Connexion" onclick="monAjax(document.getElementById('connexion'));">
						</td>
					</tr>
				</table>
			</form>
		</nav>
	<?php } ?>
</header>