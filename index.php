<?php
session_start();
require_once('controller/front/action.php');
require_once('controller/back/action.php');
//echo "<br><br><br><br><br>";
try {
    if (isset($_POST['new-post'])) {
        $article = new Article([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'title' => $_POST['title']
        ]);
        addPost('articles', $article);
    }
    elseif (isset($_POST['new-com'])) {
        $comment = new Comment([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'postId' => $_GET['post']
        ]);
        addPost('comments', $comment);
    }
    elseif (isset($_POST['edit-post'])) {
        $article = new Article([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'title' => $_POST['title']
        ]);
        editPost('articles', $article);
    }
    elseif (isset($_POST['edit-com'])) {
        $comment = new Comment([
            'author' => $_POST['author'],
            'text' => $_POST['text'],
            'postId' => $_GET['post']
        ]);
        editPost('comments', $comment);
    }
    elseif (isset($_POST['edit-member'])) {
        $member = new Member([
            'name' => $_POST['name'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        ]);
        editMember('members', $member);
    }
    elseif (isset($_POST['new-email'])) {
        echo "Send Email";
    }
    elseif (isset($_POST['sign-in'])) {
        $user = login('members', $_POST['name'], $_POST['password']);
        if ($user) {
            $_SESSION['role'] = $user->role();
        }
    }
    if (isset($_GET['action'])) {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
        }
        switch($_GET['action'])
        {
            case "posts":
                $posts = posts('articles');
                break;
            case "comments":
                $comments = posts('comments');
                break;
            case "first":
                if (posts('articles')) {
                    $post = firstPost('articles');
                }
                break;
            case "last":
                if (posts('articles')) {
                    $post = lastPost('articles');
                }
                break;
            case "next":
                if (nextPost('articles', $id)) {
                    $post = nextPost('articles', $id);
                }
                else {
                    $post = post('articles', $id);
                }
                break;
            case "prev":
                if (prevPost('articles', $id)) {
                    $post = prevPost('articles', $id);
                }
                else {
                    $post = post('articles', $id);
                }
                break;
            case "report":
                reportPost('comments', $id);
                break;
            case "show":
                $post = post('articles', $id);
                $comments = postComments('comments', $id);
                break;
            case "edit":
                
                break;
            case "delete":
                deletePost('comments', $id);
                break;
            case "logout":
                $_SESSION['role'] = 'visitor';
                break;
        }
    }
    if (isset($_GET['page'])) {
        switch($_GET['page'])
        {
            case "home":
                if (posts('articles')) {
                    if (!isset($post)) {
                        $post = lastPost('articles');	
                    }
                }
                require('view/front/page/'. $_GET['page'] .'.php');
                break;
            case "posts":
                if (posts('articles')) {
                    if (!isset($post)) {
                        $post = firstPost('articles');
                    }
                    $currentPost = rowPost('articles', $post->id());
                    $totalPost = countPosts('articles');
                }
                require('view/front/page/'. $_GET['page'] .'.php');
                break;
            case "contact":	
                require('view/front/page/'. $_GET['page'] .'.php');
                break;
            case "admin":
                if ($_SESSION['role'] === 'admin') {
                    require('view/back/'. $_GET['page'] .'.php');
                } else {
                    header('Location: index.php');
                }
                break;
        }
    }
    else {
        $_GET['page'] = "home";
        if (posts('articles')) {
            $post = lastPost('articles');
        }
        require('view/front/page/'. $_GET['page'] .'.php');
    }
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}