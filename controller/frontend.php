<?php
require('model/frontend.php');

function home()
{
    $post = getLastPost();
    require('view/accueil.php');
}
function posts()
{
    $posts = getPosts();
    require('view/articles.php');
}
function contact()
{
    $msg = getComments();
    require('view/contact.php');
}