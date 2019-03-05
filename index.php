<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
        home();
    }
    elseif ($_GET['action'] == 'articles') {
        posts();
    }
    elseif ($_GET['action'] == 'contact') {
        contact();
    }
}
else {
    home();
}