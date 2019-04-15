<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <?php require('view/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php
    if (isset($errorMsg)) {
        require_once('view/error/entityNotFound.php');
    }
    if (isset($intro))
    {
        ?>
        <h1 class='text-uppercase'><?= $intro->title() ?></h1>
        <?php
        require('view/intro.php');
    }
    if (isset($article))
    {
        ?>
        <h2 class='text-uppercase'>Dernier article</h2>
        <?php
        require('view/article.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>