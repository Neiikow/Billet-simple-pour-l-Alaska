<?php
namespace Jordan\Blog\Controller;

require_once('controller/DBFactory.php');

class ArticlesController {
    
    public function index(){
        $articleManager = \DBFactory::getManager('article');
        $commentManager = \DBFactory::getManager('comment');

        $firstArticle = $articleManager->getFirst('chapter');
        if (!isset($firstArticle)) {
            $errorMsg = "Il n'y a pas encore d'article mis en ligne !";
        } else {
            $lastArticle = $articleManager->getLast('chapter');
            if (isset($_GET['id']) && preg_match("#^[0-9]+$#", $_GET['id'])) {
                $id = $_GET['id'];
            } else {
                $id = $firstArticle->id();
            }
            $article = $articleManager->getPost($id);
            if ($article === null) {
                throw new \Exception("Page introuvable");
            }
            if ($article->id() === $firstArticle->id()) {
                $prevArticle = $firstArticle;
            } else {
                $prevArticle = $articleManager->getPrev($id, 'chapter');
            }
            if ($article->id() === $lastArticle->id()) {
                $nextArticle = $lastArticle;
            } else {
                $nextArticle = $articleManager->getNext($id, 'chapter');
            }
            $currentArticle = $articleManager->getRow($id, 'chapter');
            $totalArticle = $articleManager->getCount('chapter');
        }
        
        if (isset($_POST['new-comment'])) {
            $this->add($commentManager);
        }
        if (isset($_GET['action'])) {
            switch($_GET['action'])
            {
                case "comments":
                    $comments = $commentManager->postComments($article->id());
                    break;
                case "report":
                    if (isset($_GET['idCom']) && preg_match("#^[0-9]+$#", $_GET['idCom'])) {
                        $commentManager->reportPost($_GET['idCom']);
                    }
                    $comments = $commentManager->postComments($article->id());
                    break;
                case "delete":
                    if ($_SESSION['role'] === 'admin') {
                        if (isset($_GET['idCom']) && preg_match("#^[0-9]+$#", $_GET['idCom'])) {
                            $commentManager->deletePost($_GET['idCom']);
                        }
                    }
                    $comments = $commentManager->postComments($article->id());
                    break;
            }
        }
        require_once('view/templateArticles.php');
    }
    public function add($manager){
        $data = new \Jordan\Blog\Model\Comment([
            'author' => htmlspecialchars($_POST['author']),
            'text' => htmlspecialchars($_POST['text']),
            'postId' => htmlspecialchars($_GET['id']),
            'grp' => "chapter"
        ]);
        $manager->addPost($data);
    }
}