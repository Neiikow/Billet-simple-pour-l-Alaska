<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <h2>Bienvenue sur mon blog</h2>
    <section>
        <p>Message de présentation du site</p>
    </section>
    <?php
    if (isset($post))
    {
    ?>
    <h2>Dernier article</h2>
    <?php
        require('view/front/post.php');
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>