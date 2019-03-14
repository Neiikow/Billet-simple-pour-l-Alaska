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
    if (isset($post)) {
    ?>
    <h2>Dernier article</h2>
    <section class="post">
        <h3><?= htmlspecialchars($post->title()) ?></h3>
        <p><?= nl2br(htmlspecialchars($post->text())) ?></p>
        <hr>
        <div class="post-option">
            <p><strong><?= htmlspecialchars($post->author()) ?></strong> le <?= $post->datePost() ?></p>
        </div>
        <div class="comments">
            <?php
            if (isset($comments)) {
                ?>
            <table>
                <tbody>
                    <?php
                    foreach ($comments as $comment)
                    { 
                    ?>
                    <tr>
                        <td>
                            <p><strong><?= htmlspecialchars($comment->author()) ?></strong></p>
                            <p> le <?= $comment->datePost() ?></p>
                        </td>
                        <td>
                            <p><?= nl2br(htmlspecialchars($comment->text())) ?></p>
                            <hr>
                            <button type="button" class="text-right btn btn-link btn-sm"><strong>Signaler</strong></button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
    </section>
    <?php
    }
    ?>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>