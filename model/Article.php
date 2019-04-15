<?php
namespace Jordan\Blog\Model;

class Article
{
    private $_title;
    private $_id;
    private $_author;
    private $_datePost;
    private $_text;
    private $_grp;

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
          $this->$method(htmlspecialchars($value));
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
            $this->_text = htmlspecialchars_decode($text);
        }
    }
    public function setId($id)
    {
        $this->_id = (int) htmlspecialchars($id);
    }
    public function setDatePost($datePost)
    {
        $this->_datePost = preg_replace("#([0-9]{4})-([0-9]{2})-([0-9]{2})\s([0-9]{2}):([0-9]{2}):([0-9]{2})#", 'le $3/$2/$1 à $4h$5', $datePost);
    }
    public function setGrp($grp)
    {
        if (is_string($grp))
        {
            $this->grp = $grp;
        }
    }

    public function title() { return $this->_title; }
    public function id() { return $this->_id; }
    public function author() { return $this->_author; }
    public function datePost() { return $this->_datePost; }
    public function text() { return $this->_text; }
    public function grp() { return $this->grp; }
}