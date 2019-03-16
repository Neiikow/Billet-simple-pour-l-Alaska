<?php
require_once('model/Comment.php');
class CommentManager extends DbManager
{
    public function __construct($table)
    {
        $this->db = parent::dbConnect();
        $this->table = $table;
    }
    public function getComments()
    {
        $comments = [];
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        
        return $comments;
    }
    public function getPostComments($id)
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
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ? ORDER BY id');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new Comment($data);
    }
    public function initComment()
    {
        
    }
    public function deleteComment()
    {
        
    }
    public function editComment()
    {
        
    }
    public function reportComment(Comment $comment)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 1, PDO::PARAM_INT);
        $req->bindValue(':id', $comment->id(), PDO::PARAM_INT);
        $req->execute();
    }
}