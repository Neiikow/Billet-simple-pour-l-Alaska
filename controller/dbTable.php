<?php
require_once('model/ArticleManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

function getTable($table)
{
    if ($table === 'articles') {
        $manager = new ArticleManager($table);
    }
    elseif ($table === 'comments') {
        $manager = new CommentManager($table);
    }
    elseif ($table === 'members') {
        $manager = new MemberManager($table);
    }

    return $manager;
}