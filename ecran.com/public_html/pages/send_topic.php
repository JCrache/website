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
    <title>Envoi sujet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/forum.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        if (isset($_POST['message']) AND isset($_POST['title'])){
        if ($_POST['message'] != '' AND $_POST['title'] != '') {
            $_POST['message'] = htmlspecialchars($_POST['message']);
            $_POST['message'] = preg_replace('#\[b\](.+)\[/b\]#i','<strong>$1</strong>',$_POST['message']);
            $_POST['message'] = preg_replace('#\[i\](.+)\[/i\]#i','<em>$1</em>',$_POST['message']);
            $_POST['message'] = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#i','<span style="color:$1">$2</span>',$_POST['message']);
            $_POST['message'] = preg_replace('#https?://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $_POST['message']);
            $_POST['title'] = htmlspecialchars($_POST['title']);
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8','root','viveris');
            $date = date("Y-m-d H:i:s");
            $req = $bdd->prepare('INSERT INTO topic(author_id,date,title) VALUES(:author_id,:date,:title)');
            $req->execute(array(
                'author_id' => $_SESSION['id'],
                'date' => $date,
                'title' => $_POST['title'],
            ));
            $id = $bdd->lastInsertId();
            $req = $bdd->prepare('INSERT INTO message(topic_id,user_id,date,content) VALUES(:topic_id,:user_id,:date,:content)');
                $req->execute(array(
                    'topic_id' => $id,
                    'user_id' => $_SESSION['id'],
                    'date' => $date,
                    'content' => $_POST['message'],
            ));
            $message = NULL;
                ?>
                <script>
                    window.location.replace("posts.php?page=<?php echo $id;?>");
                </script>
                <?php
        }
        else {
            echo '<span class="fail">Veuillez remplir les champs correctement</span>';
        }}
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>