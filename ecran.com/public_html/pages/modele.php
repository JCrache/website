<?php

function getBDD() {
    try {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8','root','viveris');
        return $bdd;
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function getCommandesPatates() {
    $bdd = getBDD();
    $requete = 'SELECT DISTINCT u.username client, c.type type, c.quantite quantite, c.date_livraison date
                    FROM commande c
                    INNER JOIN user u
                    ON c.client = u.id
                    ORDER BY date';
    $commandes = $bdd->prepare($requete);
    $commandes->execute();

    return $commandes;
}

function getTopics() {
    $bdd = getBDD();
    $topics = $bdd->query('SELECT u.username author, t.title titre, t.date datevalue, t.id topic_id
                                FROM user u INNER JOIN topic t
                                ON u.id = t.author_id');

    return $topics;
}

function getPosts($id) {
    $bdd = getBDD();
    $requete = 'SELECT DISTINCT u.username author, m.content content, m.date datevalue
                FROM topic t, message m
                INNER JOIN user u
                ON m.topic_id = ? AND m.user_id = u.id
                ORDER BY datevalue';
    $posts = $bdd->prepare($requete);
    $posts->execute(array($id));

    return $posts;
}

function getPassword($username) {
    $bdd = getBDD();
    $requete = 'SELECT password, id FROM user WHERE username=?';
    $pass = $bdd->prepare($requete);
    $pass->execute(array($username));

    return $pass;
}

function sendPost($page, $author, $message) {
    $bdd = getBDD();
    $date = date("Y-m-d H:i:s");
    $req = $bdd->prepare('INSERT INTO message(topic_id,user_id,date,content) VALUES(:topic_id,:user_id,:date,:content)');
    $req->execute(array(
        'topic_id' => $page,
        'user_id' => $author,
        'date' => $date,
        'content' => $message,
    ));
    echo '<span class="success">Message posté !</span>';
}

function sendTopic($userId, $title) {
    $bdd = getBDD();
    $date = date("Y-m-d H:i:s");
    $req = $bdd->prepare('INSERT INTO topic(author_id,date,title) VALUES(:author_id,:date,:title)');
    $req->execute(array(
        'author_id' => $userId,
        'date' => $date,
        'title' => $title,
    ));
    $id = $bdd->lastInsertId();
    return $id;
}

function getExistingUsers($username, $mail) {
    $bdd = getBDD();
    $users = $bdd->prepare('SELECT COUNT(*) FROM user WHERE username=? OR email=?');
    $users->execute(array($username, $mail));

    return $users;
}

function sendUser($username, $mail, $password) {
    $bdd = getBDD();
    $date = date("Y-m-d H:i:s");
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $req = $bdd->prepare('INSERT INTO user(username,email,password,create_time) VALUES(:name,:email,:password,:date)');
    $req->execute(array(
        'name' => $username,
        'email' => $mail,
        'date' => $date,
        'password' => $pass_hash,
    ));
    echo '<span class="success">Utilisateur enregistré !</span><br>';
}

function sendCommand($type, $quantite, $date, $id) {
    $bdd = getBDD();
    $req = $bdd->prepare('INSERT INTO commande(type,quantite,date_livraison,client) VALUES(:type,:quantite,:date,:id)');
    $req->execute(array(
        'type' => $type,
        'quantite' => $quantite,
        'date' => $date,
        'id' => $id,
    ));
    echo '<span class="success">Commande passée !</span>';
}