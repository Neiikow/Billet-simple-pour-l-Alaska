<?php
class DbManager
{
    protected function dbConnect()
    {
        require('dbConfig.php');
        try
        {
            $db = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $dbPassword);
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}