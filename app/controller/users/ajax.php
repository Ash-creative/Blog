<?php
if(!isset($_POST["login"]))
{
    echo "Il faut remplir le login";
}
else
{
    //Rajouter une transformation du mot de passe en md5 + SALT
    //Appel du modèle pour chercher un user
    include_once("app/model/users/verif_login.php");
    $retour = verif_login($_POST);

    if(!$retour) {
        echo '<nav>
            <span id="notif_log">Les informations entrées sont incorrectes</span>
            <form action="#" method="POST" id="connexion">
				<ul>
					<li><label for="login">Identifiant</label></li>
					<li><input type="text" id="login" name="login"></li>
					<li><label for="password">Mot de passe</label></li>
					<li><input type="text" id="password" name="password"></li>
					<li><input type="submit" value="Connexion" onclick="monAjax(document.getElementById(\'connexion\'));"></li>
				</ul>
			</form>
		</nav>';

    }
    else {
        $_SESSION["user"] = $retour;
        if($_SESSION["user"]["ID"] == 1) {
            $_SESSION["level"] = USER_ADMIN;
            echo '<nav id="notif_log">
                    <span>Bonjour ' .$_SESSION["user"]["user_login"].'
            <br>
            Votre status: Administrateur</span><br><br>
                  
			<ul id="list_backoff">
				<li><a href="?module=users&action=logout">Se déconnecter</a></li>
				<li><a href="?module=article&action=admin">Accès au back office</a></li>
				<li><a href="?module=article&action=new">Rédiger un nouvel article</a></li>
				<li><a href="?module=users&action=list">Liste des users</a></li>
				<li><a href="?module=users&action=create">Créer un user</a></li>
				<li><a href="?module=commentaires&action=admin">Administrer les commentaires</a></li>
			</ul>
		</nav>';
        }

        //Menu différent à mettre en place pour les utilisateurs normaux
        else {
            $_SESSION["level"] = USER_LAMBDA;
            echo '<nav id="notif_log">
                    <span>Bonjour ' .$_SESSION["user"]["user_login"].'
            <br>
            Votre status: Utilisateur normal</span><br><br>
                  
			<ul id="list_backoff">
				<li><a href="?module=users&action=logout">Se déconnecter</a></li>
			</ul>
		</nav>';
        }
    }
}