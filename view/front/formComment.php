<?php
if (isset($comments))
{
?>
    <div class='comments container table-responsive'>
        <form class='row'>
            <div class='col-md-2 text-center pl-1 pr-1 form-group'>
                <input required='required' type='text' placeholder='Pseudo' class='form-control mt-3'>
                <button type='submit' class='btn btn-primary mt-3'>Envoyer</button>
            </div>
            <div class='col form-group'>
                <textarea required='required' placeholder='Commentaire' class='form-control mt-3'></textarea>
            </div>
        </form>
        <?php require('view/front/comment.php'); ?>
    </div>
<?php
}
?>