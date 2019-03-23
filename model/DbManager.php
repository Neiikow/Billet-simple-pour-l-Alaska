<?php
class DbManager
{
    public function dbConnect()
    {
        require('dbConfig.php');
        $db = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPassword);
        return $db;
    }
}