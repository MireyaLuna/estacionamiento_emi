<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header card-header-primary">
        <strong>LISTA DE TICKETS</strong>
    </div>
    <!-- <div class="card-body">
        <form action="<?php echo base_url; ?>Tickets/pdf" method="POST" target="_blank">
            <div class="row mb-3">
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-file-pdf fa-2x"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input id="desde" class="form-control" type="date" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                    echo date('Y-m-d') ?>" name="desde">
                        <label for="desde">Desde</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <input id="hasta" class="form-control" type="date" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                    echo date('Y-m-d') ?>" name="hasta">
                        <label for="hasta">Hasta</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <button class="btn btn-success btn-block" type="button" onclick="mostrarTodo()"><i class="fa-solid fa-eye"></i> Ver todos los registros de ventas</button>
                    </div>
                </div>
            </div>
        </form>
    </div> -->
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="tbl_tickets"  >
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>CODIGO</th>
                    <th>PLACA</th>
                    <th>ESPACIO</th>
                    <th>INGRESO</th>
                    <th>SALIDA</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>