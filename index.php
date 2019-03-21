<?php
require_once('controller/frontend.php');

//echo "<br><br><br><br><br>";

if (isset($_POST['new-post'])) {
    $post = new Post([
        'author' => $_POST['author'],
        'text' => $_POST['text'],
        'title' => $_POST['title']
    ]);
    addPost($post);
}
elseif (isset($_POST['new-com'])) {
    $comment = new Comment([
        'author' => $_POST['author'],
        'text' => $_POST['text'],
        'postId' => $_GET['post']
    ]);
    addComment($comment);
}
elseif (isset($_POST['edit-com'])) {
    echo "Edit com";
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
        case "first":
            $post = firstPost();
            break;

        case "last":
            $post = lastPost();
            break;

        case "next":
            if (nextPost($id)) {
                $post = nextPost($id);
            }
            else {
                $post = post($id);
            }
            break;

        case "prev":
            if (prevPost($id)) {
                $post = prevPost($id);
            }
            else {
                $post = post($id);
            }
            break;

        case "report":
            report($id);
            break;

        case "show":
            $post = post($id);
            $comments = comments($id);
            break;

        case "delete":
            delete($id);
            break;
    }
}
if (isset($_GET['page'])) {
    switch($_GET['page'])
    {
        case "home":
            if (!isset($post)) {
                $post = lastPost();	
            }
            require('view/front/page/home.php');
            break;

        case "posts":
            if (!isset($post)) {
                $post = firstPost();
            }
            $currentPost = rowPost($post->id());
            $totalPost = countPost();
            require('view/front/page/posts.php');
            break;

        case "contact":	
            contact();
            break;
    }
}
else {
    $_GET['page'] = 'home';
    $post = lastPost();
    require('view/front/page/home.php');
}