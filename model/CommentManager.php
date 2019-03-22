<?php
require_once('model/PostManager.php');
require_once('model/Comment.php');

class CommentManager extends PostManager
{
    public function __construct($table)
    {
        $this->post = "Comment";
        $this->db = parent::dbConnect();
        $this->table = $table;
    }

    public function postComments($id)
    {
        $comments = [];
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE postId = ? ORDER BY id');
        $req->execute(array($id));
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new $this->post($data);
        }
        
        return $comments;
    }
    public function addPost(Comment $comment)
    {
        $req = $this->db->prepare('INSERT INTO ' . $this->table . '(postId, author, text) VALUES(:postId, :author, :text)');
        $req->bindValue(':postId', $comment->postId(), PDO::PARAM_INT);
        $req->bindValue(':text', $comment->text(), PDO::PARAM_STR);
        $req->bindValue(':author', $comment->author(), PDO::PARAM_STR);
        $req->execute();
    }
    public function editPost(Comment $comment)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET author = :author, text = :text WHERE id = :id');
        $req->bindValue(':author', $comment->title(), PDO::PARAM_STR);
        $req->bindValue(':text', $comment->text(), PDO::PARAM_STR);
        $req->bindValue(':id', $comment->id(), PDO::PARAM_INT);
        $req->execute();
    }
}