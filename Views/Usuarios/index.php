<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header card-header-primary">
        LISTA DE USUARIOS
    </div>
    <div class="card-body">
        <div><button type="button" class="btn btn-primary mb-2" onclick="frmUsuario();"><i class="fas fa-plus"></i></button></div>
        <div class="table-responsive">
        <table class="table table-bordered table-hover" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>USUARIO</th>
            <th>NOMBRE</th>
            <th>GENERO</th>
            <th>CARGO</th>
            <th>ESTACIONAMIENTO</th>
            <!-- <th>FECHA CREACION</th>
            <th>USUARIO CREACION</th>
            <th>FECHA MODIFICACION</th>
            <th>USUARIO MODIFICACION</th> -->
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
        </div>
    </div>
</div>
<div class="modal fade" id="my_modal" tabindex="-1" aria-labelledby="my_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                        <label for="usuario">Usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="genero" class="form-control" name="genero">
                            <?php foreach ($data['generos'] as $row) { ?>
                                <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="genero">Genero</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="cargo" class="form-control" name="cargo">
                            <?php foreach ($data['cargos'] as $row) { ?>
                                <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="cargo">Rol</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="estacionamiento" class="form-control" name="estacionamiento">
                            <?php foreach ($data['estacionamientos'] as $row) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="estacionamiento">Estacionamientos</label>
                    </div>
                    <div class="row" id="claves">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                                <label for="clave">Contraseña</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar">
                                <label for="confirmar">Confirmar contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-success" onclick="registrarUsuario(event);" id="btnAccion">Registrar</button>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>