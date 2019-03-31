<?php
$introId = htmlspecialchars($data['intros'][0]->id());
$introText = $data['intros'][0]->text();
?>
<a href="index.php?page=edit&action=edit&id=<?= $introId ?>">
    <button type="button" name="edit" class="btn btn-outline-dark mb-2">
        Modifier
    </button>
</a>
<section id='article-<?= $introId ?>' class='jumbotron border border-dark'>
    <p><?= $introText ?></p>
</section>