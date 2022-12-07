<?php include "Views/Templates/header.php"; ?>
<!-- <ol class="breadcrumb">
    <li class="breadcrumb-item active mt-2" aria-current="page">NUEVO INGRESO</li>
</ol> -->
<div class="card">
    <div class="card-header card-header-primary">
        NUEVO INGRESO
    </div>
    <div class="card-body">
        <form method="post" id="nuevoRegistro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <input type="text" name="placa" id="placa" class="form-control" onkeyup="buscarPlaca(event)">
                        <label for="placa">Buscar por placa</label>
                    </div>
                </div>
                <hr>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="form-control"
                            style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;  color: blue;"
                            disabled>
                        <label for="placa_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">PLACA:
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="tipo" name="tipo">
                        <input type="hidden" id="id_vehiculo" name="id_vehiculo">
                        <input type="text" name="tipo_vehiculo" id="tipo_vehiculo" class="form-control"
                            style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;  color: blue;"
                            disabled>
                        <label for="tipo_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">TIPO:
                        </label>
                    </div>
                </div>
                <hr>
                <h4 class="text-center"><i class="fas fa-arrow-alt-circle-down fa-2x"></i> INGRESO</h4>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control"
                            value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                $fecha = new DateTime();
                                                                                                                $fecha_hoy = $fecha->format('Y-m-d');
                                                                                                                echo $fecha_hoy ?>" disabled>
                        <label for="fecha_ingreso">Fecha de ingreso</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="hora_ingreso" id="hora_ingreso" class="form-control"
                            value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                $fecha = new DateTime();
                                                                                                                $fecha_hoy = $fecha->format('H:i:s');
                                                                                                                echo $fecha_hoy ?>" disabled>
                        <label for="hora_ingreso">Hora de ingreso</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select id="espacio" class="form-control" name="espacio">
                            <?php foreach ($data['espacios'] as $row) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nro_espacio'] ?></option>
                            <?php } ?>
                        </select>
                        <label for="espacio">Espacio a ocupar</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <button class="btn btn-success mt-2 btn-block" style="float: right;" type="button"
                            onclick="generarTicket()">Generar ticket</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>