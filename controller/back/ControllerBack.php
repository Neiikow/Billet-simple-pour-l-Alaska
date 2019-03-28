<?php
namespace Jordan\Blog\Controller;
require_once('controller/DBFactory.php');

trait ControllerBack
{
    public function reportPost($type, $id){
        \DBFactory::getManager($type)->reportPost($id);
    }
    public function validePost($type, $id){
        \DBFactory::getManager($type)->validePost($id);
    }
    public function reportedPosts($type){
        $this->_data[$type.'s'] = \DBFactory::getManager($type)->getReportedPosts();
    }
    public function deletePost($type, $id){
        \DBFactory::getManager($type)->deletePost(\DBFactory::getManager($type)->getPost($id));
    }
    public function addPost($type, $data){
        \DBFactory::getManager($type)->addPost($data);
    }
    public function editMember($member){
        \DBFactory::getManager('member')->editMember($member);
    }
    public function editPost($type, $post){
        \DBFactory::getManager($type)->editPost($post);
    }
}