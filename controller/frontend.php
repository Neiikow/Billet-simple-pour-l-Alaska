<?php
require_once('model/DbManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function home()
{
    $postManager = new PostManager('posts');
    $post = $postManager->getLastPost();
    $commentManager = new CommentManager('comments');
    $comments = $commentManager->getPostComments($post->id());
    require('view/front/page/accueil.php');
}
function posts()
{
    $postManager = new PostManager('posts');
    $posts = $postManager->getPosts();
    $commentManager = new CommentManager('comments');
    $comments = $commentManager->getComments();
    require('view/front/page/articles.php');
}
function contact()
{
    require('view/front/page/contact.php');
}