<?php
namespace Jordan\Blog\Controller\Admin;

require_once('controller/DBFactory.php');

class AdminArticlesController {
    public function index(){
        $articleManager = \DBFactory::getManager('article');
        $commentManager = \DBFactory::getManager('comment');
        
        if (isset($_POST['new-article'])) {
            if (empty($_POST['text'])) {
                $errorMsg = "Tout les champs ne sont pas rempli";
            } else {
                $this->add($articleManager);
            }
        }
        if (isset($_POST['edit-article'])) {
            if (empty($_POST['text'])) {
                $errorMsg = "Tout les champs ne sont pas rempli";
            } else {
                $this->edit($articleManager);
            }
        }
        if (isset($_GET['action'])) {
            switch($_GET['action'])
            {
                case "delete":
                    if (isset($_GET['id']) && preg_match("#^[0-9]+$#", $_GET['id'])) {
                        $articleManager->deletePost($_GET['id']);
                        $commentManager->deletePosts($_GET['id']);
                    }
                    break;
            }
        }
        $articles = $articleManager->getPosts('chapter');
        if (!isset($articles)) {
            $errorMsg = "Il n'y a pas encore d'article mis en ligne !";
        }
        require_once('view/admin/templateArticles.php');
    }
    public function add($manager){
        $data = new \Jordan\Blog\Model\Article([
            'author' => htmlspecialchars($_SESSION['name']),
            'text' => $_POST['text'],
            'title' => htmlspecialchars($_POST['title']),
            'grp' => "chapter"
        ]);
        $manager->addPost($data);
    }
    public function edit($manager){
        $data = new \Jordan\Blog\Model\Article([
            'text' => $_POST['text'],
            'title' => htmlspecialchars($_POST['title']),
            'id' => htmlspecialchars($_GET['id'])
        ]);
        $manager->editPost($data);
    }
}