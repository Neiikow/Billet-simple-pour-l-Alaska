<form action="index.php?section=<?= $_GET['section']; ?>&page=articles" method="post">
    <div class="form-group row">
        <input required type="text" class="form-control col-sm-5" name="title" placeholder="Titre">
    </div>
    <div class="form-group row">
        <textarea class='tiny form-control' name='text'></textarea>
    </div>
    <div class="form-group row">
        <button type="submit" class="btn btn-outline-dark" name="new-article">Publier</button>
    </div>
</form>