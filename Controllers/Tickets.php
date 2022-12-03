<?php
require 'vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

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
    public function historial()
    {
        // $id_usuario = $_SESSION['id_usuario'];
        // $verificar = $this->model->verificarPermiso($id_usuario, 'ver_historial_ventas');
        // if (!empty($verificar) || $id_usuario == 1) {
        $this->views->getViews($this, "historial");
        // } else {
        //     header('Location: ' . base_url . 'Errors/permisos');
        // }
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
        $ingreso = $fecha . " " . $hora;
        $obtenerCodigo = $this->model->getCantidad();
        // echo json_encode($obtenerCodigo, JSON_UNESCAPED_UNICODE);
        $c = $obtenerCodigo['cantidad'] + 1;
        $codigo = $tipo . "" . str_pad($c, 5, "0", STR_PAD_LEFT);
        // print_r($codigo);
        // print_r($espacio);
        // print_r($_POST);
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');

        if (empty($vehiculo) || empty($espacio) || empty($ingreso) || empty($codigo)) {
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
    public function generarPDF($id_ticket)
    {
        
        $ticket = $this->model->getTicket($id_ticket);
        // $descuento = $this->model->getDescuento($id_venta);
        // $productos = $this->model->getProVenta($id_venta);
        // print_r($ticket);
        // exit();

        require('Libraries/fpdf/html2pdf.php');

        // $pdf = new FPDF('P','mm', 'a4');
        $pdf = new PDF_HTML('P', 'mm', array(80, 90));
        // $pdf = new FPDF('P', 'mm', array(200, 80));
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf->SetTitle('Ticket de ingreso');
        $pdf->SetFont('Arial', 'B', 14);
        // $pdf->Cell(65, 10, utf8_decode($empresa['nombre']), 0, 1, 'L');
        $pdf->Image(base_url . 'Assets/img/emilogo.png', 25, 5, 30, 18);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(10, 25);
        $pdf->Cell(22, 6, 'Estacionamiento: ', 0, 0, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(22, 6, $ticket['estacionamiento'], 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(10, 30);
        $pdf->Cell(22, 6, 'Numero de ticket: ', 0, 0, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20, 6, $ticket['codigo'], 0, 1, 'L');
        // $pdf->Ln();
        $pdf->Line(5, 24, 75, 24);
        $pdf->Line(5, 36, 75, 36);
        $pdf->Line(5, 47, 75, 47);
        $pdf->Line(5, 64, 75, 64);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'Placa: ', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, $ticket['placa'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 5, 'Tipo: ', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 5, $ticket['tipo_vehiculo'], 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(20, 6, 'Fecha ingreso: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 7);
        $f = strtotime($ticket['hora_ingreso']);
        $fecha = getDate($f);
        $fecha_ingreso = " " . $fecha['mday'] . "/" . $fecha['mon'] . "/" . $fecha['year'];
        $hora_ingreso = " " . $fecha['hours'] . ":" . $fecha['minutes'] . ":" . $fecha['seconds'];
        $pdf->Cell(20, 6, $fecha_ingreso, 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(20, 6, 'Hora ingreso: ', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(20, 6, $hora_ingreso, 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 7);
        $pdf->Cell(20, 5, 'Espacio: ', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 5, $ticket['nro_espacio'], 0, 1, 'L');

        $pdf->SetXY(20, 65);
        $pdf->SetFillColor(0, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(20, 2, '-------------------------------------', 0, 0, 'L');
        // $pdf->SetXY(20, 67);
        $pdf->Cell(36, 4, 'Conserve este ticket', 0, 0, 'L', true);
      
        // $pdf->Image('http://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=SoyUnDios&.png', 15, 60, 50, 50);
        // //TITULOS DE CLIENTES
        // $pdf->SetFillColor(0, 0, 0);
        // $pdf->SetTextColor(255, 255, 255);
        // $pdf->SetFont('Arial', 'B', 7);
        // $pdf->Cell(20, 5, utf8_decode('C.I.'), 0, 0, 'C', true);
        // $pdf->Cell(50, 5, 'Nombre', 0, 1, 'C', true);

        // $pdf->SetTextColor(0, 0, 0);
        // $clientes = $this->model->clientesVenta($id_venta);
        // $pdf->SetFont('Arial', '', 7);
        // $pdf->Cell(20, 5, $clientes['carnet'], 0, 0, 'L');
        // $pdf->Cell(50, 5, utf8_decode($clientes['nombre']), 0, 1, 'L');

        // $pdf->Ln();

        // //TITULOS DE PRODUCTOS
        // $pdf->SetFillColor(0, 0, 0);
        // $pdf->SetTextColor(255, 255, 255);
        // $pdf->Cell(10, 5, 'Cant', 0, 0, 'L', true);
        // $pdf->Cell(35, 5, utf8_decode('Descripción'), 0, 0, 'L', true);
        // $pdf->Cell(10, 5, ' Precio', 0, 0, 'L', true);
        // $pdf->Cell(15, 5, 'Subtotal', 0, 1, 'L', true);

        // $pdf->SetTextColor(0, 0, 0);

        // $total = 0.00;
        // foreach ($productos as $row) {
        //     $total = $total + $row['subtotal'];
        //     $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'L');
        //     $pdf->Cell(35, 5, utf8_decode($row['descripcion']), 0, 0, 'L');
        //     $pdf->Cell(10, 5, $row['precio'], 0, 0, 'R');
        //     $pdf->Cell(10, 5, number_format($row['cantidad'] * $row['precio'], 2, '.', ','), 0, 1, 'L');
        // }
        // $pdf->Ln();
        // $pdf->SetFont('Arial', 'B', 7);
        // $pdf->Cell(70, 5, 'Descuento total', 0, 1, 'R');
        // $pdf->SetFont('Arial', '', 7);
        // $pdf->Cell(70, 5, number_format($descuento['total'], 2, '.', ','), 0, 1, 'R');
        // $pdf->SetFont('Arial', 'B', 7);
        // $pdf->Cell(70, 5, 'TOTAL A PAGAR', 0, 1, 'R');
        // $pdf->SetFont('Arial', '', 7);
        // $pdf->Cell(70, 5, number_format($total, 2, '.', ','), 0, 1, 'R');

        // $formatter = new NumeroALetras();
        // $letras = $formatter->toMoney($total, 2, '', '');
        // $pdf->SetFont('Arial', 'B', 5);
        // $letrastotal = "Son: " . $letras . " BOLIVIANOS";
        // $pdf->MultiCell(70, 5, utf8_decode($letrastotal), 0, 'R');

        // $pdf->WriteHTML($empresa['mensaje']);

        $pdf->Output();
    }
}
