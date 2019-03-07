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
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        
        return $comments;
    }
    public function getPostComments($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE postId = ? ORDER BY id');
        $req->execute(array($id));
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $comments[] = new Comment($data);
        }
        
        return $comments;
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
    public function reportComment()
    {
        
    }
}