<?php
require_once('controller/dbTable.php');

function posts($table){ return getTable($table)->getPosts(); }
function post($table, $idPost) { return getTable($table)->getPost($idPost); }
function firstPost($table){ return getTable($table)->getFirst(); }
function lastPost($table){ return getTable($table)->getLast(); }
function nextPost($table, $id){ return getTable($table)->getNext($id); }
function prevPost($table, $id){ return getTable($table)->getPrev($id); }
function rowPost($table, $id){ return getTable($table)->getRow($id); }
function countPosts($table){ return getTable($table)->getCount(); }
function postComments($table, $idPost){ return getTable($table)->postComments($idPost); }

function login($table, $name, $password){ return getTable($table)->getLogMember($name, $password); }