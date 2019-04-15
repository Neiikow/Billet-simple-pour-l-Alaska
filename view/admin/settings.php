<a href="index.php?page=edit&action=edit&id=<?= $intro->id() ?>" class="btn btn-outline-dark mb-2">
    Modifier
</a>
<section id='article-<?= $intro->id() ?>' class='jumbotron border border-dark'>
    <p><?= $intro->text() ?></p>
</section>