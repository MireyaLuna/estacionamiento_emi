<?php include "Views/Templates/header.php"; ?>
<?php
if ($_SESSION['cargo'] == '1ADM') { ?>
<div class="card">
    <div class="card-header card-header-primary">
        <strong>LISTA DE FACTURAS</strong>
    </div>
    <div class="card-body">
        <form method="POST" target="_blank">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input id="desdeF" class="form-control" type="date" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                    echo date('Y-m-d') ?>" name="desde">
                        <label for="desdeF">Desde</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input id="hastaF" class="form-control" type="date" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                    echo date('Y-m-d') ?>" name="hasta">
                        <label for="hastaF">Hasta</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-block" type="button" onclick="mostrarTodoF()"><i class="fa-solid fa-eye"></i> Ver todos los registros de facturas</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <!-- <div><button type="button" class="btn btn-primary mb-2" onclick="frmFactura();"><i class="fas fa-plus"></i></button></div> -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tblFacturas">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>TICKET</th>
                        <th>NIT</th>
                        <th>MONTO PAGADO</th>
                        <th>FECHA EMISION</th>
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
                <form method="post" id="frmFactura">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input id="registro" class="form-control" type="text" name="registro">
                        <label for="registro">Ticket</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="nit" class="form-control" type="number" name="nit">
                        <label for="nit">Numero de identificacion tributaria</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input id="monto_pagado" class="form-control" type="number" name="monto_pagado">
                                <label for="monto_pagado">Monto pagado</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input id="monto_recibido" class="form-control" type="number" name="monto_recibido">
                                <label for="monto_recibido">Monto recibido</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="fecha_emision" class="form-control" type="date" name="fecha_emision" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                echo date('Y-m-d') ?>">
                        <label for="fecha_emision">Fecha Emision</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="fecha_limite" class="form-control" type="date" name="fecha_limite" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                $fecha_actual = date("Y-m-d");
                                                                                                                echo date("Y-m-d", strtotime($fecha_actual . "+ 6 month"));  ?>">
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