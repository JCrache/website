<?php
session_start();
if ($_SESSION['user'] == null) {
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
    <title>Nouveau sujet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/forum.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <table id="topics">
                <tr>
                <td class="infos">
                    <span id="auteur"><?php echo $_SESSION['user'];?></span><br>
                </td>
                <td class="message">
                    <form method="post" action="send_topic.php">
                        &nbsp;Titre:<br>
                        <input type="text" name="title" minlength="6"><br><br>
                        &nbsp;Message:<br>
                        <textarea name="message" minlength="20"></textarea><br>
                        <input type="submit" value="Envoyer">
                    </form>
                </td>
                </tr>
        </table>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>