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
}
catch (Exception $e) {
    $ctrl->error($e->getMessage());
}
if (isset($_GET['section'])) {
    switch($_GET['section'])
    {
        case "admin":
            if ($_SESSION['role'] === 'admin') {
                switch($_GET['page'])
                {
                    case "articles":
                        try {
                            $ctrl->posts('articles');
                        }
                        catch (Exception $e) {
                            $ctrl->error($e->getMessage());
                        }
                        finally {
                            $ctrl->setUrl('back', 'articles');
                        }
                        break;
                    case "new":
                        $ctrl->setUrl('back', 'new');
                        break;
                    case "comments":
                        try {
                            $ctrl->posts('comments');
                        }
                        catch (Exception $e) {
                            $ctrl->error($e->getMessage());
                        }
                        finally {
                            $ctrl->setUrl('back', 'comments');
                        }
                        break;
                    case "reported":
                        try {
                            $ctrl->reportedPosts('comments');
                        }
                        catch (Exception $e) {
                            $ctrl->error($e->getMessage());
                        }
                        finally {
                            $ctrl->setUrl('back', 'comments');
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
            try {
                $ctrl->lastPost('article');
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
        $ctrl->lastPost('article');
    }
    catch (Exception $e) {
        $ctrl->error($e->getMessage());
    }
    finally {
        $ctrl->setUrl('front', 'home');
    }
}
$ctrl->loadPage();