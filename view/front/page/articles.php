<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php 
    if (isset($data['error'])) {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    ?>
    <h1 class='text-uppercase'>Tous les articles</h1>
    <?php
    if (isset($data['chapter']))
    {
        $articleId = htmlspecialchars($data['chapter']->id());
        require('view/front/articles/nav.php');
        require('view/front/articles/article.php');
        require('view/front/articles/nav.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>