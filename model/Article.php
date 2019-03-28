<?php
namespace Jordan\Blog\Model;
require_once('model/Post.php');

class Article extends Post
{
    private $_title;

    public function setTitle($title)
    {
        if (is_string($title))
        {
            $this->_title = $title;
        }
    }

    public function title() { return $this->_title; }
}