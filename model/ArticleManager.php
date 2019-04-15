<?php
namespace Jordan\Blog\Model;
require_once('model/PostManager.php');
require_once('model/Article.php');

class ArticleManager extends PostManager
{
    protected $_post = "\Jordan\Blog\Model\Article";

    public function __construct($table)
    {
        $this->db = $this->dbConnect();
        $this->table = $table;
    }
    
    public function addPost(Article $post)
    {
        $req = $this->db->prepare('INSERT INTO ' . $this->table . '(title, author, text, grp) VALUES(:title, :author, :text, :grp)');
        $req->bindValue(':title', $post->title(), \PDO::PARAM_STR);
        $req->bindValue(':text', $post->text(), \PDO::PARAM_STR);
        $req->bindValue(':author', $post->author(), \PDO::PARAM_STR);
        $req->bindValue(':grp', $post->grp(), \PDO::PARAM_STR);
        $req->execute();
    }
    public function editPost(Article $post)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET title = :title, text = :text WHERE id = :id');
        $req->bindValue(':title', $post->title(), \PDO::PARAM_STR);
        $req->bindValue(':text', $post->text(), \PDO::PARAM_STR);
        $req->bindValue(':id', $post->id(), \PDO::PARAM_INT);
        $req->execute();
    }
}