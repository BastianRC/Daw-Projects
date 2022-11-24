<?php include_once 'header.php' ?>


<div class="card p-4 bg-light">
    <div class="card-header">
        <img class="card-img-top mx-auto d-block" style="width: 150px;" src="<?= ROOT ?>imgs/logo.png">
        <h1 class="text-center">Iniciar Sesión</h1>
    </div>



    <div class="card-body">
        <form action="<?= ROOT ?>login/verifyUser/" method="POST">
            <div class="form-group text-left">
                <label for="user">Usuario:</label>
                <input type="text" name="user" class="form-control">
            </div>
            <div class="form-group text-left mb-2">
                <label for="password">Clave de acceso:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group text-left mb-2">
                <input type="submit" value="Enviar" class="btn btn-dark">
            </div>
            <div class="form-group text-left">
                <input type="checkbox" name="remember">
                <label for="remember">Recordar</label>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <a href="<?= ROOT ?>login/registro" class="btn btn-dark">Nuevo usuario</a>
                <a href="<?= ROOT ?>login/olvido" class="btn btn-dark ms-3">Recordar Contraseña</a>
            </div>

        </div>
    </div>
</div>
</body>

</html>