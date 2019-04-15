<?php
namespace Jordan\Blog\Controller\Admin;

require_once('controller/DBFactory.php');

class NewController {
    public function index(){
        require_once('view/admin/templateNew.php');
    }
}