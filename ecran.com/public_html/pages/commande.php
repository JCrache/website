<?php
session_start();
if ($_SESSION['user'] == null) {
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
                if ($_POST['quantite'] != '') {
                    $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8','root','viveris');
                    $date = date("Y-m-d H:i:s");
                    $req = $bdd->prepare('INSERT INTO commande(type,quantite,date_livraison,client) VALUES(:type,:quantite,:date,:id)');
                    $req->execute(array(
                        'type' => $_POST['type'],
                        'quantite' => $_POST['quantite'],
                        'date' => $_POST['date'],
                        'id' => $_POST['id'],
                    ));
                    echo '<span class="success">Commande passée !</span>';
                    $_POST['type'] = NULL;
                }
            }
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>