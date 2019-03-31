<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php
    if (isset($data['error'])) {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    if (isset($data['intros'][0]))
    {
        $introTitle = htmlspecialchars($data['intros'][0]->title());
        ?>
        <h2 class='text-uppercase'><?= $introTitle ?></h2>
        <?php
        require('view/front/intro.php');
    } else {
        echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
    }
    if (isset($data['lastChapter']))
    {
        $data['chapter'] = $data['lastChapter'];
        ?>
        <h2 class='text-uppercase'>Dernier article</h2>
        <?php
        require('view/front/articles/article.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer class='bg-dark text-white fixed-bottom'></footer>"; ?>

<?php require('view/template.php'); ?>