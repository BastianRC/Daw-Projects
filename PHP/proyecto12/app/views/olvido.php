<?php include_once 'header.php'?>

<div class="card p-4 bg-light">
    <div class="card-header">
        <h1 class="tetx-center"><?= $data['subtitle']?></h1>
    </div>

    <div class="card-body">
        <form action="<?= ROOT ?>login/olvido/" method="POST">
            <div class="form-group text-left">
                <label for="email">Correo Electronico:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group text-left mt-2">
                <input type="submit" value="Enviar" class="btn btn-success">
            </div>
        </form>
    </div>

    <div class="card-footer">
        <div class="row">
            <p>Recibiras un correo electronico</p>
        </div>
    </div>
</div>

<?php include_once 'footer.php'?>