<?php
require_once('model/ArticleManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');
class DBFactory {
    public static function getManager($table)
    {
        $class = ucfirst($table) .'Manager';
        if (file_exists($url = 'model/'. $class .'.php'))
        {
            $class = '\Jordan\Blog\Model\\'. $class;
            return new $class($table.'s');
        }
        else
        {
            throw new Exception('La classe <strong>' . $class . '</strong> n\'a pu être trouvée à cette emplacement <strong>' . $url . '</strong> !');
        }
    }
}