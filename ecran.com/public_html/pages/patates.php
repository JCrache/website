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
    <title>Patates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/patates.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        if ($user_is_connected) {
        ?>
        <table id="patates">
            <tr>
                <td>Pomme de terre nouvelle</td>
                <td>Patate douce</td>
                <td>Pomme de terre</td>
            </tr>
            <tr>
                <td><img src="/images/nouvelle.jpg" alt="Pomme de terre nouvelle"></td>
                <td><img src="/images/douce.jpg" alt="Patate douce"></td>
                <td><img src="/images/patate.jpg" alt="Pomme de terre"></td>
            </tr>
        </table>
        <div id="patate_form">
        <form method="post" action="commande.php">
            <span> Type de pomme de terre:<br></span>
            <select name="type">
                <option value="patate">Pomme de terre</option>
                <option value="douce">Patate douce</option>
                <option value="nouvelle">Pomme de terre nouvelle</option>
            </select><br><br>
            <span>Quantité (en kg):<br></span>
            <input type="number" name="quantite" min="1"><br><br>
            <span>Date de livraison:<br></span>
            <input type="date" name="date" min="<?php echo date('Y-m-d');?>"><br><br>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
            <input type="submit" value="Passer commande">
        </form>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>