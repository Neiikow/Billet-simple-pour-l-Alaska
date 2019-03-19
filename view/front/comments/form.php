<div class='comments container table-responsive'>
    <form action="index.php?page=<?php echo $_GET['page']; ?>&post=<?= $postId ?>" method="post" class='row'>
        <div class='col-md-2 text-center pl-1 pr-1 form-group'>
            <input required type='text' name='author' placeholder='Pseudo' class='form-control mt-3'>
            <button type='submit' name='new-com' class='btn btn-primary mt-3'>Envoyer</button>
        </div>
        <div class='col form-group'>
            <textarea required name='text' placeholder='Commentaire' class='form-control mt-3'></textarea>
        </div>
    </form>
    <?php
    if (count($comments)>0 && $comments[0]->postId() === $post->id()) {
        require('view/front/comments/comment.php');
    }
    ?>
</div>
