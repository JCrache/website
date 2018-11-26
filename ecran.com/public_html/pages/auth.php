<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/ico" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Authentification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        Cet espace permet d'accéder à des ressources sécurisées si vous connaissez certains codes d'accès.
        <form method="post" action="/ecran.com/public_html/pages/infos.php">
            <p>Code:<br><br><input type="password" name="password"></p>
            <p><input type="submit" value="Valider"></p>
        </form><br>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>
