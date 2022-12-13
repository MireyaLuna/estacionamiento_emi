<?php include "Views/Templates/header.php"; ?>
<?php
if ($_SESSION['id_usuario'] == 1) { ?>
    <div class="card">
        <div class="card-header card-header-primary">
            DATOS DEL ESTACIONAMIENTO
        </div>
        <?php
        if (empty($data)) { ?>
            <div><button type="button" class="btn btn-primary mb-2" onclick="frmEstacionamiento();"><i class="fas fa-plus"></i></button></div>
        <?php
        } else { ?>
            <div class="card-body">
                <!-- <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tblEstacionamientos">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>UBICACION</th>
                            <th>ESTADO</th>
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                </tbody>
            </table>
        </div> -->
                <div class="row">
                    <div style="text-align: end;"><button title="Editar datos del estacionamiento" type="button" class="btn btn-primary mb-2" onclick="btnEditarEstacionamiento();"><i class="fa-regular fa-pen-to-square"></i></button></div>
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" name="estacionamiento" id="estacionamiento" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;" value="<?php echo $data['nombre'] ?>" disabled>
                            <label for="estacionamiento" style="font-weight: bold; font-size: 25px; color: black;">Estacionamiento:
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" name="est_ubicacion" id="est_ubicacion" class="form-control" style=" border-style: none; background-color: white;text-align: center; font-weight: bold; font-family: monospace; font-size: 30px;" value="<?php echo $data['ubicacion'] ?>" disabled>
                            <label for="est_ubicacion" style="font-weight: bold; font-size: 25px; color: black;">Ubicacion:
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <div class="modal fade" id="my_modal" tabindex="-1" aria-labelledby="my_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmEstacionamiento">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="ubicacion" class="form-control" type="text" name="ubicacion">
                            <label for="ubicacion">Ubicacion</label>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-success" onclick="registrarEstacionamiento(event);" id="btnAccion">Registrar</button>
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