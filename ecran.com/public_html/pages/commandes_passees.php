<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] != 'admin') {
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
    <title>Commandes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/patates.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8','root','viveris');
        $requete = 'SELECT DISTINCT u.username client, c.type type, c.quantite quantite, c.date_livraison date
                    FROM commande c
                    INNER JOIN user u
                    ON c.client = u.id
                    ORDER BY date';
        $topics = $bdd->prepare($requete);
        $topics->execute();
        ?>
        <table id="commandes">
        <tr>
            <th class="client">Client</th>
            <th class="type">Type</th>
            <th class="quantite">Quantite (en kg)</th>
            <th class="date">Date de livraison voulue</th>
        </tr>
        <?php
        while ($donnees = $topics->fetch()) {
            ?>
            <tr>
            <td class="client">
                <span id="auteur"><?php echo $donnees['client'];?></span>
            </td>
            <td class="type">
                <span id="auteur"><?php echo $donnees['type'];?></span>
            </td>
            <td class="quantite">
                <span id="auteur"><?php echo $donnees['quantite'];?></span>
            </td>
            <td class="date">
                <span id="auteur"><?php echo $donnees['date'];?></span>
            </td>
            </tr>
            <?php
        }
        ?>
        </table><br>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>