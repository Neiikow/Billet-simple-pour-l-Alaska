<?php
require_once('model/Comment.php');
class CommentManager extends DbManager
{
    public function __construct($table)
    {
        $this->db = parent::dbConnect();
        $this->table = $table;
    }
    public function getComments($id)
    {
        $comments = [];
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE postId = ? ORDER BY id');
        $req->execute(array($id));
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        
        return $comments;
    }
    public function getComment($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new Comment($data);
    }
    public function initComment(Comment $comment)
    {
        $req = $this->db->prepare('INSERT INTO ' . $this->table . '(postId, author, text) VALUES(:postId, :author, :text)');
        $req->bindValue(':postId', $comment->postId(), PDO::PARAM_INT);
        $req->bindValue(':text', $comment->text(), PDO::PARAM_STR);
        $req->bindValue(':author', $comment->author(), PDO::PARAM_STR);
        $req->execute();
    }
    public function editComment(Comment $comment)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET author = :author, text = :text WHERE id = :id');
        $req->bindValue(':author', $comment->title(), PDO::PARAM_STR);
        $req->bindValue(':text', $comment->text(), PDO::PARAM_STR);
        $req->bindValue(':id', $comment->id(), PDO::PARAM_INT);
        $req->execute();
    }
    public function deleteComment(Comment $comment)
    {
        $this->db->query('DELETE FROM  ' . $this->table . '  WHERE id =' . $comment->id());
    }
    public function reportComment(Comment $comment)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 1, PDO::PARAM_INT);
        $req->bindValue(':id', $comment->id(), PDO::PARAM_INT);
        $req->execute();
    }
}