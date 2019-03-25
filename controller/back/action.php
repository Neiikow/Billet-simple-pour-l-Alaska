<?php
require_once('controller/manager.php');

trait ControllerBack
{
    public function reportPost($type, $id){
        getManager($type)->reportPost($id);
    }
    /*public function deletePost($page, $id){
        getManager('comments')->deletePost(getManager('comments')->getPost($id));
    }
    public function addPost($data){
        getManager('comments')->addPost($data);
    }
    public function editPost($id){
        getManager('comments')->editPost(getManager('comments')->getPost($id));
    }*/
}