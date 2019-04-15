<?php $title = "Profil"; ?>

<?php ob_start(); ?>
    <?php require('view/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div id='dashboard' class='bg-dark'>
        <?php require('view/admin/dashboard.php'); ?>
    </div>
    <div id='admin-content'>
        <?php 
        if (isset($user))
        {
            require('view/admin/profile.php');
        }
        ?> 
    </div>
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer></footer>"; ?>

<?php require('view/template.php'); ?>