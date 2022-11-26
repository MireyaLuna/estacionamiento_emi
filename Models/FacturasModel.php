<?php
class FacturasModel extends Query{
    private $usuario, $registro, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getFacturas(){
        $sql = "SELECT * FROM factura";
        $data = $this->selectAll($sql);
        return $data;
    }                    
    public function registrarFactura(string $registro, string $nit, string $nombre, string $cantidad, string $fecha_emision, string $fecha_limite, string $fecha){
        $this->registro = $registro;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->fecha_emision = $fecha_emision;
        $this->fecha_limite = $fecha_limite;
        $this->fecha = $fecha;
        
        $sql = "INSERT INTO factura(id_registro, nit, nombre, cantidad, fecha_emision, fecha_limite_emision, fecha_creacion) VALUES (?,?,?,?,?,?,?)";
        $datos = array($this->registro, $this->nit, $this->nombre, $this->cantidad, $this->fecha_emision, $this->fecha_limite, $this->fecha);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function editarFactura(int $id){
        $sql = "SELECT * FROM factura WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }                               
    public function modificarFactura(string $registro, string $nit, string $nombre, string $cantidad, string $fecha_emision, string $fecha_limite, string $fecha, int $id){
        $this->registro = $registro;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->fecha_emision = $fecha_emision;
        $this->fecha_limite = $fecha_limite;
        $this->fecha = $fecha;
        $this->id = $id;
        $sql = "UPDATE factura SET id_registro = ?, nit = ?, nombre = ?, cantidad = ?, fecha_emision = ?, fecha_limite_emision =?, fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->registro, $this->nit, $this->nombre, $this->cantidad, $this->fecha_emision, $this->fecha_limite, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function accionFactura(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE factura SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
