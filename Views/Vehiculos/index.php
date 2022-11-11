<?php include "Views/Templates/header.php"; ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">Vehiculos</li>
</ol>
<button type="button" class="btn btn-primary mb-2" onclick="frmVehiculo()">Nuevo</button>
<table class="table table-light" id="tblVehiculos">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>PLACA</th>
            <th>COLOR</th>
            <th>MARCA</th>
            <th>CARGO</th>
            <th>CLIENTE</th>
            <th>ESPACIO</th>
            <th>USUARIO CREACION</th>
            <!-- <th>FECHA MODIFICACION</th> -->
            <th>USUARIO MODIFICACION</th>
            <th>ESTADO</th>
            <th>ACCION</th>
        </tr>
    </thead>
    <tbody>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
        <th>hola</th>
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
                <form method="post" id="frmVehiculo">
                    <h1>abre</h1>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-success" onclick="registrarVehiculo(event);" id="btnAccion">Registrar</button>
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