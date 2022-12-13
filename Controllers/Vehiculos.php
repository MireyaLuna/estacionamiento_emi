<?php
class Vehiculos extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $data['tipos'] = $this->model->getTipos();
        $data['clientes'] = $this->model->getClientes();
        $this->views->getViews($this, "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getVehiculos(); 
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
                $data[$i]['acciones'] = '<div> 
            <button type="button" class = "btn btn-primary" onclick="btnEditarVehiculo(' . $data[$i]['id'] . ');"><i class="fa-regular fa-pen-to-square"></i></button>
            <button type="button" class = "btn btn-danger" onclick="btnEliminarVehiculo(' . $data[$i]['id'] . ');"><i class="fas fa-trash"></i></button>
            </div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
            <button type="button" class = "btn btn-success" onclick="btnReingresarVehiculo(' . $data[$i]['id'] . ');"><i class="fas fa-arrow-circle-left"></i></button>
            </div>';
            }
            
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        date_default_timezone_set("America/La_Paz");
        $placa = $_POST['placa'];
        $placa = strtoupper($placa);
        $color = $_POST['color'];
        $marca = $_POST['marca'];
        $cliente = $_POST['id_cliente'];
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');

        if (empty($placa) || empty($color) || empty($marca) || empty($cliente) || empty($tipo)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                    $data = $this->model->registrarVehiculo($placa, $color, $marca, $cliente, $tipo, $fecha_hoy);
                    if ($data == "ok") {
                        $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                    } else if ($data == "existe") {
                        $msg = array('msg' => 'El vehiculo ya existe', 'icono' => 'warning');
                    } else {
                        $msg = array('msg' => 'Error al registrar vehiculo', 'icono' => 'error');
                    }
                
            } else {
                $data = $this->model->modificarVehiculo($placa, $color, $marca, $cliente, $tipo, $fecha_hoy, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al modificar vehiculo', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar(int $id)
    {
        $data = $this->model->editarVehiculo($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar(int $id)
    {
        $data = $this->model->accionVehiculo(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Vehiculo dado de baja', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al eliminar vehiculo', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar(int $id)
    {
        $data = $this->model->accionVehiculo(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Vehiculo reingresado exitosamente', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el vehiculo', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
