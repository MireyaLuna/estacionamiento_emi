<?php
class FacturasModel extends Query
{
    private $usuario, $registro, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct()
    {
        parent::__construct();
    }
    public function getFacturas()
    {
        $sql = "SELECT * FROM factura";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getFactura(int $id)
    {
        $usuario = $_SESSION['id_usuario'];
        $sql = "SELECT f.id, e.nombre AS estacionamiento, e.ubicacion, f.nit, df.razon_social, f.fecha_emision, c.nombre, c.ci, p.nombre AS tipo_vehiculo, v.placa, t.hora_ingreso, t.hora_salida, s.nro_espacio 
        FROM factura f INNER JOIN estacionamiento e INNER JOIN datos_factura df INNER JOIN ticket t INNER JOIN espacio s INNER JOIN cliente c INNER JOIN vehiculo v INNER JOIN usuario u INNER JOIN parametro p 
        WHERE t.id = f.id_ticket AND t.id_espacio = s.id AND t.id_vehiculo = v.id AND f.nit = df.nit AND v.id_cliente = c.id AND p.codigo = v.tipo AND f.id = $id AND u.id = $usuario AND u.id_estacionamiento = e.id";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarFactura(string $nit, string $fecha_emision, string $monto_total, string $id_ticket, string $fecha )
    {
        $this->nit = $nit;
        $this->fecha_emision = $fecha_emision;
        $this->monto_total = $monto_total;
        $this->id_ticket = $id_ticket;
        $this->fecha = $fecha;
        $this->id_usuario = $_SESSION['id_usuario'];

        $sql = "INSERT INTO factura(nit, fecha_emision, monto_total, id_ticket, fecha_creacion, usuario_creacion) VALUES (?,?,?,?,?,?)";
        $datos = array($this->nit, $this->fecha_emision, $this->monto_total, $this->id_ticket, $this->fecha, $this->id_usuario);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }

        return $res;
    }
    public function editarFactura(int $id)
    {
        $sql = "SELECT * FROM factura WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarFactura(string $registro, string $nit, string $monto_pagado, string $monto_recibido, string $fecha_emision, string $fecha_limite, string $fecha, int $id)
    {
        $this->registro = $registro;
        $this->nit = $nit;
        $this->monto_pagado = $monto_pagado;
        $this->monto_recibido = $monto_recibido;
        $this->fecha_emision = $fecha_emision;
        $this->fecha_limite = $fecha_limite;
        $this->fecha = $fecha;
        $this->id_usuario = $_SESSION['id_usuario'];

        $this->id = $id;
        $sql = "UPDATE factura SET id_registro = ?, nit = ?, monto_pagado = ?, monto_recibido = ?, fecha_emision = ?, fecha_limite_emision =?, fecha_modificacion = ?, usuario_modificacion = ? WHERE id = ?";
        $datos = array($this->registro, $this->nit, $this->monto_pagado, $this->monto_recibido, $this->fecha_emision, $this->fecha_limite, $this->fecha, $this->id_usuario, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function accionFactura(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE factura SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    public function getTicket(int $id_ticket)
    {
        $sql = "SELECT t.*, v.placa, p.nombre AS tipo_vehiculo, e.nro_espacio, s.nombre AS estacionamiento FROM ticket t INNER JOIN vehiculo v INNER JOIN espacio e INNER JOIN estacionamiento s INNER JOIN parametro p WHERE t.id_vehiculo = v.id AND t.id_espacio = e.id AND e.id_estacionamiento = s.id AND p.codigo = v.tipo AND t.id = '$id_ticket'";
        $data = $this->select($sql);
        return $data;
    }
    public function getNIT(string $nit)
    {
        $sql = "SELECT * FROM datos_factura WHERE nit = '$nit'";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarNIT(string $nit, string $razon_social)
    {
        $this->nit = $nit;
        $this->razon_social = $razon_social;

        $sql = "INSERT INTO datos_factura(nit, razon_social) VALUES (?,?)";
        $datos = array($this->nit, $this->razon_social);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }

        return $res;
    }
    public function getID()
    {
        $sql = "SELECT COUNT(*) AS factura FROM factura";
        $data = $this->select($sql);
        return $data;
    }
    public function actualizarTicket(int $id, string $fecha_salida)
    {
        $this->id = $id;
        $this->fecha_salida = $fecha_salida;
        $sql = "UPDATE ticket SET hora_salida = ? WHERE id = ?";
        $datos = array($this->fecha_salida, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
}
