<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">Usuarios</li>
</ol> -->
<div class="mt-4"><button type="button" class="btn btn-primary mb-2" onclick="frmFactura();">Nuevo</button></div>
<table class="table table-light" id="tblFacturas">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>REGISTRO</th>
            <th>NIT</th>
            <th>NOMBRE</th>
            <th>CANTIDAD</th>
            <th>FECHA EMISION</th>
            <th>FECHA LIMITE EMISION</th>
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
                <form method="post" id="frmFactura">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="registro" class="form-control" type="text" name="registro">
                        <label for="registro">Registro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nit" class="form-control" type="number" name="nit">
                        <label for="nit">Numero de identificacion tributaria</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nombre" class="form-control" type="text" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="cantidad" class="form-control" type="number" name="cantidad">
                        <label for="cantidad">Cantidad</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="fecha_emision" class="form-control" type="date" name="fecha_emision" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                echo date('Y-m-d') ?>" >
                        <label for="fecha_emision">Fecha Emision</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="fecha_limite" class="form-control" type="date" name="fecha_limite" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                            $fecha_actual = date("Y-m-d");
                                                                                                            echo date("Y-m-d",strtotime($fecha_actual."+ 6 month"));  ?>" >
                        <label for=" fecha_limite">Fecha limite de emision</label>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-success" onclick="registrarFactura(event);" id="btnAccion">Registrar</button>
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