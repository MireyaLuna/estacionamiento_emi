<?php include "Views/Templates/header.php"; ?>
<?php
if ($_SESSION['cargo'] == '1ADM') { ?>
    <div class="card">
        <div class="card-header card-header-primary">
            <strong>LISTA DE TICKETS</strong>
        </div>
        <div class="card-body">
            <form method="POST" target="_blank">
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
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-block" type="button" onclick="mostrarTodo()"><i class="fa-solid fa-eye"></i> Ver todos los registros de tickets</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tbl_tickets">
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