<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Accès sécurisé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
    <?php
        if (isset($_POST['password'])) {
            if ($_POST['password'] == "code") {
                ?>
                Authentification réussie !<br><br>
                Les codes sont:<br>
                <strong>24 12</strong><br><br>
                La clé est:<br>
                <img src="/images/cle_54bgrz5gz.png" alt="cle">
                <br>
                <?php
            }
            else if ($_POST['password'] == "babyfoot") {
                ?>
                Authentification réussie !<br><br>
                Voici ce que vous cherchez:<br>
                <img src="/images/jeu_6e54gz95e.jpg" alt="babyfoot">
                <br>
                <?php
            }
            else {
                ?>
                Le mot de passe est incorrect.<br><br>
                <a href="/pages/auth.php"><br><br>Essayer à nouveau</a>
                <?php
            }
        }
        else {
            ?>
            <span>Accédez au contenu de cette page en renseignant un code dans l'onglet Authentification.</span>
            <?php
        }
    ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>