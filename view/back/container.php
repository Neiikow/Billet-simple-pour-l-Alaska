<?php
if (isset($data['articles']))
{
    require('view/back/articles/articles.php');
} 
if (isset($data['comments']))
{
    require('view/back/comments/comment.php');
} 
?>
