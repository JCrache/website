<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/forum.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        if (isset($_GET['page'])) {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8','root','viveris');
        $requete = 'SELECT DISTINCT u.username author, m.content content, m.date datevalue
                    FROM topic t, message m
                    INNER JOIN user u
                    ON m.topic_id = ? AND m.user_id = u.id
                    ORDER BY datevalue';
        $topics = $bdd->prepare($requete);
        $topics->execute(array($_GET['page']));
        ?>
        <table id="topics">
        <?php
        while ($donnees = $topics->fetch()) {
            ?>
            <tr>
            <td class="infos">
                <span id="auteur"><?php echo $donnees['author'];?></span><br>
                <span id="date"><?php echo 'Le ' . $donnees['datevalue'];?></span>
            </td>
            <td class="message">
                <span class="content"><?php echo nl2br($donnees['content']);?></span>
                <span id="retour"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a></span>
            </td>
            </tr>
            <?php
        }
        ?>
        </table><br>
        <?php
        if ($user_is_connected) {
            ?>
            <table id="topics">
                <tr>
                <td class="infos">
                    <span id="auteur"><?php echo $_SESSION['user'];?></span><br>
                </td>
                <td class="message">
                    <form method="post" action="send_post.php">
                        <input type="hidden" name="page" value="<?php echo $_GET['page'];?>" />
                        <input type="hidden" name="author" value="<?php echo $_SESSION['id'];?>">
                        <textarea name="message" minlength="3"></textarea><br>
                        <input type="submit" value="Envoyer">
                    </form>
                </td>
                </tr>
            </table>
            
            <?php
            }
        }
        else {}
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>