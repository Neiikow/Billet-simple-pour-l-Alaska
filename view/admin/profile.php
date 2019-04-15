<form action="index.php?page=<?php echo $_GET['page']; ?>&id=<?= $user->id() ?>" method="post">
    <div class="form-group row justify-content-md-center">
        <label for="name" class="col-md-3 col-form-label">Pseudo</label>
        <div>
            <input required type="text" class="form-control" id="name" name="name" value="<?= $user->name() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="password" class="col-md-3 col-form-label">Mot de passe</label>
        <div>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="confirm-password" class="col-md-3 col-form-label">Confirmez</label>
        <div>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="email" class="col-md-3 col-form-label">Email</label>
        <div>
            <input required type="email" class="form-control" id="email" name="email" value="<?= $user->email() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="phone" class="col-md-3 col-form-label">Téléphone</label>
        <div>
            <input required type="tel" class="form-control" id="phone" name="phone" value="<?= $user->phone() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="city" class="col-md-3 col-form-label">Ville</label>
        <div>
            <input required type="??" class="form-control" id="city" name="city" value="<?= $user->city() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="street" class="col-md-3 col-form-label">Rue</label>
        <div>
            <input required type="??" class="form-control" id="street" name="street" value="<?= $user->street() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="postal" class="col-md-3 col-form-label">Code postal</label>
        <div>
            <input required type="text" class="form-control" id="postal" name="postal" value="<?= $user->postal() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <button type="submit" class="btn btn-outline-dark" name="edit-member">Modifier</button>
    </div>
</form>