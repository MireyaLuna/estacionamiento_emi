<?php
class PuntosModel extends Query{
    private $nombre, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getPuntos(){
        $sql = "SELECT * FROM punto_atencion";
        $data = $this->selectAll($sql);
        return $data;
    }                                        
    public function registrarPunto(string $nombre, string $descripcion, string $estacionamiento, string $fecha){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estacionamiento = $estacionamiento;
        $this->fecha = $fecha;
        $sql = "INSERT INTO punto_atencion(nombre, descripcion, id_estacionamiento, fecha_creacion) VALUES (?,?,?,?)";
        $datos = array($this->nombre, $this->descripcion, $this->estacionamiento, $this->fecha);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function editarPunto(int $id){
        $sql = "SELECT * FROM punto_atencion WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarPunto(string $nombre, string $descripcion, string $estacionamiento, string $fecha, int $id){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estacionamiento = $estacionamiento;
        $this->fecha = $fecha;
        $this->id = $id;

        $sql = "UPDATE punto_atencion SET nombre = ?, descripcion = ?, id_estacionamiento = ? , fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->nombre, $this->descripcion, $this->estacionamiento, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function accionPunto(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE punto_atencion SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
