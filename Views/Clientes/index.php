<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">Usuarios</li>
</ol> -->
<?php
if ($_SESSION['cargo'] == '1ADM') { ?>
    <div class="card">
        <div class="card-header card-header-primary">
            CLIENTES
        </div>
        <div class="card-body">
            <div><button type="button" class="btn btn-primary mb-2" onclick="frmCliente();"><i class="fas fa-plus"></i></button></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tblClientes">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>CARNET</th>
                            <th>TELEFONO</th>
                            <!-- <th>ADMINISTRADOR</th>-->
                            <th>USUARIO</th>
                            <!-- <th>FECHA CREACION</th> -->
                            <!-- <th>USUARIO CREACION</th> -->
                            <!-- <th>FECHA MODIFICACION</th> -->
                            <!-- <th>USUARIO MODIFICACION</th> -->
                            <th>ESTADO</th>
                            <th>ACCION</th>
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
                    <form method="post" id="frmCliente">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="ci" class="form-control" type="text" name="ci">
                            <label for="ci">Carnet de identidad</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="telefono" class="form-control" type="text" name="telefono">
                            <label for="telefono">Telefono</label>
                        </div>
                        <hr>
                        <div id="datosUsuario">
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
                        </div>

                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-success" onclick="registrarCliente(event);" id="btnAccion">Registrar</button>
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
<?php } else { ?>
    <div class="content">
        <a href="<?php echo base_url; ?>Administrador/home" class="pagina">
            <div class="text-center">
                <p>No tienes permiso de visitar esta pagina.</p>
            </div>
        </a>
    </div>
<?php } ?>

<?php include "Views/Templates/footer.php"; ?>