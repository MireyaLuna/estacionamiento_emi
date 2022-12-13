<?php include "Views/Templates/header.php"; ?>
<?php
if ($_SESSION['cargo'] == '1ADM') { ?>
    <div class="card">
        <div class="card-header card-header-primary">
            FACTURACION
        </div>
        <div class="card-body">
            <form method="post" id="frmFactura">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;  color: blue;" value="<?php echo $data['placa']; ?>" disabled>
                            <label for="placa_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">PLACA:
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="id_ticket" name="id_ticket" value="<?php echo $data['id']; ?>">
                            <input type="hidden" id="id" name="id">
                            <input type="text" name="tipo_vehiculo" id="tipo_vehiculo" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;  color: blue;" value="<?php echo $data['tipo_vehiculo']; ?>" disabled>
                            <label for="tipo_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">TIPO:
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-center"><i class="fas fa-arrow-alt-circle-down fa-2x"></i> INGRESO</h4>
                        <div class="form-floating mb-3">
                            <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;" value="<?php $array = explode(" ", $data['hora_ingreso']);
                                                                                                                                                                                                                                                        echo $array[0]; ?>" disabled>
                            <label for="fecha_ingreso" style="font-weight: bold; font-size: 20px; color: black;">Fecha de
                                ingreso</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="hora_ingreso" id="hora_ingreso" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;" value="<?php $array = explode(" ", $data['hora_ingreso']);
                                                                                                                                                                                                                                                        echo $array[1]; ?>" disabled>
                            <label for="hora_ingreso" style="font-weight: bold; font-size: 20px; color: black;">Hora de
                                ingreso</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-center"><i class="fas fa-arrow-alt-circle-up fa-2x"></i> SALIDA</h4>
                        <div class="form-floating mb-3">
                            <input type="text" name="fecha_salida" id="fecha_salida" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                                                                                                                                                        $fecha = new DateTime();
                                                                                                                                                                                                                                                        $fecha_hoy = $fecha->format('Y-m-d');
                                                                                                                                                                                                                                                        echo $fecha_hoy ?>" disabled>
                            <label for="fecha_salida" style="font-weight: bold; font-size: 20px; color: black;">Fecha de
                                salida</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="hora_salida" id="hora_salida" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                                                                                                                                                    $fecha = new DateTime();
                                                                                                                                                                                                                                                    $fecha_hoy = $fecha->format('H:i:s');
                                                                                                                                                                                                                                                    echo $fecha_hoy ?>" disabled>
                            <label for="hora_salida" style="font-weight: bold; font-size: 20px; color: black;">Hora de
                                salida</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="espacio" id="espacio" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;  color: blue;" value="<?php echo $data['nro_espacio']; ?>" disabled>
                            <label for="espacio" style="font-weight: bold; text-align:right; font-size: 25px; color: black;">Espacio:
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="tiempo_total" id="tiempo_total" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                                                                                                                                                        $i = $data['hora_ingreso'];
                                                                                                                                                                                                                                                        $salida = new DateTime();
                                                                                                                                                                                                                                                        $ingreso = new DateTime($i);
                                                                                                                                                                                                                                                        $tiempo_total = $ingreso->diff($salida);
                                                                                                                                                                                                                                                        $horas = ($tiempo_total->format('%d') * 24) + $tiempo_total->format('%h') + 1;
                                                                                                                                                                                                                                                        echo $horas;
                                                                                                                                                                                                                                                        ?>" disabled>
                            <label for="tiempo_total" style="font-weight: bold; font-size: 20px; color: black;">Tiempo total (horas): </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h4 style="font-weight: bold; font-size: 25px; color: black;"> DATOS DE FACTURA</h4>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input autofocus type="number" name="nit" id="nit" min="0" max="9" step="1" class="form-control" style="text-align: center; font-family: monospace; font-size: 25px; " onkeyup="buscarNIT(event);">
                            <label for="nit" style="font-weight: bold; font-size: 20px; color: black;">NIT: </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="razon_social" id="razon_social" class="form-control" style="text-transform: uppercase; text-align: center; font-family: monospace; font-size: 25px;" onkeyup="registrarNIT(event);" disabled>
                            <label for=" razon_social" style="font-weight: bold; font-size: 20px; color: black;">RAZON SOCIAL: </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="monto_total" id="monto_total" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 25px;  color: blue;" value="<?php date_default_timezone_set("America/La_Paz");
                                                                                                                                                                                                                                                                    $i = $data['hora_ingreso'];
                                                                                                                                                                                                                                                                    $salida = new DateTime();
                                                                                                                                                                                                                                                                    $ingreso = new DateTime($i);
                                                                                                                                                                                                                                                                    $tiempo_total = $ingreso->diff($salida);
                                                                                                                                                                                                                                                                    $horas = ($tiempo_total->format('%d') * 24) + $tiempo_total->format('%h') + 1;
                                                                                                                                                                                                                                                                    //PRECIO POR HORA
                                                                                                                                                                                                                                                                    echo $horas * 7;
                                                                                                                                                                                                                                                                    ?>" disabled>
                            <label for="monto_total" style="font-weight: bold; font-size: 20px; color: black;">MONTO
                                TOTAL: </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <button class="btn btn-success mt-2 btn-block" style="float: right;" type="button" onclick="generarFactura()">Generar factura</button>
                        </div>
                    </div>
                </div>
            </form>
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