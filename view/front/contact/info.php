<div class='container text-secondary'>
    <address>
        <h5>Adresse</h5>
        <p>
            <?= $data['admin']->city() ?><br>
            <?= $data['admin']->street() ?><br>
            <?= $data['admin']->postal() ?><br>
        </p>
    </address>
    <h5>Téléphone</h5>
    <p>
        <?= $data['admin']->phone() ?><br>
    </p>
    <h5>Email</h5>
    <p>
        <?= $data['admin']->email() ?><br>
    </p>
</div>