<?php
session_start();

require_once('controller/front/action.php');
//echo "<br><br><br><br><br>";
try {
    $ctrl = new ControllerFront;
    if (!isset($_SESSION['role'])) {
        $_SESSION['role'] = 'visitor';
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
    }
    if (isset($_GET['idCom'])) {
        $idCom = (int)$_GET['idCom'];
    }
    if (isset($_POST['new-post'])) {
        $article = new Article([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'title' => $_POST['title']
        ]);
        addPost($article);
    }
    elseif (isset($_POST['new-com'])) {
        $comment = new Comment([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'postId' => $_GET['post']
        ]);
        addPost($comment);
    }
    elseif (isset($_POST['edit-post'])) {
        $article = new Article([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'title' => $_POST['title']
        ]);
        editPost($article);
    }
    elseif (isset($_POST['edit-com'])) {
        $comment = new Comment([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'postId' => $_GET['post']
        ]);
        editPost($comment);
    }
    elseif (isset($_POST['edit-member'])) {
        $member = new Member([
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        ]);
        editMember($member);
    }
    elseif (isset($_POST['new-email'])) {
        echo "Send Email";
    }
    elseif (isset($_POST['sign-in'])) {
        login($page, $_POST['name'], $_POST['password']);
    }
    if (isset($_GET['action'])) {
        switch($_GET['action'])
        {
            case "articles":
                $ctrl->posts('articles');
                break;
            case "comments":
                $ctrl->posts('comments');
                break;
            case "report":
                $ctrl->reportPost('comments', $idCom);
                $ctrl->childsPost('comments', 'article', $id);
                break;
            case "show":
                $ctrl->childsPost('comments', 'article', $id);
                break;
            case "edit":
                ////////////
                break;
            case "delete":
                $ctrl->deletePost($id);
                break;
            case "logout":
                $_SESSION['role'] = 'visitor';
                header('Location: index.php');
                break;
        }
    }
    if (isset($_GET['page'])) {
        switch($_GET['page'])
        {
            case "home":
                $ctrl->lastPost('article');
                $ctrl->setUrl('home');
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
                $ctrl->setUrl('articles');
                break;
            case "contact":	
                $ctrl->setUrl('contact');
                break;
            case "admin":
                if ($_SESSION['role'] === 'admin') {
                    require_once('view/back/'. $_GET['page'] .'.php');
                } else {
                    header('Location: index.php');
                }
                break;
        }
    }
    else {
        $_GET['page'] = "home";
        $ctrl->lastPost('article');
        $ctrl->setUrl('home');
    }
    $ctrl->loadPage();
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}