<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/ico" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css" />
</head>
<body>
    <div class="head"><?php include('pages/header.php')?></div>
    <div class="contenu">
        <p>
            Bienvenue sur le site de JCrache Inc.<br><br>
            Vous pouvez accéder au contenu sécurisé via l'onglet Authentification en haut à droite.<br><br>
            Contactez-nous via le formulaire de l'onglet Contact.<br><br>
        </p>
        <?php
        if ($user_is_connected) {}
        else {
            ?>
            <p class="button">
                <a href="pages/login.php">Se connecter</a>
                <a href="pages/newaccount.php">Nouveau compte</a>
            </p>
            <?php
        }
        ?>
    </div>
    <div class="foot"><?php include('pages/footer.php')?></div>
</body>
</html>
