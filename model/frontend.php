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
    //$db = dbConnect();
    $posts = "Tout les posts";

    return $posts;
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