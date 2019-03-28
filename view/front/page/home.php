<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2 class='text-uppercase'>Bienvenue</h2>
    <?php require('view/front/intro.php'); ?>
    <?php
    if (isset($data['lastArticle']))
    {
        $data['article'] = $data['lastArticle'];
    ?>
    <h2 class='text-uppercase'>Dernier article</h2>
    <?php
        require('view/front/articles/article.php');
    } else {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>