<?php
require_once('model/DbManager.php');

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
            $posts[] = new $this->post($data);
        }
        
        return $posts;
    }
    public function getPost($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ? ORDER BY id');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new $this->post($data);
    }
    public function getCount()
    {
        $req = $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
        $nb = $req->fetch(PDO::FETCH_ASSOC);
        
        return (int) $nb['COUNT(*)'];
    }
    public function getRow($id)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM ' . $this->table . ' WHERE id <= ? ORDER BY id');
        $req->execute(array($id));
        $nb = $req->fetch(PDO::FETCH_ASSOC);
        
        return (int) $nb['COUNT(*)'];
    }
    public function getNext($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id > ? ORDER BY id ASC LIMIT 1');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->post($data);
        }
    }
    public function getPrev($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id < ? ORDER BY id DESC LIMIT 1');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->post($data);
        }
    }
    public function getLast()
    {
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new $this->post($data);
    }
    public function getFirst()
    {
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id LIMIT 1');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        
        return new $this->post($data);
    }
    public function deletePost(Post $post)
    {
        $this->db->query('DELETE FROM  ' . $this->table . '  WHERE id =' . $post->id());
    }
    public function reportPost(Post $post)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 1, PDO::PARAM_INT);
        $req->bindValue(':id', $post->id(), PDO::PARAM_INT);
        $req->execute();
    }
}