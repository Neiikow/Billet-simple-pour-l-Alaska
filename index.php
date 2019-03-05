<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
        accueil();
    }
    elseif ($_GET['action'] == 'articles') {
        articles();
    }
    elseif ($_GET['action'] == 'contact') {
        contact();
    }
}
else {
    accueil();
}