<div class='d-flex justify-content-between'>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&action=first&id=<?= $postId ?>">
            <button type='button' name='first' class='btn btn-outline-dark btn-sm'>
                Premier
            </button>
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&action=prev&id=<?= $postId ?>">
            <button type='button' name='prev' class='btn btn-outline-dark btn-sm'>
                Précédent
            </button>
        </a>
    </div>
    <p class="font-italic">Page : ? sur <?= $nbPost ?></p>
    <div>
        <a href="index.php?page=<?= $_GET['page']; ?>&action=next&id=<?= $postId ?>">
            <button type='button' name='next' class='btn btn-outline-dark btn-sm'>
                Suivant
            </button>
        </a>
        <a href="index.php?page=<?= $_GET['page']; ?>&action=last&id=<?= $postId ?>">
            <button type='button' name='last' class='btn btn-outline-dark btn-sm'>
                Dernier
            </button>
        </a>
    </div>
</div>
