<?php
class VehiculosModel extends Query{
    private $placa, $color, $marca, $cliente, $tipo, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getVehiculos(){
        $sql = "SELECT * FROM vehiculo";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarVehiculo(string $placa, string $color, string $marca, string $cliente, string $tipo, string $fecha){
        $this->placa = $placa;
        $this->color = $color;
        $this->marca = $marca;
        $this->cliente = $cliente;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $verificar = "SELECT * FROM vehiculo WHERE placa = '$this->placa'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO vehiculo(placa, color, marca, id_cliente, tipo, fecha_creacion) VALUES (?,?,?,?,?,?)";
            $datos = array($this->placa, $this->color, $this->marca, $this->cliente, $this->tipo, $this->fecha);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }
        return $res;
    }
    public function editarVehiculo(int $id){
        $sql = "SELECT * FROM vehiculo WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }                                   
    public function modificarVehiculo(string $placa, string $color, string $marca, string $cliente, string $tipo, string $fecha, string $id){
        $this->placa = $placa;
        $this->color = $color;
        $this->marca = $marca;
        $this->id_cliente = $cliente;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->id = $id;
        
        $sql = "UPDATE vehiculo SET placa = ?, color = ?, marca = ?, id_cliente = ?, tipo = ? , fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->placa, $this->color, $this->marca, $this->id_cliente, $this->tipo, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function accionVehiculo(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE vehiculo SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
