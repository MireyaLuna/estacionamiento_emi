<?php include "Views/Templates/header.php"; ?>
<div class="card">
    <div class="card-header card-header-primary">
        MIS DATOS
    </div>
    <div class="card-body">
        <form method="post" id="nuevoRegistro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="form-control" 
                        style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;" 
                        value = "<?php echo $data['datos']['usuario']?>" disabled>
                        <label for="placa_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">USUARIO:
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" name="tipo_vehiculo" id="tipo_vehiculo" class="form-control" 
                        style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;" 
                        value = "<?php echo $data['datos']['ci']?>" disabled>
                        <label for="tipo_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">CI:
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="form-control" 
                        style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;" 
                        value = "<?php echo $data['datos']['nombre']?>" disabled>
                        <label for="placa_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">NOMBRE:
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" name="tipo_vehiculo" id="tipo_vehiculo" class="form-control" 
                        style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;" 
                        value = "<?php echo $data['datos']['telefono']?>" disabled>
                        <label for="tipo_vehiculo" style="font-weight: bold; font-size: 25px; color: black;">TELEFONO:
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php"; ?>