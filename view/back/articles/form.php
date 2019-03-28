<form action="index.php?section=<?= $_GET['section']; ?>&page=articles<?php if (isset($data['article'])) { echo "&id=".htmlspecialchars($data['article']->id()); } ?>" method="post">
    <div class="form-group row">
        <input required type="text" class="form-control col-sm-5" name="title" placeholder="Titre" <?php if (isset($data['article'])) { echo "value='".htmlspecialchars($data['article']->title())."'"; } ?>>
    </div>
    <div class="form-group row">
        <textarea class='tiny post-content form-control' name='text'><?php if (isset($data['article'])) { echo $data['article']->text(); } ?></textarea>
        <div class="content-length"></div>
    </div>
    <div class="form-group row">
        <button type="submit" class="post-submit btn btn-outline-dark" <?php if (isset($data['article'])) { echo "name='edit-article'"; } else { echo "name='new-article'"; } ?>>Publier</button>
    </div>
</form>