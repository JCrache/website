<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/contact.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <div id="contact_form">
        <form method="post">
            <span>Votre email:<br></span>
            <input type="text" name="mailadd"><br><br>
            <span>Votre message:<br></span>
            <textarea name="message" rows="8" cols="40"></textarea><br>
            <input type="submit" value="Envoyer">
        </form>
        <br><br><br><br>
        </div>
        <?php
        if (isset($_POST['message'])){
            if ($_POST['message'] != ''
             && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['mailadd'])) {
                $retour=mail('jeremy.roquin@cpe.fr','Contact web',$_POST['message'],'From: ' . $_POST['mailadd']);
                if($retour) {
                    echo '<span class="success">Message envoyé !</span>';
                }
                else {
                    echo '<span class="fail">Hum, il y a eu un soucis !</span>';
                }
            }
            else {
                echo '<span class="fail">Veuillez remplir tous les champs correctement.</span>';
            }
        }
        else {
            echo 'Veuillez renseigner votre adresse email et votre message';
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>