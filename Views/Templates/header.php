<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Estacionamiento EMI</title>
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" />
    <script src="<?php echo base_url; ?>Assets/js/all.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url; ?>Administrador/home"><img src="<?php echo base_url; ?>Assets/img/logo_emi.png" height="56" width="200"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="date text-center" style="color: white;">
                <span id="weekDay" class="weekDay"></span>,
                <span id="day" class="day"></span> de
                <span id="month" class="month"></span> del
                <span id="year" class="year"></span>
            </div>
            <div class="clock text-center" style="color: white;">
                <span id="hours" class="hours"></span> :
                <span id="minutes" class="minutes"></span> :
                <span id="seconds" class="seconds"></span>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['nombre'] ?><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Perfil</a></li> -->
                    <li>
                        <a class="dropdown-item" href="#!" data-bs-toggle="modal" data-bs-target="#cambiarPass">Modificar contraseña</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                            Configuracion
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Usuarios">Usuarios</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Parametros</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Puntos">Puntos de atencion</a>
                            </nav>
                        </div>
                        <!-- <a class="nav-link" href="<?php echo base_url; ?>Administrador">
                                <div class="sb-nav-link-icon"><i class="far fa-star"></i></div>
                                Administrador
                            </a> -->
                        <a class="nav-link" href="<?php echo base_url; ?>Clientes">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Clientes
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Vehiculos">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            Vehiculos
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Estacionamientos">
                            <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Estacionamientos
                        </a>
                        <a class="nav-link" href="<?php echo base_url; ?>Espacios">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Espacios
                        </a>
                        <!-- Registros -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRegistros" aria-expanded="false" aria-controls="collapseRegistros">
                            <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                            Registros
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseRegistros" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Tickets">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></div>
                                    Nuevo ingreso
                                </a>
                                <a class="nav-link" href="<?php echo base_url; ?>Tickets/historial">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                                    Ver registros
                                </a>
                            </nav>
                        </div>
                        <!-- <a class="nav-link" href="<?php echo base_url; ?>Facturas">
                            <?php
                            // if ($_SESSION['cargo_usuario'] == '2DOC') { ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
                                Facturas
                            <?php //} ?>
                        </a> -->
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Estas en:</div>
                    <p>Estacionamiento <?php echo $_SESSION['estacionamiento'] ?></p>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">