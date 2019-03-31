<?php
namespace Jordan\Blog\Model;
trait DbManager
{
    public function dbConnect()
    {
        require('config/dbConfig.php');
        $db = new \PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPassword);
        return $db;
    }
}