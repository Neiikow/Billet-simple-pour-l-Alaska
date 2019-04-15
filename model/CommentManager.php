<?php
namespace Jordan\Blog\Model;
require_once('model/PostManager.php');
require_once('model/Comment.php');

class CommentManager extends PostManager
{
    protected $_post = "\Jordan\Blog\Model\Comment";

    public function __construct($table)
    {
        $this->db = $this->dbConnect();
        $this->table = $table;
    }

    public function postComments($id)
    {
        $comments = [];
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE postId = ? ORDER BY id DESC');
        $req->execute(array($id));
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $comments[] = new $this->_post($data);
        }
        
        return $comments;
    }
    public function deletePosts($id)
    {
        $this->db->query('DELETE FROM  ' . $this->table . '  WHERE postId =' . $id);
    }
    public function addPost(Comment $post)
    {
        $req = $this->db->prepare('INSERT INTO ' . $this->table . '(postId, author, text, grp) VALUES(:postId, :author, :text, :grp)');
        $req->bindValue(':postId', $post->postId(), \PDO::PARAM_INT);
        $req->bindValue(':text', $post->text(), \PDO::PARAM_STR);
        $req->bindValue(':author', $post->author(), \PDO::PARAM_STR);
        $req->bindValue(':grp', $post->grp(), \PDO::PARAM_STR);
        $req->execute();
    }
}