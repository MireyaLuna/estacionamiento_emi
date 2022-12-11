<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header card-header-primary">
        LISTA DE VEHICULOS
    </div>
    <div class="card-body">
        <div><button type="button" class="btn btn-primary mb-2" onclick="frmVehiculo();"><i class="fas fa-plus"></i></button></div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tblVehiculos">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>PLACA</th>
                        <th>COLOR</th>
                        <th>MARCA</th>
                        <th>CLIENTE</th>
                        <th>TIPO</th>
                        <th>FECHA CREACION</th>
                        <th>FECHA MODIFICACION</th>
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
                <form method="post" id="frmVehiculo">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <select id="id_cliente" class="form-control" name="id_cliente">
                            <?php foreach ($data['clientes'] as $row) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="id_cliente">Clientes</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select id="tipo" class="form-control" name="tipo">
                            <?php foreach ($data['tipos'] as $row) { ?>
                                <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="tipo">Tipo de vehiculo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="placa" class="form-control" type="text" name="placa" placeholder="Ingrese placa">
                        <label for="placa">Placa</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input id="color" class="form-control" type="text" name="color" placeholder="Ingrese color">
                                <label for="color">Color</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input id="marca" class="form-control" type="text" name="marca" placeholder="Ingrese marca">
                                <label for="marca">Marca</label>
                            </div>
                        </div>
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