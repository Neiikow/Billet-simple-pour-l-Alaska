<div class='d-flex justify-content-between'>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['firstChapter']->id() ?>" class='btn btn-outline-dark btn-sm'>
            Premier
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['prevChapter']->id() ?>" class='btn btn-outline-dark btn-sm'>
            Précédent
        </a>
    </div>
    <p class="font-italic">Page : <?= $data['currentChapter'] ?> sur <?= $data['totalChapters'] ?></p>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['nextChapter']->id() ?>" class='btn btn-outline-dark btn-sm'>
            Suivant
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['lastChapter']->id() ?>" class='btn btn-outline-dark btn-sm'>
            Dernier
        </a>
    </div>
</div>
