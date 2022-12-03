<?php
class TicketsModel extends Query
{
    private $nombre, $codigo_saga, $ci, $id, $estado, $fecha;
    public function __construct()
    {
        parent::__construct();
    }
    public function getEspacios(int $id_estacionamiento)
    {
        $sql = "SELECT * FROM espacio WHERE estado = 1 AND id_estacionamiento = $id_estacionamiento";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getPlacaVehiculo($placa)
    {
        $sql = "SELECT v.*, p.nombre AS tipo_vehiculo FROM vehiculo v INNER JOIN parametro p WHERE v.placa = '$placa' AND p.codigo = v.tipo";
        $data = $this->select($sql);
        return $data;
    }
    public function getCantidad()
    {
        $sql = "SELECT COUNT(*) AS cantidad FROM ticket";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarTicket(string $codigo, string $vehiculo, string $ingreso, int $espacio, string $fecha)
    {
        $this->codigo = $codigo;
        $this->vehiculo = $vehiculo;
        $this->ingreso = $ingreso;
        $this->espacio = $espacio;
        $this->fecha = $fecha;
        $sql = "INSERT INTO ticket(codigo, id_vehiculo, hora_ingreso, id_espacio, fecha_creacion) VALUES (?,?,?,?,?)";
        $datos = array($this->codigo, $this->vehiculo, $this->ingreso, $this->espacio, $this->fecha);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function accionEspacio(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE espacio SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
