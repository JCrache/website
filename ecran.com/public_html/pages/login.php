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
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/session.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <table id="topics">
        </table><br>
        <form id="login" method="post">
            <span>Nom d'utilisateur:<br>
                <input type="text" name="username"><br><br>
            </span>
            <span>Mot de passe:<br>
                <input type="password" name="password"><br><br>
            </span>
            <input type="submit" value="Envoyer">
        </form>
        <?php
        if (isset($_POST['username']) && isset($_POST['password'])){
            if ($_POST['password'] != '' && $_POST['username'] != '') {
                $_POST['username'] = htmlspecialchars($_POST['username']);
                $_POST['password'] = htmlspecialchars($_POST['password']);
                require('modele.php');
                $pass = getPassword($_POST['username']);
                $bdd_table = $pass->fetch();
                $this_pass_is_correct = password_verify($_POST['password'],$bdd_table['password']);
                if ($this_pass_is_correct) {
                    echo 'Vous êtes connecté';
                    $_SESSION['user'] = $_POST['username'];
                    $_SESSION['id'] = $bdd_table['id'];
                    ?>
                    <script>
                        window.location.replace("forum.php");
                    </script>
                <?php
                }
                else {echo '<br><span class="fail">Mot de passe erronné.</span>';}
            }
        }
        else {
            echo '<br><span>Renseignez vos identifiants.</span>';
        }
        ?>
    </div>
    <div class="foot"><?php include('footer.php')?></div>
</body>
</html>