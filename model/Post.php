<?php
class Post
{
    private $_id;
    private $_title;
    private $_author;
    private $_datePost;
    private $_text;
    private $_nb;

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

    public function setTitle($title)
    {
        if (is_string($title))
        {
            $this->_title = $title;
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
    public function setDatePost($datePost)
    {
        $this->_datePost = $datePost;
    }
    public function setNb($nb)
    {
        $this->_nb = $nb;
    }

    public function id() { return $this->_id; }
    public function title() { return $this->_title; }
    public function author() { return $this->_author; }
    public function datePost() { return $this->_datePost; }
    public function text() { return $this->_text; }
    public function postContent() { return $this->_postContent; }
    public function nb() { return $this->_nb; }
}