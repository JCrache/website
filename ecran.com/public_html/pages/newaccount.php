<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nouveau compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/session.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <form id="registration" method="post" action="register.php">
            <span>Nom d'utilisateur:<br>
                <input type="text" name="username"><br><br>
            </span>
            <span>Adresse mail:<br>
                <input type="text" name="mail"><br><br>
            </span>
            <span>Mot de passe:<br>
                <input type="password" name="password"><br><br>
            </span>
            <span>Confirmez le mot de passe:<br>
                <input type="password" name="password2"><br><br>
            </span>
            <input type="submit" value="Envoyer">
        </form>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>