</div>
</main>
</div>
</div>
<div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title" style="color: black;">Modificar contraseña</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                    <div class="form-floating mb-3">
                        <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña actual" autocomplete="on">
                        <label for="clave_actual">Contraseña actual</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva contraseña" autocomplete="on">
                        <label for="clave_nueva">Contraseña nueva</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar contraseña" autocomplete="on">
                        <label for="confirmar_clave">Confirmar contraseña</label>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-success" type="summit">Modificar contraseña</button>
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
<!-- <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php echo base_url; ?>Assets/js/Chart.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
<script src="<?php echo base_url;?>Assets/js/select2.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
<script>
    const base_url = '<?php echo base_url; ?>';
</script>
<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
</body>

</html>