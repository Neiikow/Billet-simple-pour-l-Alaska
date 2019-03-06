<?php
require_once('model/DbManager.php');
class PostManager extends DbManager
{
    public function getPosts()
    {
        $db = parent::dbConnect();
        $req = $db->query('SELECT * FROM posts ORDER BY id');

        return $req;
    }
    public function getPost($postId)
    {
        $db = parent::dbConnect();
        $req = $db->prepare('SELECT * FROM posts WHERE id = ? ORDER BY id');
        $req->execute(array($postId));
        $req = $req->fetch();

        return $req;
    }
    public function getLastPost()
    {
        $db = parent::dbConnect();
        $req = $db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
        $req = $req->fetch();

        return $req;
    }
}