<?php
class Espacios extends Controller
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
        $data['estacionamientos'] = $this->model->getEstacionamientos();
        $this->views->getViews($this, "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getEspacios();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Libre</span>';
                $data[$i]['acciones'] = '<div> 
                <button type="button" class = "btn btn-danger" onclick="btnEliminarEspacio(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></button>
                </div>';
            } else if ($data[$i]['estado'] == 2) {
                $data[$i]['estado'] = '<span class="badge bg-danger">Ocupado</span>';
                $data[$i]['acciones'] = '<div> </div>';

            } else {
                $data[$i]['estado'] = '<span class="badge bg-warning">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button type="button" class = "btn btn-success" onclick="btnReingresarEspacio(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-circle-left"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        date_default_timezone_set("America/La_Paz");
        $numero = $_POST['numero'];
        $estacionamiento = $_POST['estacionamiento'];
        // $vehiculo = $_POST['vehiculo'];
        // $ingreso = $_POST['ingreso'];
        $id = $_POST['id'];
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');

        if (empty($numero) || empty($estacionamiento)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->registrarEspacio($numero, $estacionamiento, $fecha_hoy);
                if ($data == "ok") {
                    $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'Ya se encuentra registrado', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
                }
            } else {
                $data = $this->model->modificarEspacio($numero, $estacionamiento, $fecha_hoy, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'El espacio ya existe', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al modificar espacio', 'icono' => 'error');
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
        $data = $this->model->editarEspacio($id);
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
        $data = $this->model->accionEspacio(3, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Espacio dado de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar espacio', 'icono' => 'error');
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
        $data = $this->model->accionEspacio(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Espacio reingresado exitosamente', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el espacio', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
    public function ocupar(int $id)
    {
        // $id_usuario = $_SESSION['id_usuario'];
        // $verificar = $this->model->verificarPermiso($id_usuario, 'reingresar_usuario');
        // if (!empty($verificar) || $id_usuario == 1) {
        $data = $this->model->accionEspacio(2, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
    public function desocupar(int $id)
    {
        // $id_usuario = $_SESSION['id_usuario'];
        // $verificar = $this->model->verificarPermiso($id_usuario, 'reingresar_usuario');
        // if (!empty($verificar) || $id_usuario == 1) {
        $data = $this->model->accionEspacio(1, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
}
