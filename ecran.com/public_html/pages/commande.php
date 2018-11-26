<?php
session_start();
if ($_SESSION['user'] == null || !isset($_POST['quantite'])) {
    header('Location: /ecran.com/public_html/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Commande</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        if ($user_is_connected) {
            if (isset($_POST['quantite'])){
                if ($_POST['quantite'] != '' && $_POST['date'] != '') {
                    require('modele.php');
                    sendCommand($_POST['type'], $_POST['quantite'], $_POST['date'], $_POST['id']);
                    unset($_POST);
                }
                else {
                    echo '<span class="fail">Renseignez correctement les champs, patate !</span><br>';
                }
            }
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>