<?php
require 'vendor/autoload.php';

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
        $data = $this->model->getVehiculos();
        $this->views->getViews($this, "historial", $data);
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
            // if ($id == "") {
            $data = $this->model->registrarTicket($codigo, $vehiculo, $ingreso, $espacio, $fecha_hoy);
            if ($data == "ok") {
                $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
            } else if ($data == "existe") {
                $msg = array('msg' => 'Ya se encuentra registrado', 'icono' => 'warning');
            } else {
                $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
            }
            // } else {
            //                 }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function generarPDF($id_ticket)
    {
        $ticket = $this->model->getTicket($id_ticket);

        require('Libraries/fpdf/html2pdf.php');

        $pdf = new PDF_HTML('P', 'mm', array(80, 90));
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
        $pdf->Cell(36, 4, 'Conserve este ticket', 0, 0, 'L', true);


        $pdf->Output();
    }
    public function listar_tickets()
    {
        // <button class = "btn btn-success" onclick="btnGenerarFactura(' . $data[$i]['id'] . ')"><i class="fas fa-file-invoice"></i></button>
        $data = $this->model->getTickets();
        // print_r($data);
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge bg-warning">En playa</span>';
                $data[$i]['acciones'] = '<div>
                <button class = "btn btn-warning" onclick="btnAnularTicket(' . $data[$i]['id'] . ')"><i class = "fas fa-ban"></i></button>
           <a class="btn btn-success" href="' . base_url . "Facturas/generaFactura/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-invoice"></i></a></div>
            <a class="btn btn-danger" href="' . base_url . "Tickets/generarPDF/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a></div>
            ';
            } else  if ($data[$i]['estado'] == 2) {
                $data[$i]['estado'] = '<span class="badge bg-success">Finalizado</span>';
                $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="' . base_url . "Tickets/generarPDF/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a></div>';
            } else {
                $data[$i]['estado'] = '<span class="badge bg-danger">Anulado</span>';
                $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="' . base_url . "Tickets/generarPDF/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a>
            </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar_detalle()
    {
        $data = $this->model->getTickets();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function anular($id_ticket)
    {
        $ticket = $this->model->getTicket($id_ticket);
        $desocupar = $this->model->accionEspacio(1, $ticket['id_espacio']);
        $anular = $this->model->getAnular($id_ticket);
        if ($anular == 'ok') {
            $msg = array('msg' => 'Ticket anulado', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al anular', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ticketFacturado(int $id)
    {
        $data = $this->model->accionTicket(2, $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
