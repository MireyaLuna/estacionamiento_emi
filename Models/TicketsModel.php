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
    public function getVehiculos()
    {
        $sql = "SELECT * FROM vehiculo";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getTicket(int $id_ticket)
    {
        $sql = "SELECT t.*, v.placa, p.nombre AS tipo_vehiculo, e.id AS espacio, e.nro_espacio, s.nombre AS estacionamiento FROM ticket t INNER JOIN vehiculo v INNER JOIN espacio e INNER JOIN estacionamiento s INNER JOIN parametro p WHERE t.id_vehiculo = v.id AND t.id_espacio = e.id AND e.id_estacionamiento = s.id AND p.codigo = v.tipo AND t.id = '$id_ticket'";
        $data = $this->select($sql);
        return $data;
    }
    public function getTickets()
    {
        $sql = "SELECT t.*, v.placa AS placa, p.nombre AS tipo_vehiculo, e.nro_espacio AS espacio FROM ticket t INNER JOIN vehiculo v INNER JOIN espacio e INNER JOIN parametro p WHERE t.id_vehiculo = v.id AND t.id_espacio = e.id AND p.codigo = v.tipo";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getPlacaVehiculo($placa)
    {
        $verificar = "SELECT v.*, p.nombre AS tipo_vehiculo FROM vehiculo v INNER JOIN parametro p INNER JOIN ticket t WHERE v.placa = '$placa' AND p.codigo = v.tipo AND t.id_vehiculo = v.id AND t.estado = 1";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "SELECT v.*, p.nombre AS tipo_vehiculo FROM vehiculo v INNER JOIN parametro p WHERE v.placa = '$placa' AND p.codigo = v.tipo";
            $data = $this->select($sql);
        }else{
            $data = "existe";
        }
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
        $this->id_usuario = $_SESSION['id_usuario'];

        $sql = "INSERT INTO ticket(codigo, id_vehiculo, hora_ingreso, id_espacio, fecha_creacion, usuario_creacion) VALUES (?,?,?,?,?,?)";
        $datos = array($this->codigo, $this->vehiculo, $this->ingreso, $this->espacio, $this->fecha, $this->id_usuario);
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
    public function accionTicket(int $estado, int $id)
    {
        $datos_ticket = $this->getTicket($id);
        $id_espacio = $datos_ticket['espacio'];
        $this->accionEspacio(1, $id_espacio);

        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE ticket SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    public function getAnular(int $id_ticket)
    {
        $sql = "UPDATE ticket SET estado = ? WHERE id = ?";
        $datos = array(3, $id_ticket);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
}
