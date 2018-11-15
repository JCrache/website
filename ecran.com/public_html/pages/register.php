<?php
session_start();
if (isset($_SESSION['user'])) {
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
    <title>Création compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/ecran.com/public_html/styles/session.css" />
</head>
<body>
    <div class="head"><?php include('header.php')?></div>
    <div class="contenu">
        <?php
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8','root','viveris');
        if (isset($_POST['mail']) AND isset($_POST['password']) 
        AND isset($_POST['username']) AND isset($_POST['password2'])){
            $_POST['mail'] = htmlspecialchars($_POST['mail']);
            $_POST['username'] = htmlspecialchars($_POST['username']);
            $_POST['password'] = htmlspecialchars($_POST['password']);
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['mail'])
                AND $_POST['password'] != '' AND $_POST['username'] != '' 
                AND !(stripos($_POST['username'], ' ')) AND $_POST['password'] == $_POST['password2']) {
                $date = date("Y-m-d H:i:s");
                $users = $bdd->prepare('SELECT COUNT(*) FROM user WHERE username=? OR email=?');
                $users->execute(array($_POST['username'], $_POST['mail']));
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
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $req = $bdd->prepare('INSERT INTO user(username,email,password,create_time) VALUES(:name,:email,:password,:date)');
                $req->execute(array(
                    'name' => $_POST['username'],
                    'email' => $_POST['mail'],
                    'date' => $date,
                    'password' => $pass_hash,
                ));
                echo '<span class="success">Utilisateur enregistré !</span><br>';
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
                <span>Assurez-vous que votre email est valide (pas de majuscule), votre pseudo est valide (pas d'espace),
                 les mots de passe correspondent. Si tel est le cas, ce pseudo est déjà pris.</span>
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