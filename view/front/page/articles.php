<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Tous les articles</h2>
    <?php
    if (isset($data['article']))
    {
        $articleId = htmlspecialchars($data['article']->id());
        require('view/front/articles/nav.php');
        require('view/front/articles/article.php');
        require('view/front/articles/nav.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>