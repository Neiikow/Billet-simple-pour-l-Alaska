<div class='d-flex justify-content-between'>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['firstArticle']->id() ?>">
            <button type='button' name='first' class='btn btn-outline-dark btn-sm'>
                Premier
            </button>
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['prevArticle']->id() ?>">
            <button type='button' name='prev' class='btn btn-outline-dark btn-sm'>
                Précédent
            </button>
        </a>
    </div>
    <p class="font-italic">Page : <?= $data['currentArticle'] ?> sur <?= $data['totalArticles'] ?></p>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['nextArticle']->id() ?>">
            <button type='button' name='next' class='btn btn-outline-dark btn-sm'>
                Suivant
            </button>
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&id=<?= $data['lastArticle']->id() ?>">
            <button type='button' name='last' class='btn btn-outline-dark btn-sm'>
                Dernier
            </button>
        </a>
    </div>
</div>
