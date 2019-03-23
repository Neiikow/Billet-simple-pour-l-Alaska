<?php
if ($_SESSION['role'] === 'admin') {
?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Deconnexion</button>
<?php
}
else {
?>
    <button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#modalLogin">Connexion</button>
<?php
}
?>