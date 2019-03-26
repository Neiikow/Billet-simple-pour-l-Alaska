<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/style.css">
        
        <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=p0xly4a5mxnufogwi0xzqyrllpkd9304ujh7lnbnjlgnlnbr"></script>
        <script>tinymce.init({
            selector:'.tiny',
            menubar: false,
            statusbar: false,
            plugins : 'autoresize advlist autolink link lists',
            toolbar1: 'undo redo | cut copy paste blockquote | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | fontselect fontsizeselect forecolor backcolor bold italic underline strikethrough',
        });</script>

        <title><?= $title ?> - Billet simple pour l'Alaska</title>
    </head>
    <body class="text-dark">
        <header>
            <?= $nav ?>
        </header>
        <div id="content" class="container<?php if($_SESSION['role'] === 'admin' && $_GET['page'] === "admin") { echo "-fluid"; }; ?>">
            <?= $content ?>
        </div>
        <?php if($_SESSION['role'] != 'admin' || $_GET['page'] != "admin") { echo "<footer class='bg-dark text-white fixed-bottom'></footer>"; }; ?>
        <script src='public/js/init.js'></script>
    </body>
</html>