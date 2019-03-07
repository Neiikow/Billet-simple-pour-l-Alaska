<?php
require('controller/frontend.php');

if (isset($_GET['action'])) {
    switch($_GET['action'])
    {
        case "accueil":	
            home();
            break;	
        case "articles":
            posts();
            break;
        case "contact":	
            contact();
            break;
    }
}
else {
    home();
}