<?php
class EspaciosModel extends Query{
    private $usuario, $numero, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getEspacios(){
        $sql = "SELECT * FROM espacio";
        $data = $this->selectAll($sql);
        return $data;
    }                                            
    public function registrarEspacio(string $numero, string $estacionamiento, string $vehiculo, string $ingreso, string $fecha){
        $this->numero = $numero;
        $this->estacionamiento = $estacionamiento;
        $this->vehiculo = $vehiculo;
        $this->ingreso = $ingreso;
        $this->fecha = $fecha;
        
        $sql = "INSERT INTO espacio(nro_espacio, id_estacionamiento, id_vehiculo, hora_ingreso, fecha_creacion) VALUES (?,?,?,?,?)";
        $datos = array($this->numero, $this->estacionamiento, $this->vehiculo, $this->ingreso, $this->fecha);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "ok";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function editarEspacio(int $id){
        $sql = "SELECT * FROM espacio WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }                               
    public function modificarEspacio(string $numero, string $estacionamiento, string $vehiculo, string $ingreso, string $salida, string $fecha, int $id){
        $this->numero = $numero;
        $this->estacionamiento = $estacionamiento;
        $this->vehiculo = $vehiculo;
        $this->ingreso = $ingreso;
        $this->salida = $salida;
        $this->fecha = $fecha;
        $this->id = $id;
        $sql = "UPDATE espacio SET nro_espacio = ?, id_estacionamiento = ?, id_vehiculo = ?, hora_ingreso = ?, hora_salida = ?, fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->numero, $this->estacionamiento, $this->vehiculo, $this->ingreso, $this->salida, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }
    public function accionEspacio(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE espacio SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
