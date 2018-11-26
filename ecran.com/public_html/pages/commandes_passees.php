<?php
session_start();
if ($_SESSION['user'] == null || $_SESSION['user'] != 'admin') {
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
    <title>Commandes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/patates.css" />
    <script type="text/javascript" src="/scripts/json_maker.js"></script>
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        require('modele.php');
        $commandes = getCommandesPatates();
        ?>
        <table id="commandes">
        <tr>
            <th class="client">Client</th>
            <th class="type">Type</th>
            <th class="quantite">Quantite (en kg)</th>
            <th class="date">Date de livraison voulue</th>
        </tr>
        <?php
        while ($donnees = $commandes->fetch()) {
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
        <button type="button" onclick="window.location.href='/files/commandes.json'">Télécharger au format JSON</button>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>