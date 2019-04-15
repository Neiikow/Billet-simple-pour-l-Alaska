<div class='d-flex justify-content-between'>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $firstArticle->id() ?>" class='btn btn-outline-dark btn-sm'>
            Premier
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $prevArticle->id() ?>" class='btn btn-outline-dark btn-sm'>
            Précédent
        </a>
    </div>
    <p class="font-italic">Page : <?= $currentArticle ?> sur <?= $totalArticle ?></p>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $nextArticle->id() ?>" class='btn btn-outline-dark btn-sm'>
            Suivant
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $lastArticle->id() ?>" class='btn btn-outline-dark btn-sm'>
            Dernier
        </a>
    </div>
</div>
