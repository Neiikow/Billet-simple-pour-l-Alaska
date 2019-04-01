<?php
if ($_SESSION['role'] === 'admin') {
?>
    <a href="index.php?page=home&action=logout" class="btn btn-outline-light">
        Deconnexion
    </a>
<?php
}
else {
?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php
}
?>