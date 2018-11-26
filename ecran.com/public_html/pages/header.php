<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="/styles/header_footer.css" />
    <script type="text/javascript" src="/scripts/time.js"></script>
</head>
<body onload="settime()">
    <div class="header">
        <p>
            JCrache Inc.<span id="heure"></span>
            <?php
            $user_is_connected = false;
            if (isset($_SESSION['user'])) {
                $user_is_connected = true;
                echo '<span id="username">Bienvenue ' . $_SESSION['user'] . ' !</span>';
            }
            ?>
        </p>
        <ul id="sommaire">
            <li class="page">
                <a href="/index.php">Accueil</a>
            </li>
            <li class="page">
                <a href="/pages/forum.php">Forum</a>
            </li>
            <li class="page">
                <a href="/pages/contact.php">Contact</a>
            </li>
            <?php
            if ($user_is_connected) {
                if ($_SESSION['user'] == 'admin') {
                    ?>
                    <li class="page">
                        <a href="/pages/commandes_passees.php">Commandes</a>
                    </li>
                    <?php
                }
                else {
                    ?>
                    <li class="page">
                        <a href="/pages/patates.php">Patates</a>
                    </li>
                    <?php
                }
            }
            ?>
            <li class="page" id="acces">
                <a href="/pages/auth.php">Authentification</a>
            </li>
            <?php
            if ($user_is_connected) {
                ?>
                <li class="log">
                    <a href="/pages/logout.php">Déconnexion</a>
                </li>
                <?php
            }
            else {
                ?>
                <li class="log">
                    <a href="/pages/login.php">Connexion</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</body>
</html>