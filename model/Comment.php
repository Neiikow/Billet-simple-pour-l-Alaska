<?php
class Comment
{
    private $_id;
    private $_postId;
    private $_author;
    private $_datePost;
    private $_reported;
    private $_text;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
      foreach ($data as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }

    public function setAuthor($author)
    {
        if (is_string($author))
        {
            $this->_author = $author;
        }
    }
    public function setText($text)
    {
        if (is_string($text))
        {
            $this->_text = $text;
        }
    }
    public function setId($id)
    {
        $this->_id = (int) $id;
    }
    public function setPostId($postId)
    {
        $this->_postId = (int) $postId;
    }
    public function setReported($reported)
    {
        $this->_reported = (int) $reported;
    }
    public function setDatePost($datePost)
    {
        $this->_datePost = $datePost;
    }

    public function id() { return $this->_id; }
    public function postId() { return $this->_postId; }
    public function author() { return $this->_author; }
    public function datePost() { return $this->_datePost; }
    public function reported() { return $this->_reported; }
    public function text() { return $this->_text; }
}