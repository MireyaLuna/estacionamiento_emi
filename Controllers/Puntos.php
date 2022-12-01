<?php
class Puntos extends Controller
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
        $data = $this->model->getPuntos();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div> 
            <button type="button" class = "btn btn-primary" onclick="btnEditarPunto(' . $data[$i]['id'] . ');"><i class="fa-regular fa-pen-to-square"></i></button>
            <button type="button" class = "btn btn-danger" onclick="btnEliminarPunto(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></button>
            </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button type="button" class = "btn btn-success" onclick="btnReingresarPunto(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-circle-left"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        date_default_timezone_set("America/La_Paz");
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $estacionamiento = $_POST['estacionamiento'];
        $id = $_POST['id'];
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');

        if (empty($nombre) || empty($descripcion) || empty($estacionamiento)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->registrarPunto($nombre, $descripcion, $estacionamiento, $fecha_hoy);
                if ($data == "ok") {
                    $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al registrar punto de atencion', 'icono' => 'error');
                }
            } else {
                $data = $this->model->modificarPunto($nombre, $descripcion, $estacionamiento, $fecha_hoy, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al modificar punto de atencion', 'icono' => 'error');
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
        $data = $this->model->editarPunto($id);
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
        $data = $this->model->accionPunto(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Punto de atencion dado de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar punto de atencion', 'icono' => 'error');
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
        $data = $this->model->accionPunto(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Punto de atencion reingresado exitosamente', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el punto de atencion', 'icono' => 'error');
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
