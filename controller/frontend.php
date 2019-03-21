<?php
require_once('model/DbManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function lastPost()
{
    $postManager = new PostManager('posts');
    
    return $postManager->getLastPost();
}
function firstPost()
{
    $postManager = new PostManager('posts');
    
    return $postManager->getFirstPost();
}
function nextPost()
{
    $postManager = new PostManager('posts');

    return $postManager->getPosts();
}
function prevPost()
{
    $postManager = new PostManager('posts');

    return $postManager->getPosts();
}
function posts()
{
    $postManager = new PostManager('posts');

    return $postManager->getPosts();
}
function countPost()
{
    $postManager = new PostManager('posts');

    return $postManager->countPost();
}
function post($idPost)
{
    $postManager = new PostManager('posts');

    return $postManager->getPost($idPost);
}
function comments($idPost)
{
    $commentManager = new CommentManager('comments');

    return $commentManager->getComments($idPost);
}
function comment($idComment)
{
    $commentManager = new CommentManager('comments');

    return $commentManager->getComment($idComment);
}
function contact()
{
    require('view/front/page/contact.php');
}
function report($idid)
{
    $commentManager = new CommentManager('comments');
    $commentManager->reportComment($commentManager->getComment($id));
}
function addComment($comment)
{
    $commentManager = new CommentManager('comments');
    $commentManager->initComment($comment);
}
function addPost($post)
{
    $postManager = new PostManager('posts');
    $postManager->initPostt($post);
}
function delete($id)
{
    $commentManager = new CommentManager('comments');
    $commentManager->deleteComment($commentManager->getComment($id));
}
function edit($id)
{
    $commentManager = new CommentManager('comments');
    $commentManager->editComment($commentManager->getComment($id));
}