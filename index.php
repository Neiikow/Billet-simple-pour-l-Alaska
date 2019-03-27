<?php
session_start();

require_once('controller/front/action.php');
//echo "<br><br><br><br><br>";
try {
    $ctrl = new ControllerFront;
    if (!isset($_SESSION['role'])) {
        $_SESSION['role'] = 'visitor';
    }
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
    }
    if (isset($_GET['idCom'])) {
        $idCom = (int)$_GET['idCom'];
    }
    if (isset($_POST['new-article'])) {
        $article = new Article([
            'author' => $_SESSION['name'],
            'text' => $_POST['text'],
            'title' => $_POST['title']
        ]);
        $ctrl->addPost('articles', $article);
    }
    elseif (isset($_POST['new-comment'])) {
        $comment = new Comment([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'postId' => $_GET['id']
        ]);
        $ctrl->addPost('comments', $comment);
    }
    elseif (isset($_POST['edit-article'])) {
        $article = new Article([
            'author' => $_SESSION['name'],
            'text' => $_POST['text'],
            'title' => $_POST['title']
        ]);
        $ctrl->editPost($article);
    }
    elseif (isset($_POST['edit-member'])) {
        $member = new Member([
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'city' => $_POST['city'],
            'street' => $_POST['street'],
            'postal' => $_POST['postal'],
            'id' => $_GET['id']
        ]);
        $ctrl->editMember($member);
    }
    elseif (isset($_POST['new-email'])) {
        echo "Send Email";
    }
    elseif (isset($_POST['sign-in'])) {
        $ctrl->login($_POST['name'], $_POST['password']);
    }
    if (isset($_GET['action'])) {
        switch($_GET['action'])
        {
            case "report":
                $ctrl->reportPost('comments', $idCom);
                $ctrl->childsPost('comments', 'article', $id);
                break;
            case "valide":
                $ctrl->validePost('comments', $idCom);
                if (isset($id)) {
                    $ctrl->childsPost('comments', 'article', $id);
                }
                break;
            case "seeComments":
                $ctrl->childsPost('comments', 'article', $id);
                break;
            case "new-article":
                ////////////
                break;
            case "edit":
                ////////////
                break;
            case "deleteComment":
                $ctrl->deletePost('comments', $idCom);
                break;
            case "deleteArticle":
                $ctrl->deletePost('articles', $id);
                break;
            case "logout":
                $_SESSION['role'] = 'visitor';
                header('Location: index.php');
                break;
        }
    }
    if (isset($_GET['section'])) {
        switch($_GET['section'])
        {
            case "admin":
                if ($_SESSION['role'] === 'admin') {
                    switch($_GET['page'])
                    {
                        case "articles":
                            $ctrl->posts('articles');
                            $ctrl->setUrl('back', 'articles');
                            break;
                        case "new":
                            $ctrl->setUrl('back', 'new');
                            break;
                        case "comments":
                            $ctrl->posts('comments');
                            $ctrl->setUrl('back', 'comments');
                            break;
                        case "reported":
                            $ctrl->reportedPosts('comments');
                            $ctrl->setUrl('back', 'comments');
                            break;
                        case "profile":
                            $ctrl->user($_SESSION['name'], $_SESSION['password']);
                            $ctrl->setUrl('back', 'profile');
                            break;
                        case "settings":
                            $ctrl->setUrl('back', 'settings');
                            break;
                    }
                } else {
                    header('Location: index.php');
                }
                break;
        }
    } elseif (isset($_GET['page'])) {
        switch($_GET['page'])
        {
            case "home":
                $ctrl->lastPost('article');
                $ctrl->setUrl('front', 'home');
                break;
            case "articles":
                $ctrl->firstPost('article');
                $ctrl->lastPost('article');
                if (!isset($id)) {
                    $id = $ctrl->data('firstArticle')->id();
                }
                $ctrl->post('article', $id);
                $ctrl->nextPost('article', $id);
                $ctrl->prevPost('article', $id);
                $ctrl->rowPost('article', $id);
                $ctrl->countPosts('articles');
                $ctrl->setUrl('front', 'articles');
                break;
            case "contact":	
                $ctrl->role('admin');
                $ctrl->setUrl('front', 'contact');
                break;
        }
    }
    else {
        $_GET['page'] = "home";
        $ctrl->lastPost('article');
        $ctrl->setUrl('front', 'home');
    }
    $ctrl->loadPage();
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}