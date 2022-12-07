<?php
class Clientes extends Controller
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
        $data['generos'] = $this->model->getGeneros();
        $data['cargos'] = $this->model->getCargos();
        $data['usuarios'] = $this->model->getUsuarios();
        $this->views->getViews($this, "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getClientes();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div> 
            <button type="button" class = "btn btn-primary" onclick="btnEditarCliente(' . $data[$i]['id'] . ');"><i class="fa-regular fa-pen-to-square"></i></button>
            <button type="button" class = "btn btn-danger" onclick="btnEliminarCliente(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></button>
            </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button type="button" class = "btn btn-success" onclick="btnReingresarCliente(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-circle-left"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        date_default_timezone_set("America/La_Paz");
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $ci = $_POST['ci'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];
        $cargo = $_POST['cargo'];
        $id_estacionamiento = $_SESSION['id_estacionamiento'];
        $hash = hash("SHA256", $ci);
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');

        if (empty($nombre) || empty($ci) || empty($telefono) || empty($genero)|| empty($cargo) || empty($id_estacionamiento) ) {
            $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data_usuario = $this->model->registrarUsuario($ci, $nombre, $hash, $genero, $cargo, $id_estacionamiento, $fecha_hoy);
                if ($data_usuario == "ok") {
                    $id_usuario = $this->model->getIdUsuario();
                    // $usuario = intval($id_usuario);
                    $data = $this->model->registrarCliente($nombre, $ci, $telefono, $fecha_hoy, $id_usuario['id_usuario']);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                    } else if ($data == "existe") {
                        $msg = array('msg' => 'El cliente ya existe', 'icono' => 'warning');
                    } else {
                        $msg = array('msg' => 'Error al registrar cliente', 'icono' => 'error');
                    }
                } else if ($data_usuario == "existe") {
                    $msg = array('msg' => 'El usuario para el cliente ya existe', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar el usuario para el cliente', 'icono' => 'error');
                }                
            } else {
                $id_usuario = $this->model->getUsuarioCliente($id);
                $data = $this->model->modificarUsuario($ci, $nombre, $fecha_hoy, $id_usuario['id_usuario']);
                if ($data == "modificado") {
                    $data = $this->model->modificarCliente($nombre, $ci, $telefono, $fecha_hoy, $id);
                    if ($data == "modificado") {
                        $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                    } else {
                        $msg = array('msg' => 'Error al modificar cliente', 'icono' => 'error');
                    }
                } else {
                    $msg = array('msg' => 'Error al modificar usuario del cliente', 'icono' => 'error');
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
        $data = $this->model->editarCliente($id);
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
        $data = $this->model->accionCliente(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Cliente dado de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar cliente', 'icono' => 'error');
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
        $data = $this->model->accionCliente(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Cliente reingresado exitosamente', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el cliente', 'icono' => 'error');
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
