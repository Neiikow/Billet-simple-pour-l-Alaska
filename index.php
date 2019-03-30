<?php
session_start();
require_once('controller/front/ControllerFront.php');
//echo ('<br><br><br><br><br><br>');
try {
    $ctrl = new \Jordan\Blog\Controller\ControllerFront;
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
        $article = new \Jordan\Blog\Model\Article([
            'author' => $_SESSION['name'],
            'text' => $_POST['text'],
            'title' => $_POST['title'],
            'grp' => "chapter"
        ]);
        $ctrl->addPost('article', $article);
    }
    elseif (isset($_POST['new-comment'])) {
        $comment = new \Jordan\Blog\Model\Comment([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'postId' => $_GET['id'],
            'grp' => "chapter"
        ]);
        $ctrl->addPost('comment', $comment);
    }
    elseif (isset($_POST['edit-article'])) {
        $article = new \Jordan\Blog\Model\Article([
            'text' => $_POST['text'],
            'title' => $_POST['title'],
            'id' => $id
        ]);
        $ctrl->editPost('article', $article);
    }
    elseif (isset($_POST['edit-member'])) {
        $member = new \Jordan\Blog\Model\Member([
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
                $ctrl->reportPost('comment', $idCom);
                $ctrl->childsPost('comment', 'article', $id);
                break;
            case "valide":
                $ctrl->validePost('comment', $idCom);
                if (isset($id)) {
                    $ctrl->childsPost('comment', 'article', $id);
                }
                break;
            case "edit":
                $ctrl->post('article', $id);
                break;
            case "seeComments":
                $ctrl->childsPost('comment', 'article', $id);
                break;
            case "deleteComment":
                $ctrl->deletePost('comment', $idCom);
                break;
            case "deleteArticle":
                $ctrl->deletePost('article', $id);
                break;
            case "logout":
                $_SESSION['role'] = 'visitor';
                header('Location: index.php');
                break;
        }
    }
}
catch (Exception $e) {
    $ctrl->error($e->getMessage());
}
if ($_SESSION['role'] === 'admin' && isset($_GET['page'])) {
    switch($_GET['page'])
    {
        case "articlesManager":
            try {
                $ctrl->posts('article', 'chapter');
            }
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('back', 'articlesManager');
            }
            break;
        case "new":
            $ctrl->setUrl('back', 'new');
            break;
        case "edit":
            $ctrl->setUrl('back', 'edit');
            break;
        case "commentsManager":
            try {
                $ctrl->posts('comment', 'chapter');
            }
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('back', 'commentsManager');
            }
            break;
        case "reported":
            try {
                $ctrl->reportedPosts('comment');
            }
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('back', 'commentsManager');
            }
            break;
        case "profile":
            try {
                $ctrl->user($_SESSION['name'], $_SESSION['password']);
            }
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('back', 'profile');
            }
            break;
        case "settings":
            $ctrl->posts('article', 'intro');
            $ctrl->setUrl('back', 'settings');
            break;
    }
}
if (isset($_GET['page'])) {
    switch($_GET['page'])
    {
        case "home":
            try {
                $ctrl->posts('article', 'intro');
                $ctrl->lastPost('article', 'chapter');
            } 
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('front', 'home');
            }
            break;
        case "articles":
            try {
                $ctrl->firstPost('article', 'chapter');
                $ctrl->lastPost('article', 'chapter');
                if (!isset($id)) {
                    $id = $ctrl->data('firstChapter')->id();
                }
                $ctrl->post('article', $id);
                $ctrl->nextPost('article', $id, 'chapter');
                $ctrl->prevPost('article', $id, 'chapter');
                $ctrl->rowPost('article', $id, 'chapter');
                $ctrl->countPosts('article', 'chapter');
            }
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('front', 'articles');
            }
            break;
        case "contact":
            try {
                $ctrl->role('admin');
            } 
            catch (Exception $e) {
                $ctrl->error($e->getMessage());
            }
            finally {
                $ctrl->setUrl('front', 'contact');
            }
            break;
    }
}
else {
    try {
        $_GET['page'] = "home";
        $ctrl->posts('article', 'intro');
        $ctrl->lastPost('article', 'chapter');
    }
    catch (Exception $e) {
        $ctrl->error($e->getMessage());
    }
    finally {
        $ctrl->setUrl('front', 'home');
    }
}
$ctrl->loadPage();