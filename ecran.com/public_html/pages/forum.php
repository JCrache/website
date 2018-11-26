<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/forum.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <table class="topics">
        <?php
        require('modele.php');
        $topics = getTopics();
        while ($donnees = $topics->fetch()) {
            ?>
            <tr>
            <td class="topic">
                <a class="titre" href="/ecran.com/public_html/pages/posts.php?page=<?php echo $donnees['topic_id'];?>"><?php echo $donnees['titre'];?></a>
                <span class="auteur">Par <?php echo $donnees['author'];?> le <?php echo $donnees['datevalue'];?></span>
            </td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
        if ($user_is_connected) {
            ?>
            <p class="button">
                <a href="newtopic.php">Nouveau sujet</a>
            </p>
            <?php
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>