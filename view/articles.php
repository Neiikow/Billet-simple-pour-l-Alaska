<?php $title = "Articles"; ?>

<?php ob_start(); ?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <!-- <?php
    for ($p=0; $p < count($posts); $p++)
    { 
    ?>
    <section class="jumbotron">
        <p><strong><?= htmlspecialchars($posts[$p]->author()) ?></strong> le <?= $posts[$p]->datePost() ?></p>
        <h2><?= htmlspecialchars($posts[$p]->title()) ?></h2>
        <p><?= nl2br(htmlspecialchars($posts[$p]->text())) ?></p>
        <?php
        for ($c=0; $c < count($comments); $c++)
        { 
            if ($comments[$c]->postId() === $posts[$p]->id())
            {
        ?>
        <section class="jumbotron">
            <p><strong><?= htmlspecialchars($comments[$c]->author()) ?></strong> le <?= $comments[$c]->datePost() ?></p>
            <p><?= nl2br(htmlspecialchars($comments[$c]->text())) ?></p>
        </section>
        <?php
            }
        }
        ?>
    </section>
    <?php
    }
    ?> -->
    <?php
    foreach ($posts as $key => $post)
    { 
    ?>
    <section class="jumbotron">
        <p><strong><?= htmlspecialchars($post->author()) ?></strong> le <?= $post->datePost() ?></p>
        <h2><?= htmlspecialchars($post->title()) ?></h2>
        <p><?= nl2br(htmlspecialchars($post->text())) ?></p>
        <?php
        foreach ($comments as $key => $comment)
        { 
            if ($comment->postId() === $post->id())
            {
        ?>
        <section class="jumbotron">
            <p><strong><?= htmlspecialchars($comment->author()) ?></strong> le <?= $comment->datePost() ?></p>
            <p><?= nl2br(htmlspecialchars($comment->text())) ?></p>
        </section>
        <?php
            }
        }
        ?>
    </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>