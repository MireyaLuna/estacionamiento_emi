<?php
class EstacionamientosModel extends Query{
    private $usuario, $nombre, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getEstacionamientos(){
        $sql = "SELECT * FROM estacionamiento";
        $data = $this->selectAll($sql);
        return $data;
    }                                        
    public function registrarEstacionamiento(string $nombre, string $ubicacion, string $fecha){
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->fecha = $fecha;
        
        $sql = "INSERT INTO estacionamiento(nombre, ubicacion, fecha_creacion) VALUES (?,?,?)";
        $datos = array($this->nombre, $this->ubicacion, $this->fecha);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function editarEstacionamiento(int $id){
        $sql = "SELECT * FROM estacionamiento WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarEstacionamiento(string $nombre, string $ubicacion, string $fecha, int $id){
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->fecha = $fecha;
        $this->id = $id;
        $sql = "UPDATE estacionamiento SET nombre = ?, ubicacion = ?, fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->nombre, $this->ubicacion, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function accionEstacionamiento(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE estacionamiento SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
