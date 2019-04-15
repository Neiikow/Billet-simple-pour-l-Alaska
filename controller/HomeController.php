<?php
namespace Jordan\Blog\Controller;

require_once('controller/DBFactory.php');

class HomeController {
    public function index(){
        $articleManager = \DBFactory::getManager('article');
        $commentManager = \DBFactory::getManager('comment');

        $intro = $articleManager->getLast('intro');
        $article = $articleManager->getLast('chapter');
        if (!isset($article)) {
            $errorMsg = "Il n'y a pas encore d'article mis en ligne !";
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
        require_once('view/templateHome.php');
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