<?php
require_once('controller/frontend.php');

//echo "<br><br><br><br><br>";

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
        'title' => $_GET['post']
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
elseif (isset($_POST['new-email'])) {
    echo "Send Email";
}
elseif (isset($_POST['sign-in'])) {
    echo "Login";
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
        case "delete":
            deletePost('comments', $id);
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
            require_once('view/front/page/home.php');
            break;
        case "posts":
            if (posts('articles')) {
                if (!isset($post)) {
                    $post = firstPost('articles');
                }
                $currentPost = rowPost('articles', $post->id());
                $totalPost = countPosts('articles');
            }
            require_once('view/front/page/posts.php');
            break;
        case "contact":	
            contact();
            break;
        case "dashboard":
            require_once('view/back/index.php');
            break;
    }
}
else {
    $_GET['page'] = 'home';
    if (posts('articles')) {
        $post = lastPost('articles');
    }
    require_once('view/front/page/home.php');
}