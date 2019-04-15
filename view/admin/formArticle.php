<form action="index.php?page=articlesManager<?php if (isset($article)) { echo "&id=".$article->id(); } ?>" method="post">
    <div class="form-group row">
        <input required type="text" class="form-control col-sm-5" name="title" placeholder="Titre" <?php if (isset($article)) { echo "value='".$article->title()."'"; } ?>>
    </div>
    <div class="form-group row">
        <textarea class='tiny post-content form-control' name='text'><?php if (isset($article)) { echo $article->text(); } ?></textarea>
        <div class="content-length"></div>
    </div>
    <div class="form-group row">
        <button type="submit" class="post-submit btn btn-outline-dark" <?php if (isset($article)) { echo "name='edit-article'"; } else { echo "name='new-article'"; } ?>><?php if (isset($article)) { echo 'Modifier'; } else { echo ' Publier' ;} ?></button>
    </div>
</form>