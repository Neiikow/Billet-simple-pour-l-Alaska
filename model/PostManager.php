<?php
namespace Jordan\Blog\Model;
require_once('model/DbManager.php');

class PostManager
{
    use DbManager;

    public function getPosts($grp)
    {
        $posts = [];
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE grp = ? ORDER BY id DESC');
        $req->execute(array($grp));
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $posts[] = new $this->_post($data);
        }
        if ($posts) {
            return $posts;
        }
    }
    public function getPost($id)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function getCount($grp)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM ' . $this->table . ' WHERE grp = ?');
        $req->execute(array($grp));
        $nb = $req->fetch(\PDO::FETCH_ASSOC);
        if ($nb) {
            return (int) $nb['COUNT(*)'];
        }
    }
    public function getRow($id, $grp)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM ' . $this->table . ' WHERE id <= ? AND grp = ? ORDER BY id');
        $req->execute(array($id, $grp));
        $nb = $req->fetch(\PDO::FETCH_ASSOC);
        if ($nb) {
            return (int) $nb['COUNT(*)'];
        }
    }
    public function getNext($id, $grp)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id > ? AND grp = ? ORDER BY id ASC LIMIT 1');
        $req->execute(array($id, $grp));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function getPrev($id, $grp)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id < ? AND grp = ? ORDER BY id DESC LIMIT 1');
        $req->execute(array($id, $grp));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function getLast($grp)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE grp = ? ORDER BY id DESC LIMIT 1');
        $req->execute(array($grp));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function getFirst($grp)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE grp = ? ORDER BY id LIMIT 1');
        $req->execute(array($grp));
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if ($data) {
            return new $this->_post($data);
        }
    }
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM  ' . $this->table . '  WHERE id =' . $id);
    }
    public function reportPost($id)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 1, \PDO::PARAM_INT);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();
    }
    public function validePost($id)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET reported = :reported WHERE id = :id');
        $req->bindValue(':reported', 0, \PDO::PARAM_INT);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        $req->execute();
    }
    public function getReportedPosts()
    {
        $posts = [];
        $req = $this->db->query('SELECT * FROM ' . $this->table . ' WHERE reported = 1 ORDER BY id DESC');
        while ($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $posts[] = new $this->_post($data);
        }
        if ($posts) {
            return $posts;
        }
    }
}