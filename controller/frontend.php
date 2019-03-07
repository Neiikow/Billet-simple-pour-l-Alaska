<?php
require_once('model/DbManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function home()
{
    $postManager = new PostManager('posts');
    $post = $postManager->getLastPost();
    require('view/accueil.php');
}
function posts()
{
    $postManager = new PostManager('posts');
    $posts = $postManager->getPosts();
    require('view/articles.php');
}
function contact()
{
    require('view/contact.php');
}