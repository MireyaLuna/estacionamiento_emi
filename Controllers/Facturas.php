<?php
class Facturas extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $this->views->getViews($this, "index");
    }
    public function generaFactura($id_ticket)
    {
        $data = $this->model->getTicket($id_ticket);
        $this->views->getViews($this, "generaFactura", $data);
        print_r($id_ticket);
    }
    public function listar()
    {
        $data = $this->model->getFacturas();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Completado</span>';
                $data[$i]['acciones'] = '<div> 
            <button type="button" class = "btn btn-danger" onclick="btnEliminarFactura(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></button>
            </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Anulada</span>';
                $data[$i]['acciones'] = '<div>
                <button type="button" class = "btn btn-success" onclick="btnReingresarFactura(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-circle-left"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        //<button type="button" class = "btn btn-primary" onclick="btnEditarFactura(' . $data[$i]['id'] . ');"><i class="ffas fa-clipboard-lista-regular fa-pen-to-square"></i></button>
    }
    public function registrar()
    {
        date_default_timezone_set("America/La_Paz");
        $registro = $_POST['registro'];
        $nit = $_POST['nit'];
        $monto_pagado = $_POST['monto_pagado'];
        $monto_recibido = $_POST['monto_recibido'];
        $fecha_emision = $_POST['fecha_emision'];
        // print_r($fecha_emision);
        $fecha_limite = $_POST['fecha_limite'];
        $id = $_POST['id'];
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');

        if (empty($registro) || empty($nit) || empty($monto_pagado) || empty($monto_recibido) || empty($fecha_emision) || empty($fecha_limite)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->registrarFactura($registro, $nit, $monto_pagado, $monto_recibido, $fecha_emision, $fecha_limite, $fecha_hoy);
                if ($data == "ok") {
                    $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'Ya se encuentra registrado', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
                }
            } else {
                $data = $this->model->modificarFactura($registro, $nit, $monto_pagado, $monto_recibido, $fecha_emision, $fecha_limite, $fecha_hoy, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'La factura ya existe', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al modificar factura', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        // $id_usuario = $_SESSION['id_usuario'];
        // $verificar = $this->model->verificarPermiso($id_usuario, 'editar_usuario');
        // if (!empty($verificar) || $id_usuario == 1) {
        $data = $this->model->editarFactura($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
    public function eliminar(int $id)
    {
        // $id_usuario = $_SESSION['id_usuario'];
        // $verificar = $this->model->verificarPermiso($id_usuario, 'eliminar_usuario');
        // if (!empty($verificar) || $id_usuario == 1) {
        $data = $this->model->accionFactura(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Factura dada de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar factura', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
    public function reingresar(int $id)
    {
        // $id_usuario = $_SESSION['id_usuario'];
        // $verificar = $this->model->verificarPermiso($id_usuario, 'reingresar_usuario');
        // if (!empty($verificar) || $id_usuario == 1) {
        $data = $this->model->accionFactura(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Factura reingresada exitosamente', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar la factura', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
    public function buscarNIT(int $nit)
    {
        $data = $this->model->getNIT($nit);
        // print_r($data);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarNIT()
    {
        $nit = $_POST['nit'];
        $razon_social = $_POST['razon_social'];

        if (empty($nit) || empty($razon_social)) {
            $msg = array('msg' => 'Datos de factura obligatorios', 'icono' => 'warning');
        } else {
            $data = $this->model->registrarNIT($nit, $razon_social);
            if ($data == "ok") {
                $msg = array('msg' => 'Datos de factura registrados exitosamente', 'icono' => 'success');
            } else if ($data == "existe") {
                $msg = array('msg' => 'Ya se encuentra registrado', 'icono' => 'warning');
            } else {
                $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
