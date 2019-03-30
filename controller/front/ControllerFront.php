<?php
namespace Jordan\Blog\Controller;
require_once('controller/DBFactory.php');
require_once('controller/back/ControllerBack.php');

class ControllerFront
{
    use \Jordan\Blog\Controller\ControllerBack;
    private $_url;
    private $_data = [];

    public function data($key) { return $this->_data[$key]; }

    public function loadPage() {
        $data = $this->_data;
        require_once($this->_url);
    }
    public function setUrl($url, $page) {
        $this->_url = ('view/'. $url .'/page/'. $page .'.php');
    }
    public function error($msg) {
        $this->_data['error'] = $msg;
    }
    public function posts($type, $group){
        $this->_data[$group.'s'] = \DBFactory::getManager($type)->getPosts($group);
    }
    public function post($type, $id) {
        $group = \DBFactory::getManager($type)->getPost($id)->grp();
        $this->_data[$group] = \DBFactory::getManager($type)->getPost($id);
    }
    public function lastPost($type, $group){
        $this->_data['last'.ucfirst($group)] = \DBFactory::getManager($type)->getLast($group);
    }
    public function firstPost($type, $group){
        $this->_data['first'.ucfirst($group)] = \DBFactory::getManager($type)->getFirst($group);
    }
    public function nextPost($type, $id, $group){
        if (\DBFactory::getManager($type)->getNext($this->_data[$group]->id(), $group)) {
            $this->_data['next'.ucfirst($group)] = \DBFactory::getManager($type)->getNext($this->_data[$group]->id(), $group);
        } else {
            $this->_data['next'.ucfirst($group)] = \DBFactory::getManager($type)->getLast($group);
        }
    }
    public function prevPost($type, $id, $group){
        if (\DBFactory::getManager($type)->getPrev($this->_data[$group]->id(), $group)) {
            $this->_data['prev'.ucfirst($group)] = \DBFactory::getManager($type)->getPrev($this->_data[$group]->id(), $group);
        } else {
            $this->_data['prev'.ucfirst($group)] = \DBFactory::getManager($type)->getFirst($group);
        }
    }
    public function rowPost($type, $id, $group){
        $this->_data['current'.ucfirst($group)] = \DBFactory::getManager($type)->getRow($id, $group);
    }
    public function countPosts($type, $group){
        $this->_data['total'.ucfirst($group).'s'] = \DBFactory::getManager($type)->getCount($group);
    }
    public function childsPost($childs, $parrent, $idParrent){
        $this->_data[$childs.'s'] = \DBFactory::getManager($childs)->postComments($idParrent);
    }
    public function user($name, $password) {
        $this->_data['user'] = \DBFactory::getManager('member')->getMember($name, $password);
    }
    public function role($role) {
        $this->_data[$role] = \DBFactory::getManager('member')->getRole($role);
    }
    public function login($name, $password){
        $user =  \DBFactory::getManager('member')->getMember($name, $password);
        if ($user) {
            $_SESSION['role'] = $user->role();
            $_SESSION['name'] = $user->name();
            $_SESSION['password'] = $user->password();
        }
    }
}