<?php
if (isset($comments))
{
?>
    <div class='comments container table-responsive'>
        <form action="index.php?" method="post" class='row'>
            <div class='col-md-2 text-center pl-1 pr-1 form-group'>
                <input required type='text' name='name' placeholder='Pseudo' class='form-control mt-3'>
                <button type='submit' name='new-com' class='btn btn-primary mt-3'>Envoyer</button>
            </div>
            <div class='col form-group'>
                <textarea required name='text' placeholder='Commentaire' class='form-control mt-3'></textarea>
            </div>
        </form>
        <?php require('view/front/comments/comment.php'); ?>
    </div>
<?php
}
?>