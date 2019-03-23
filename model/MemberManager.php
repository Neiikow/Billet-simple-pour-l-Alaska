<?php
require_once('model/DbManager.php');
require_once('model/Member.php');

class MemberManager
{
    use DbManager;

    public function __construct($table)
    {
        $this->db = $this->dbConnect();
        $this->table = $table;
    }
    
    public function getLogMember($name, $password)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE name = ? AND password = ? ORDER BY id');
        $req->execute(array($name, $password));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Member($data);
        }
    }
    public function editMember(Member $member)
    {
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET name = :name, password = :password, role = :role WHERE id = :id');
        $req->bindValue(':name', $member->name(), PDO::PARAM_STR);
        $req->bindValue(':password', $member->password(), PDO::PARAM_STR);
        $req->bindValue(':role', $member->role(), PDO::PARAM_INT);
        $req->bindValue(':id', $member->id(), PDO::PARAM_INT);
        $req->execute();
    }
}