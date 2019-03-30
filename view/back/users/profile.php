<form action="index.php?page=<?php echo $_GET['page']; ?>&id=<?= $data['user']->id() ?>" method="post" class='w-50 m-auto'>
    <div class="form-group row justify-content-md-center">
        <label for="name" class="col-sm-3 col-form-label">Pseudo</label>
        <div>
            <input type="text" class="form-control" id="name" name="name" value="<?= $data['user']->name() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="password" class="col-sm-3 col-form-label">Mote de passe</label>
        <div>
            <input type="password" class="form-control" id="password" name="password" value="<?= $data['user']->password() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div>
            <input type="email" class="form-control" id="email" name="email" value="<?= $data['user']->email() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="phone" class="col-sm-3 col-form-label">Téléphone</label>
        <div>
            <input type="tel" class="form-control" id="phone" name="phone" value="<?= $data['user']->phone() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="city" class="col-sm-3 col-form-label">Ville</label>
        <div>
            <input type="??" class="form-control" id="city" name="city" value="<?= $data['user']->city() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="street" class="col-sm-3 col-form-label">Rue</label>
        <div>
            <input type="??" class="form-control" id="street" name="street" value="<?= $data['user']->street() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <label for="postal" class="col-sm-3 col-form-label">Code postal</label>
        <div>
            <input type="text" class="form-control" id="postal" name="postal" value="<?= $data['user']->postal() ?>">
        </div>
    </div>
    <div class="form-group row justify-content-md-center">
        <button type="submit" class="btn btn-outline-dark" name="edit-member">Modifier</button>
    </div>
</form>