<?php
require_once('controller/manager.php');

trait ControllerBack
{
    public function reportPost($type, $id){
        getManager($type)->reportPost($id);
    }
    public function deletePost($type, $id){
        getManager($type)->deletePost(getManager($type)->getPost($id));
    }
    public function addPost($type, $data){
        getManager($type)->addPost($data);
    }
    /*public function editPost($id){
        getManager('comments')->editPost(getManager('comments')->getPost($id));
    }*/
}