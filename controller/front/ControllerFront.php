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
    public function posts($type){
        $this->_data[$type.'s'] = \DBFactory::getManager($type)->getPosts();
    }
    public function post($type, $id) {
        $this->_data[$type] = \DBFactory::getManager($type)->getPost($id);
    }
    public function lastPost($type){
        $this->_data['last'.ucfirst($type)] = \DBFactory::getManager($type)->getLast();
    }
    public function firstPost($type){
        $this->_data['first'.ucfirst($type)] = \DBFactory::getManager($type)->getFirst();
    }
    public function nextPost($type, $id){
        if (\DBFactory::getManager($type)->getNext($this->_data['article']->id())) {
            $this->_data['next'.ucfirst($type)] = \DBFactory::getManager($type)->getNext($this->_data['article']->id());
        } else {
            $this->_data['next'.ucfirst($type)] = \DBFactory::getManager($type)->getLast();
        }
    }
    public function prevPost($type, $id){
        if (\DBFactory::getManager($type)->getPrev($this->_data['article']->id())) {
            $this->_data['prev'.ucfirst($type)] = \DBFactory::getManager($type)->getPrev($this->_data['article']->id());
        } else {
            $this->_data['prev'.ucfirst($type)] = \DBFactory::getManager($type)->getFirst();
        }
    }
    public function rowPost($type, $id){
        $this->_data['current'.ucfirst($type)] = \DBFactory::getManager($type)->getRow($id);
    }
    public function countPosts($type){
        $this->_data['total'.ucfirst($type).'s'] = \DBFactory::getManager($type)->getCount();
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