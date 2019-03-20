<?php
require_once('model/Post.php');

class PostManager extends DbManager
{
    public function __construct($table)
    {
        $this->db = parent::dbConnect();
        $this->table = $table;
    }
    public function getPosts()
    {
        $posts = [];
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new Post($data);
        }
        
        return $posts;
    }
    public function getPost($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ? ORDER BY id');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new Post($data);
    }
    public function getLastPost()
    {
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new Post($data);
    }
    public function getFirstPost()
    {
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id LIMIT 1');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new Post($data);
    }
    public function initPost(Post $post)
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
    public function deletePost(Post $post)
    {
        $this->db->query('DELETE FROM  ' . $this->table . '  WHERE id =' . $post->id());
    }
    public function countPost()
    {
        $req = $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
        $nb = $req->fetch(PDO::FETCH_ASSOC);
        
        return (int) $nb['COUNT(*)'];
    }
}