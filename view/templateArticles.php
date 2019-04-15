<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <?php require('view/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php
    if (isset($errorMsg)) {
        require_once('view/error/entityNotFound.php');
    }
    ?>
    <h1 class='text-uppercase'>Tous les articles</h1>
    <?php
    if (isset($article))
    {
        require('view/navArticle.php');
        require('view/article.php');
        require('view/navArticle.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>