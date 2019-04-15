<?php
namespace Jordan\Blog\Controller\Admin;

require_once('controller/DBFactory.php');

class ReportedController {
    public function index(){
        $commentManager = \DBFactory::getManager('comment');
        if (isset($_GET['action'])) {
            switch($_GET['action'])
            {
                case "delete":
                    if (isset($_GET['id']) && preg_match("#^[0-9]+$#", $_GET['id'])) {
                        $commentManager->deletePost($_GET['id']);
                    }
                    break;
                case "valide":
                    if (isset($_GET['id']) && preg_match("#^[0-9]+$#", $_GET['id'])) {
                        $commentManager->validePost($_GET['id']);
                    }
                    break;
            }
        }
        $comments = $commentManager->getReportedPosts();
        if (!isset($comments)) {
            $errorMsg = "Il n'y a pas de commentaire signalé !";
        }
        require_once('view/admin/templateComments.php');
    }
}