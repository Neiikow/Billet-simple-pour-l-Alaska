<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Tous les articles</h2>
    <?php
    if (isset($data['chapter']))
    {
        $articleId = htmlspecialchars($data['chapter']->id());
        require('view/front/articles/nav.php');
        require('view/front/articles/article.php');
        require('view/front/articles/nav.php');
    } else {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>