<?php include_once 'header.php' ?>
<div class="card p-4 bg-light col-sm-4">
    <div class="card-header">
        <img class="card-img-top mx-auto d-block" style="width: 150px;" src="<?= ROOT ?>imgs/logo.png">
        <h1 class="text-center">Registro</h1>
    </div>

    <div class="card-body">
        <form action="<?= ROOT ?>login/registro/" method="POST">
            <div class="form-group text-left">
                <label for="name">Nombre:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group text-left">
                <label for="user">Usuario:</label>
                <input type="text" name="user" class="form-control">
            </div>
            <div class="form-group text-left">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group text-left mb-2">
                <label for="password">Clave de acceso:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group text-left">
                <input type="submit" value="Enviar" class="btn btn-dark">
                <a href="<?= ROOT ?>login/" class="btn btn-dark">Cancelar</a>
            </div>
        </form>
    </div>
</div>
</body>

</html>