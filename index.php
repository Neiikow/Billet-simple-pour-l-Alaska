<?php
require('controller/frontend.php');


if (isset($_POST['new-post'])) {
    echo "Add Post";
}
elseif (isset($_POST['new-com'])) {
    echo "Add Com";
}
elseif (isset($_POST['new-email'])) {
    echo "Send Email";
}
elseif (isset($_POST['sign-in'])) {
    echo "Login";
}
if (isset($_GET['action'])) {
    switch($_GET['action'])
    {
        case "report":
            report((int)$_GET['id']);
            break;
    }
}
if (isset($_GET['page'])) {
    switch($_GET['page'])
    {
        case "home":	
            lastPost();
            break;

        case "posts":
            listPosts();
            break;

        case "contact":	
            contact();
            break;
    }
}
else {
    $_GET['page'] = 'home';
    lastPost();
}