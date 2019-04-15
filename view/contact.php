<div class='container text-secondary'>
    <address>
        <h5>Adresse</h5>
        <p>
            <?= $admin->city() ?><br>
            <?= $admin->street() ?><br>
            <?= $admin->postal() ?><br>
        </p>
    </address>
    <h5>Téléphone</h5>
    <p>
        <?= $admin->phone() ?><br>
    </p>
    <h5>Email</h5>
    <p>
        <?= $admin->email() ?><br>
    </p>
</div>