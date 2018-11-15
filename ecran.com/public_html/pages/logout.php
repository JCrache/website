<?php
session_start();
if ($_SESSION['user'] == null) {
    header('Location: /ecran.com/public_html/index.php');
    exit();
}
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/session.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <span class="success">Déconnexion réussie.</span>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>