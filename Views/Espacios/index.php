<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">Usuarios</li>
</ol> -->
<div class="mt-4"><button type="button" class="btn btn-primary mb-2" onclick="frmEspacio();">Nuevo</button></div>
<table class="table table-light" id="tblEspacios">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>ESTACIONAMIENTO</th>
            <th>NUMERO ESPACIO</th>
            <th>VEHICULO</th>
            <th>HORA INGRESO</th>
            <th>HORA SALIDA</th>
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
                <form method="post" id="frmEspacio">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="estacionamiento" class="form-control" type="text" name="estacionamiento">
                        <label for="estacionamiento">Estacionamiento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="numero" class="form-control" type="text" name="numero">
                        <label for="numero">Numero</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="vehiculo" class="form-control" type="text" name="vehiculo">
                        <label for="vehiculo">Vehiculo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="ingreso" class="form-control" type="time" name="ingreso" value = "<?php date_default_timezone_set("America/La_Paz"); echo date('H:i:s')?>">
                        <label for="ingreso">Hora de ingreso</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="salida" class="form-control" type="time" name="salida" disabled>
                        <label for="salida">Hora de salida</label>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-success" onclick="registrarEspacio(event);" id="btnAccion">Registrar</button>
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