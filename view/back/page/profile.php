<?php $title = "Profil"; ?>

<?php ob_start(); ?>
    <?php require('view/front/header/nav.php'); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class='row'>
    <div id='dashboard' class='bg-dark'>
        <?php require('view/back/dashboard/nav.php'); ?>
    </div>
    <div class='col'>
        <div class="container">
            <?php 
            if (isset($data['error'])) {
                echo "<p class='p-3 mb-2 bg-danger text-white'>". $data['error'] ."</p>";
            }
            if (isset($data['user']))
            {
                require('view/back/users/profile.php');
            }
            ?> 
        </div>
    </div>
</div>
    
<?php $content = ob_get_clean(); ?>

<?php $footer = "<footer></footer>"; ?>

<?php require('view/template.php'); ?>