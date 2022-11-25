<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">Usuarios</li>
</ol> -->
<div class = "mt-4"><button type="button" class="btn btn-primary mb-2" onclick="frmPuntos();">Nuevo</button></div>
<table class="table table-light" id="tblPuntos">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>ESTACIONAMIENTO</th>
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
            <form method="post" id="frmPuntos">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="descripcion" class="form-control" type="text" name="descripcion">
                            <label for="descripcion">Descripcion</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="estacionamiento" class="form-control" type="text" name="estacionamiento">
                            <label for="estacionamiento">Estacionamiento</label>
                        </div>
                        
                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-success" onclick="registrarPunto(event);" id="btnAccion">Registrar</button>
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