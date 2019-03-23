<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Tous les articles</h2>
    <?php
    if (isset($post)) {
        $postId = htmlspecialchars($post->id());
        require('view/front/posts/nav.php');
        require('view/front/posts/post.php');
        require('view/front/posts/nav.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/front/template.php'); ?>