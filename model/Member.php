<?php
namespace Jordan\Blog\Model;

class Member
{
    private $_id;
    private $_name;
    private $_password;
    private $_role;
    private $_email;
    private $_phone;
    private $_city;
    private $_street;
    private $_postal;

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

    public function setId($id)
    {
        $this->_id = (int) $id;
    }
    public function setName($name)
    {
        if (is_string($name))
        {
            $this->_name = $name;
        }
    }
    public function setPassword($password)
    {
        if (is_string($password))
        {
            $this->_password = $password;
        }
    }
    public function setRole($role)
    {
        if (is_string($role))
        {
            $this->_role = $role;
        }
    }
    public function setEmail($email)
    {
        if (is_string($email))
        {
            $this->_email = $email;
        }
    }
    public function setPhone($phone)
    {
        if (is_string($phone))
        {
            $this->_phone = $phone;
        }
    }
    public function setCity($city)
    {
        if (is_string($city))
        {
            $this->_city = $city;
        }
    }
    public function setStreet($street)
    {
        if (is_string($street))
        {
            $this->_street = $street;
        }
    }
    public function setPostal($postal)
    {
        if (is_string($postal))
        {
            $this->_postal = $postal;
        }
    }

    public function id() { return $this->_id; }
    public function name() { return $this->_name; }
    public function password() { return $this->_password; }
    public function role() { return $this->_role; }
    public function email() { return $this->_email; }
    public function phone() { return $this->_phone; }
    public function city() { return $this->_city; }
    public function street() { return $this->_street; }
    public function postal() { return $this->_postal; }
}