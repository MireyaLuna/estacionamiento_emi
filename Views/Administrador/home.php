<?php include "Views/Templates/header.php"; ?>

<div class="row mt-4">
    <div class="col-xl-3 col-md-6 ">
        <div class="card bg-dark-green text-white mb-4 animate__animated animate__backInLeft">
            <div class="card-body">
                <i class="far fa-square fa-2x"></i>
                Libres
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Espacios">Ver más</a>
                <span class="text-white"><?php echo $data['libres']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4 animate__animated animate__backInLeft">
            <div class="card-body">
                <i class="fas fa-square fa-2x"></i>
                Ocupados
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Espacios">Ver más</a>
                <span class="text-white"><?php echo $data['ocupados']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4 animate__animated animate__backInRight">
            <div class="card-body">
                <i class="fas fa-times-circle fa-2x"></i>
                Deshabilitados
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Espacios">Ver más</a>
                <span class="text-white"><?php echo $data['deshabilitados']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4 animate__animated animate__backInRight">
            <div class="card-body">
                <i class="fas fa-table fa-2x"></i>
                Total
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Ventas/historial">Ver más</a>
                <span class="text-white"><?php echo $data['espacio']['total'] ?></span>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-rosa text-white mb-4 animate__animated animate__backInLeft">
            <div class="card-body">
                <i class="fas fa-user fa-2x"></i>
                Categorias
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Categorias">Ver más</a>
                <span class="text-white"><?php echo $data['categorias']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-purple text-white mb-4 animate__animated animate__backInLeft">
            <div class="card-body">
                <i class="fas fa-users fa-2x"></i>
                Marcas
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Medidas">Ver más</a>
                <span class="text-white"><?php echo $data['medidas']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-orange text-white mb-4 animate__animated animate__backInRight">
            <div class="card-body">
                <i class="fab fa-product-hunt fa-2x"></i>
                Roles
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Cajas">Ver más</a>
                <span class="text-white"><?php echo $data['cajas']['total'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-green text-white mb-4 animate__animated animate__backInRight">
            <div class="card-body">
                <i class="fas fa-cash-register fa-2x"></i>
                Compras por dia
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="<?php echo base_url; ?>Compras/historial">Ver más</a>
                <span class="text-white"><?php echo $data['compras']['total'] ?></span>
            </div>
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header card-header-details">
                <i class="fas fa-chart-area me-1"></i>
                Vehiculos con mas permanencia
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <!-- <canvas id="stockminimo" width="100%" height="40"></canvas> -->
                    <table class="table table-striped" id="tbl_detalles">
                        <thead>
                            <tr>
                                <th style="color:black; background-color: white !important;">TIPO</th>
                                <th style="color:black; background-color: white !important;">PLACA</th>
                                <th style="color:black; background-color: white !important;">INGRESO</th>
                                <th style="color:black; background-color: white !important;">TIEMPO</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Views/Templates/footer.php"; ?>