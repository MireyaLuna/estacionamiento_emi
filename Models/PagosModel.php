<?php
class PagosModel extends Query{
    private $monto, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getPagos(){
        $sql = "SELECT * FROM pago";
        $data = $this->selectAll($sql);
        return $data;
    }                                            
    public function registrarPago(string $monto, string $fecha){
        $this->monto = $monto;
        $this->fecha = $fecha;
        
        $sql = "INSERT INTO pago(monto, fecha_creacion) VALUES (?,?)";
        $datos = array($this->monto, $this->fecha);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function editarPago(int $id){
        $sql = "SELECT * FROM pago WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }                               
    public function modificarPago(string $monto, string $fecha, int $id){
        $this->monto = $monto;
        $this->fecha = $fecha;
        $this->id = $id;
        $sql = "UPDATE pago SET monto = ?, fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->monto, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function accionPago(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE pago SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
