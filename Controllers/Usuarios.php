<?php
class Usuarios extends Controller
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
        $data['estacionamientos'] = $this->model->getEstacionamientos();
        $this->views->getViews($this, "index", $data);
    }
    public function mis_datos()
    {
        $data['datos'] = $this->model->getDatosUsuario($_SESSION['id_usuario']);
        $this->views->getViews($this, "mis_datos", $data);
    }
    public function mis_vehiculos()
    {
        // $data['datos'] = $this->model->getVehiculosUsuario($_SESSION['id_usuario']);
        $this->views->getViews($this, "mis_vehiculos");
    }
    public function mis_tickets()
    {
        // $data['tickets'] = $this->model->getTicketsUsuario($_SESSION['id_usuario']);
        $this->views->getViews($this, "mis_tickets");
    }
    public function listar()
    {
        $data = $this->model->getUsuarios();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                if ($data[$i]['id'] == 1) {
                    $data[$i]['acciones'] = '<div><span class="badge bg-primary">Administrador</span></div>';
                } else {
                    $data[$i]['acciones'] = '<div> 
                                            <button type="button" class = "btn btn-primary" onclick="btnEditarUsuario(' . $data[$i]['id'] . ');"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button type="button" class = "btn btn-danger" onclick="btnEliminarUsuario(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></button>
                                            </div>';
                }
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button type="button" class = "btn btn-success" onclick="btnReingresarUsuario(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-circle-left"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar_MisTickets()
    {
        $data = $this->model->getTicketsUsuario($_SESSION['id_usuario']);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-warning">En playa</span>';
            } else  if ($data[$i]['estado'] == 2) {
                $data[$i]['estado'] = '<span class="badge bg-success">Finalizado</span>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Anulado</span>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar_misVehiculos()
    {
        $data = $this->model->getVehiculosUsuario($_SESSION['id_usuario']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function validar()
    {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = "Los campos estan vacios";
        } else {
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $hash = hash("SHA256", $clave);
            $data = $this->model->getUsuario($usuario, $hash);
            if ($data) {
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['id_estacionamiento'] = $data['id_estacionamiento'];
                $_SESSION['estacionamiento'] = $data['estacionamiento'];
                $_SESSION['cargo'] = $data['cargo_usuario'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            } else {
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        date_default_timezone_set("America/La_Paz");
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $confirmar = $_POST['confirmar'];
        $genero = $_POST['genero'];
        $cargo = $_POST['cargo'];
        $id_estacionamiento = $_POST['estacionamiento'];
        $id = $_POST['id'];
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');
        $hash = hash("SHA256", $clave);
        $usuario_interaccion = $_SESSION['id_usuario'];

        if (empty($usuario) || empty($nombre) || empty($genero) || empty($cargo) || empty($id_estacionamiento)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                if ($clave != $confirmar) {
                    $msg = array('msg' => 'No coinciden las constraseñas', 'icono' => 'warning');
                } else {
                    $data = $this->model->registrarUsuario($usuario, $nombre, $hash, $genero, $cargo, $id_estacionamiento, $fecha_hoy, $usuario_interaccion);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                    } else if ($data == "existe") {
                        $msg = array('msg' => 'El usuario ya existe', 'icono' => 'warning');
                    } else {
                        $msg = array('msg' => 'Error al registrar usuario', 'icono' => 'error');
                    }
                }
            } else {
                $data = $this->model->modificarUsuario($usuario, $nombre, $genero, $cargo, $id_estacionamiento, $fecha_hoy, $usuario_interaccion, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al modificar usuario', 'icono' => 'error');
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
        $data = $this->model->editarUsuario($id);
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
        $data = $this->model->accionUser(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar usuario', 'icono' => 'error');
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
        $data = $this->model->accionUser(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Usuario reingresado exitosamente', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el usuario', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
        // } else {
        //     $msg = '';
        //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        //     die();
        // }
    }
    public function cambiarPass()
    {
        $actual = $_POST['clave_actual'];
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['confirmar_clave'];

        if (empty($actual) || empty($nueva) || empty($confirmar)) {
            $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($nueva != $confirmar) {
                $msg = array('msg' => 'Las contraseñas no coinciden', 'icono' => 'warning');
            } else {
                $id = $_SESSION['id_usuario'];
                $hash = hash("SHA256", $actual);
                $data = $this->model->getPass($hash, $id);
                if (!empty($data)) {
                    $verificar = $this->model->modificarPass(hash("SHA256", $nueva), $id);
                    if ($verificar == 1) {
                        $msg = array('msg' => 'Contraseña modificada con exito', 'icono' => 'success');
                    } else {
                        $msg = array('msg' => 'Error al modificar la contraseña', 'icono' => 'error');
                    }
                } else {
                    $msg = array('msg' => 'Contraseña actual incorrecta', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function salir()
    {
        session_destroy();
        header("location: " . base_url);
    }
}
