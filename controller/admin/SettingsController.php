<?php
namespace Jordan\Blog\Controller\Admin;

require_once('controller/DBFactory.php');

class SettingsController {
    public function index(){
        $articleManager = \DBFactory::getManager('article');
        $intro = $articleManager->getLast('intro');
        require_once('view/admin/templateSettings.php');
    }
}