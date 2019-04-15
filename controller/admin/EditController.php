<?php
namespace Jordan\Blog\Controller\Admin;

require_once('controller/DBFactory.php');

class EditController {
    public function index(){
        $articleManager = \DBFactory::getManager('article');
        $article = $articleManager->getPost($_GET['id']);
        require_once('view/admin/templateEdit.php');
    }
}