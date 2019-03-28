<?php
require_once('model/DbManager.php');

class PostManager
{
    use DbManager;

    public function getPosts()
    {
        $posts = [];
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new $this->_post($data);
        }
        if ($posts) {
            return $posts;
        } else {
            throw new Exception("Aucun ". $this->table ." disponible");
        }
    }
    public function getPost($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ? ORDER BY id');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        } else {
            throw new Exception("Aucun ". $this->table ." disponible");
        }
    }
    public function getCount()
    {
        $req = $this->db->query('SELECT COUNT(*) FROM ' . $this->table);
        $nb = $req->fetch(PDO::FETCH_ASSOC);
        if ($nb) {
            return (int) $nb['COUNT(*)'];
        } else {
            throw new Exception("Aucun ". $this->table ." disponible");
        }
    }
    public function getRow($id)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM ' . $this->table . ' WHERE id <= ? ORDER BY id');
        $req->execute(array($id));
        $nb = $req->fetch(PDO::FETCH_ASSOC);
        if ($nb) {
            return (int) $nb['COUNT(*)'];
        } else {
            throw new Exception("Aucun ". $this->table ." disponible");
        }
    }
    public function getNext($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id > ? ORDER BY id ASC LIMIT 1');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function getPrev($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id < ? ORDER BY id DESC LIMIT 1');
        $req->execute(array($id));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function getLast()
    {
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        } else {
            throw new Exception("Aucun ". $this->table ." disponible");
        }
    }
    public function getFirst()
    {
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id LIMIT 1');
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        } else {
            throw new Exception("Aucun ". $this->table ." disponible");
        }
    }
    public function deletePost(Post $post)
    {
        $this->db->query('DELETE FROM  ' . $this->table . '  WHERE id =' . $post->id());
    }
    public function reportPost($id)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 1, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
    public function validePost($id)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 0, PDO::PARAM_INT);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
    public function getReportedPosts()
    {
        $posts = [];
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE reported = 1 ORDER BY id DESC');
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $posts[] = new $this->_post($data);
        }
        if ($posts) {
            return $posts;
        } else {
            throw new Exception("Aucun ". $this->table ." signalé");
        }
    }
}