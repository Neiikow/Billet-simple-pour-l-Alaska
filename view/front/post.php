<section id='post<?= $post->id() ?>' class='post jumbotron'>
    <h3><?= $post->title() ?></h3>
    <p><?= $post->text() ?></p>
    <hr>
    <div class='post-option d-flex justify-content-between align-items-center flex-wrap'>
        <div class='d-flex flex-nowrap'>
            <button class='comment-btn btn btn-link btn-sm'>Commentaire(s)</button>
        </div>
        <p class='btn-sm date font-italic'><strong><?= $post->author() ?></strong> le <?= $post->datePost() ?></p>
    </div>
    <?php require('view/front/formComment.php'); ?>
</section>