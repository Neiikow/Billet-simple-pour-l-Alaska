<?php
require_once('model/PostManager.php');
require_once('model/Article.php');

class ArticleManager extends PostManager
{
    protected $_post = "Article";

    public function __construct($table)
    {
        $this->db = $this->dbConnect();
        $this->table = $table;
    }
    
    public function addPost(Post $post)
    {
        $req = $this->db->prepare('INSERT INTO ' . $this->table . '(title, author, text) VALUES(:title, :author, :text)');
        $req->bindValue(':title', $post->title(), PDO::PARAM_STR);
        $req->bindValue(':text', $post->text(), PDO::PARAM_STR);
        $req->bindValue(':author', $post->author(), PDO::PARAM_STR);
        $req->execute();
    }
    public function editPost(Post $post)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET title = :title, text = :text WHERE id = :id');
        $req->bindValue(':title', $post->title(), PDO::PARAM_STR);
        $req->bindValue(':text', $post->text(), PDO::PARAM_STR);
        $req->bindValue(':id', $post->id(), PDO::PARAM_INT);
        $req->execute();
    }
}