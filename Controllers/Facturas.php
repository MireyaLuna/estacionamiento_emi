<?php
require 'vendor/autoload.php';

use Luecano\NumeroALetras\NumeroALetras;

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
                $data[$i]['estado'] = '<span class="badge bg-success">Facturado</span>';
                
                $data[$i]['acciones'] = '<div> 
                <a class="btn btn-danger" href="' . base_url . "Facturas/generarPDF/" . $data[$i]['id'] . '" target="_blank"><i class="fas fa-file-pdf"></i></a></div>';
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
    public function registrar($datos)
    {
        date_default_timezone_set("America/La_Paz");
        $array = explode(",", $datos);
        $monto_total = $array[0];
        $fecha = $array[1];
        $hora = $array[2];
        $salida = $fecha . " " . $hora;
        $id = $_POST['id'];
        $id_ticket = $_POST['id_ticket'];
        $nit = $_POST['nit'];
        $fecha = new DateTime();
        $fecha_hoy = $fecha->format('Y-m-d H:i:s a');
        $fecha_emision = $fecha->format('Y-m-d');

        if (empty($id_ticket) || empty($nit) || empty($monto_total)) {
            $msg = array('msg' => 'Todo los campos son obligatorios', 'icono' => 'warning');
        } else {
            // if ($id == "") {
            $data = $this->model->registrarFactura($nit, $fecha_emision, $monto_total, $id_ticket, $fecha_hoy);
            $data_ticket = $this->model->actualizarTicket($id_ticket, $salida);
            if ($data == "ok") {
                $msg = array('msg' => 'Registrado exitosamente', 'icono' => 'success');
            } else if ($data == "existe") {
                $msg = array('msg' => 'Ya se encuentra registrado', 'icono' => 'warning');
            } else {
                $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
            }
            // } else {
            //     // $data = $this->model->modificarFactura($registro, $nit, $monto_pagado, $monto_recibido, $fecha_emision, $fecha_limite, $fecha_hoy, $id);
            //     // if ($data == "modificado") {
            //     //     $msg = array('msg' => 'Modificado exitosamente', 'icono' => 'success');
            //     // } else if ($data == "existe") {
            //     //     $msg = array('msg' => 'La factura ya existe', 'icono' => 'warning');
            //     // } else {
            //     //     $msg = array('msg' => 'Error al modificar factura', 'icono' => 'error');
            //     // }
            // }
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
    public function generarPDF(int $id_factura)
    {
        $factura = $this->model->getFactura($id_factura);
        $i = $factura['hora_ingreso'];
        $s = $factura['hora_salida'];
        $ingreso = new DateTime($i);
        $salida = new DateTime($s);
        $tiempo_total = $ingreso->diff($salida);
        $horas = ($tiempo_total->format('%d') * 24) + $tiempo_total->format('%h') + 1;
        $monto_total = $horas*7;

        require('Libraries/fpdf/html2pdf.php');
        $pdf = new PDF_HTML('P', 'mm', array(80, 140));
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf->SetTitle('Factura');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Image(base_url . 'Assets/img/emilogo.png', 25, 5, 30, 18);
        $pdf->SetFont('Times', 'B', 7);
        $pdf->SetXY(5, 25);
        $pdf->Cell(70, 3, 'ESTACIONAMIENTO: '.$factura['estacionamiento'], 0, 1, 'C');
        $pdf->Cell(70, 3,$factura['ubicacion'], 0, 1, 'C');
        $pdf->Line(5, 31, 75, 31);
        $pdf->Line(5, 34, 75, 34);
        $codigo = str_pad($factura['id'], 5, "0", STR_PAD_LEFT);
        $pdf->Cell(70, 3, 'FACTURA Nro: '.$codigo, 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(35, 4, 'NIT: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 4, $factura['nit'], 0, 1, 'L');
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(35, 4, 'Nombre/Razon social: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 4, $factura['razon_social'], 0, 1, 'L');
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(35, 4, 'Fecha de emision: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 4, $factura['fecha_emision'], 0, 1, 'L');

        $pdf->Line(5, 46, 75, 46);
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(70, 4, 'DATOS DE CLIENTE Y VEHICULO ', 0, 1, 'C');
        $pdf->Cell(15, 3, 'Cliente: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['nombre'], 0, 1, 'L');
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(15, 3, 'C.I.: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['ci'], 0, 1, 'L');
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(15, 3, 'Tipo: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['tipo_vehiculo'], 0, 1, 'L');

        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(15, 3, 'Placa: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['placa'], 0, 1, 'L');
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(15, 3, 'Entrada: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['hora_ingreso'], 0, 1, 'L');
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(15, 3, 'Salida: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['hora_salida'], 0, 1, 'L');
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(15, 3, 'Espacio: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(35, 3, $factura['nro_espacio'], 0, 1, 'L');

        $pdf->SetFillColor(0, 0, 0);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(9, 4, 'CANT.', 0, 0, 'C', true);
        $pdf->Cell(38, 4, utf8_decode('DESCRIPCIÓN'), 0, 0, 'C', true);
        $pdf->Cell(10, 4, 'P/U', 0, 0, 'C', true);
        $pdf->Cell(13, 4, 'SUBTOTAL', 0, 1, 'C', true);
        $pdf->SetTextColor(0, 0, 0);

        $pdf->Cell(9, 5, $horas, 0, 0, 'C');
        $pdf->Cell(38, 5, 'Parqueo vehiculo', 0, 0, 'L');
        $pdf->Cell(10, 5, '7', 0, 0, 'C');
        $pdf->Cell(13, 5, $monto_total, 0, 1, 'C');

        $pdf->Line(5, 80, 75, 80);
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(57, 5, 'Monto a pagar Bs.: ', 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(13, 5, $monto_total, 0, 1, 'C');
        
        $pdf->SetFont('Times', 'B', 7);
        $pdf->Cell(57, 5, utf8_decode('Importe base crédito fiscal Bs.: '), 0, 0, 'R');
        $pdf->SetFont('Times', '', 7);
        $pdf->Cell(13, 5, $monto_total, 0, 1, 'C');
        
        $formatter = new NumeroALetras();
        $letras = $formatter->toMoney($monto_total, 2, '', '');
        $pdf->Line(5, 96, 75, 96);
        $pdf->Cell(70, 6, 'Son: '.$letras. '00/100 BOLIVIANOS', 0, 1, 'C');
        $pdf->MultiCell(70, 4, utf8_decode('"Esta factura contribuye al desarrollo del país, el uso ilícito será sancionado penalmente de acuerdo a la ley."'),0,'C');
        
        $pdf->Line(5, 104, 75, 104);
        $pdf->SetFont('Times', '', 6);
        $pdf->Cell(70, 6, 'Usuario: '.$_SESSION['usuario'], 0, 1, 'L');

        $pdf->Output();

     
    }
    public function obtenerIDfactura()
    {
        $data = $this->model->getID();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}
