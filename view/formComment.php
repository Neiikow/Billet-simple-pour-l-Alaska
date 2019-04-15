<div class='comments container table-responsive'>
    <form action="index.php?page=<?php echo $_GET['page']; ?>&action=comments&id=<?= $article->id() ?>" method="post" class='row'>
        <div class='col-md-2 text-center pl-1 pr-1 form-group'>
            <input required type='text' name='author' placeholder='Pseudo' class='form-control mt-3'>
            <button type='submit' name='new-comment' class='post-submit btn btn-outline-dark mt-3'>Envoyer</button>
        </div>
        <div class='col form-group'>
            <textarea required name='text' placeholder='Commentaire' class='post-content form-control mt-3'></textarea>
            <div class="content-length"></div>
        </div>
    </form>
    <?php
    if (count($comments)>0) {
        require('view/comment.php');
    }
    ?>
</div>