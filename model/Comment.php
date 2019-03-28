<?php
namespace Jordan\Blog\Model;
require_once('model/Post.php');

class Comment extends Post
{
    private $_postId;
    private $_reported;

    public function setPostId($postId)
    {
        $this->_postId = (int) $postId;
    }
    public function setReported($reported)
    {
        $this->_reported = (int) $reported;
    }

    public function postId() { return $this->_postId; }
    public function reported() { return $this->_reported; }
}