<?php
session_start();
if ($_SESSION['user'] == null || !isset($_POST['message'])) {
    header('Location: /ecran.com/public_html/pages/forum.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/ecran.com/public_html/images/fav.ico" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Envoi post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/forum.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        if (isset($_POST['message'])){
            if ($_POST['message'] != '') {
                $_POST['message'] = htmlspecialchars($_POST['message']);
                $_POST['message'] = preg_replace('#\[b\](.+)\[/b\]#i','<strong>$1</strong>',$_POST['message']);
                $_POST['message'] = preg_replace('#\[i\](.+)\[/i\]#i','<em>$1</em>',$_POST['message']);
                $_POST['message'] = preg_replace('#\[s\](.+)\[/s\]#i','<u>$1</u>',$_POST['message']);
                $_POST['message'] = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#i','<span style="color:$1">$2</span>',$_POST['message']);
                $_POST['message'] = preg_replace('#https?://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $_POST['message']);
                require('modele.php');
                sendPost($_POST['page'],$_POST['author'],$_POST['message']);
                $_POST['message'] = NULL;
                ?>
                <script>
                   window.location.replace("posts.php?page=<?php echo $_POST['page'];?>");
                </script>
                <?php
            }
            else {
                echo '<span class="fail">Veuillez remplir correctement votre message</span>';
                $message = NULL;
                sleep(2000);
                ?>
                <script>
                    window.location.replace("posts.php?page=<?php echo $_POST['page'];?>");
                </script>
                <?php
            }
        }
        else {
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>