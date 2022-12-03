<?php
class Tickets extends Controller
{
    public function __construct()
    {
        session_start();
        // if (empty($_SESSION['activo'])) {
        //     header("location: " . base_url);
        // }
        parent::__construct();
    }
    public function index()
    {
        $data['espacios'] = $this->model->getEspacios($_SESSION['id_estacionamiento']);
        $this->views->getViews($this, "index", $data);
    }
    public function buscarPlaca($placa)
    {
        $data = $this->model->getPlacaVehiculo($placa);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function obtenerCodigo()
    {
        $data = $this->model->getCantidad();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar($datos)
    {
        date_default_timezone_set("America/La_Paz");
        $array = explode(",", $datos);
        $id = $_POST['id'];
        $vehiculo = $_POST['id_vehiculo'];
        $espacio = $_POST['espacio'];
        $tipo = $_POST['tipo'];
        $fecha = $array[0];
        $hora = $array[1];
        $ingreso = $fecha ." ". $hora;
        $obtenerCodigo = $this->model->getCantidad();
        // echo json_encode($obtenerCodigo, JSON_UNESCAPED_UNICODE);
        $c = $obtenerCodigo['cantidad'] + 1;
        $codigo = $tipo . "" . str_pad($c, 5, "0", STR_PAD_LEFT);
        // print_r($codigo);
        // print_r($espacio);
        // print_r($_POST);
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');
        
        if (empty($vehiculo) || empty($espacio) || empty($ingreso) || empty($codigo) ) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->registrarTicket($codigo, $vehiculo, $ingreso, $espacio, $fecha_hoy);
                if ($data == "ok") {
                    $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'Ya se encuentra registrado', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
                }
            } else {
                // $data = $this->model->modificarEspacio($numero, $estacionamiento, $fecha_hoy, $id);
                // if ($data == "modificado") {
                //     $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
                // } else if ($data == "existe") {
                //     $msg = array('msg' => 'El espacio ya existe', 'icono' => 'warning');
                // } else {
                //     $msg = array('msg' => 'Error al modificar espacio', 'icono' => 'error');
                // }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    
}
