<?php
function dbConnect()
{
    require('dbConfig.php');
    try
    {
        $db = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPassword);
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM posts ORDER BY id');

    return $req;
}
function getLastPost()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
    $req = $req->fetch();

    return $req;
}
function getPost()
{
    //$db = dbConnect();
    $post = "Un seul post";

    return $post;
}
function getComments()
{
    //$db = dbConnect();
    $comments = "Tout les commentaires";

    return $comments;
}