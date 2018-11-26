<?php
session_start();
if (isset($_SESSION['user'])) {
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
    <title>Création compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/session.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        if (isset($_POST['mail']) && isset($_POST['password']) 
        && isset($_POST['username']) && isset($_POST['password2'])){
            $_POST['mail'] = htmlspecialchars($_POST['mail']);
            $_POST['username'] = htmlspecialchars($_POST['username']);
            $_POST['password'] = htmlspecialchars($_POST['password']);
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['mail'])
                && $_POST['password'] != '' && $_POST['username'] != '' 
                && !(stripos($_POST['username'], ' ')) && $_POST['password'] == $_POST['password2']) {
                require('modele.php');
                $users = getExistingUsers($_POST['username'], $_POST['mail']);
                $count = $users->fetch();
                if ($count[0] != 0) {
                    echo '<span class="success">Un compte existe déjà avec ce nom d\'utilisateur ou cette adresse mail.</span><br>';
                    unset($_POST);
                ?>
                <p class="button">
                <a href="newaccount.php">Essayer à nouveau</a>
                </p>
                <?php
                }
                else {
                    sendUser($_POST['username'], $_POST['mail'], $_POST['password']);
                    unset($_POST);
                    ?>
                    <p class="button">
                    <a href="login.php">Se connecter</a>
                    </p>
                    <?php
                }
            }
            else {
                ?>
                <span class="fail">Erreur !</span><br>
                <span>Assurez-vous que votre email est valide, que votre pseudo est valide (pas d'espace) et
                 que les mots de passe correspondent.</span>
                <p class="button">
                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Essayer à nouveau</a>
                </p>
                <?php
            }
        }
        
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>