<?php
require_once('controller/dbTable.php');

function deletePost($table, $id){ getTable($table)->deletePost(getTable($table)->getPost($id)); }
function reportPost($table, $id){ getTable($table)->reportPost(getTable($table)->getPost($id)); }
function addPost($table, $data){ getTable($table)->addPost($data); }
function editPost($table, $id){ getTable($table)->editPost(getTable($table)->getPost($id)); }