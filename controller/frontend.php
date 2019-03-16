<?php
require_once('model/DbManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function lastPost()
{
    $postManager = new PostManager('posts');
    $post = $postManager->getLastPost();
    $commentManager = new CommentManager('comments');
    $comments = $commentManager->getPostComments($post->id());
    require('view/front/page/home.php');
}
function listPosts()
{
    $postManager = new PostManager('posts');
    $posts = $postManager->getPosts();
    $commentManager = new CommentManager('comments');
    $comments = $commentManager->getComments();
    require('view/front/page/posts.php');
}
function contact()
{
    require('view/front/page/contact.php');
}
function report($id)
{
    $commentManager = new CommentManager('comments');
    $commentManager->reportComment($commentManager->getComment($id));
}