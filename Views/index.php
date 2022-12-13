<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BIENVENIDO</title>
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/animate.min.css" rel="stylesheet" />
</head>

<body class="bg-azul">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card animate__animated animate__zoomIn shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-center">
                                    <img src="<?php echo base_url;?>Assets/img/emilogo.png" class="img-fluid rounded" alt="logo">
                                    <h3 class="font-weight-light my-4" style="color:dimgrey">Inicio de sesión</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="frmLogin">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario" name="usuario" type="text" />
                                            <label for="usuario">Ingrese usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="clave" name="clave" type="password" />
                                            <label for="clave">Ingrese contraseña</label>
                                        </div>
                                        <div class="alert alert-danger text-center d-none" id="alerta" role="alert"></div>
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-primary" onclick="frmLogin(event)">INGRESAR</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    <script>
        const base_url = '<?php echo base_url;?>';
    </script>
    <!-- <script src="<?php //echo base_url; ?>Assets/js/login.js"></script> -->
</body>

</html>