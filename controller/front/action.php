<?php
require_once('controller/manager.php');
require_once('controller/back/action.php');

class ControllerFront
{
    use ControllerBack;
    private $_url;
    private $_data = [];

    public function data($key) { return $this->_data[$key]; }

    public function loadPage() {
        $data = $this->_data;
        require($this->_url);
    }
    public function setUrl($page) {
        if ($page === 'admin') {
            $this->_url = ('view/back/page/'. $page .'.php');
        } else {
            $this->_url = ('view/front/page/'. $page .'.php');
        }
    }
    public function posts($type){
        $this->_data[$type] = getManager($type)->getPosts();
    }
    public function post($type, $id) {
        $this->_data[$type] = getManager($type.'s')->getPost($id);
    }
    public function lastPost($type){
        $this->_data['last'.ucfirst($type)] = getManager($type.'s')->getLast();
    }
    public function firstPost($type){
        $this->_data['first'.ucfirst($type)] = getManager($type.'s')->getFirst();
    }
    public function nextPost($type, $id){
        if (getManager($type.'s')->getNext($this->_data['article']->id())) {
            $this->_data['next'.ucfirst($type)] = getManager($type.'s')->getNext($this->_data['article']->id());
        } else {
            $this->_data['next'.ucfirst($type)] = getManager($type.'s')->getLast();
        }
    }
    public function prevPost($type, $id){
        if (getManager($type.'s')->getPrev($this->_data['article']->id())) {
            $this->_data['prev'.ucfirst($type)] = getManager($type.'s')->getPrev($this->_data['article']->id());
        } else {
            $this->_data['prev'.ucfirst($type)] = getManager($type.'s')->getFirst();
        }
    }
    public function rowPost($type, $id){
        $this->_data['current'.ucfirst($type)] = getManager($type.'s')->getRow($id);
    }
    public function countPosts($type){
        $this->_data['total'.ucfirst($type)] = getManager($type)->getCount();
    }
    public function childsPost($childs, $parrent, $idParrent){
        $this->_data[$childs] = getManager($childs)->postComments($idParrent);
    }
    public function login($name, $password){
        $user =  getManager('members')->getMember($name, $password);
        if ($user) {
            $_SESSION['role'] = $user->role();
        }
    }
}