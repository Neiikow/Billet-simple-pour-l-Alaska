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
    
    public function getMember($name, $password)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE name = ? AND password = ? ORDER BY id');
        $req->execute(array($name, $password));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Member($data);
        } else {
            throw new Exception("Pseudo ou mot de passe incorect");
        }
    }
    public function getRole($role)
    {
        $req = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE role = ? ORDER BY id');
        $req->execute(array($role));
        $data = $req->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Member($data);
        } else {
            throw new Exception("Aucun ". $role ." trouvé");
        }
    }
    public function editMember(Member $member)
    {
        
        $req = $this->db->prepare('UPDATE  ' . $this->table . '  SET name = :name, password = :password, email = :email, phone = :phone, city = :city, street = :street, postal = :postal WHERE id = :id');
        $req->bindValue(':name', $member->name(), PDO::PARAM_STR);
        $req->bindValue(':password', $member->password(), PDO::PARAM_STR);
        $req->bindValue(':email', $member->email(), PDO::PARAM_STR);
        $req->bindValue(':phone', $member->phone(), PDO::PARAM_STR);
        $req->bindValue(':city', $member->city(), PDO::PARAM_STR);
        $req->bindValue(':street', $member->street(), PDO::PARAM_STR);
        $req->bindValue(':postal', $member->postal(), PDO::PARAM_INT);
        $req->bindValue(':id', $member->id(), PDO::PARAM_INT);
        $req->execute();
    }
}