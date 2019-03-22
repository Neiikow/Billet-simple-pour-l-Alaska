<?php
require_once('model/ArticleManager.php');
require_once('model/CommentManager.php');

function table($table)
{
    if ($table === 'articles') {
        $manager = new ArticleManager($table);
    }
    elseif ($table === 'comments') {
        $manager = new CommentManager($table);
    }

    return $manager;
}

function posts($table){ return table($table)->getPosts(); }
function post($table, $idPost) { return table($table)->getPost($idPost); }
function firstPost($table){ return table($table)->getFirst(); }
function lastPost($table){ return table($table)->getLast(); }
function nextPost($table, $id){ return table($table)->getNext($id); }
function prevPost($table, $id){ return table($table)->getPrev($id); }
function rowPost($table, $id){ return table($table)->getRow($id); }
function countPosts($table){ return table($table)->getCount(); }
function postComments($table, $idPost){ return table($table)->postComments($idPost); }

function deletePost($table, $id){ table($table)->deletePost(table($table)->getPost($id)); }
function reportPost($table, $id){ table($table)->reportPost(table($table)->getPost($id)); }
function addPost($table, $data){ table($table)->addPost($data); }
function editPost($table, $id){ table($table)->editPost(table($table)->getPost($id)); }

function contact(){ require('view/front/page/contact.php'); }