<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">Usuarios</li>
</ol> -->
<div class = "mt-4"><button type="button" class="btn btn-primary mb-2" onclick="frmAdministrador();">Nuevo</button></div>
<table class="table table-light" id="tblAdministrador">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CARNET</th>
            <th>CODIGO DE SAGA</th>
            <th>USUARIO</th>
            <th>FECHA CREACION</th>
            <!-- <th>USUARIO CREACION</th> -->
            <th>FECHA MODIFICACION</th>
            <!-- <th>USUARIO MODIFICACION</th> -->
            <th>ESTADO</th>
            <th>ACCION</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div class="modal fade" id="my_modal" tabindex="-1" aria-labelledby="my_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" id="frmAdministrador">
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
                            <input id="codigo_saga" class="form-control" type="text" name="codigo_saga">
                            <label for="codigo_saga">Codigo de saga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="id_usuario" class="form-control" type="text" name="id_usuario">
                            <label for="id_usuario">Usuario</label>
                        </div>
                        
                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-success" onclick="registrarAdministrador(event);" id="btnAccion">Registrar</button>
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