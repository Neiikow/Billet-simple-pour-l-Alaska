<?php
require('model/frontend.php');

function accueil()
{
    $msg = getPosts();
    require('view/accueil.php');
}
function articles()
{
    $msg = getPost();
    require('view/articles.php');
}
function contact()
{
    $msg = getComments();
    require('view/contact.php');
}