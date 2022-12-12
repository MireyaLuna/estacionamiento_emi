<?php
class EspaciosModel extends Query
{
    private $usuario, $numero, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct()
    {
        parent::__construct();
    }
    public function getEspacios()
    {
        $sql = "SELECT e.*, s.nombre AS estacionamiento FROM espacio e INNER JOIN estacionamiento s WHERE e.id_estacionamiento = s.id ORDER BY e.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getEstacionamientos()
    {
        $sql = "SELECT * FROM estacionamiento WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarEspacio(string $numero, string $estacionamiento, string $fecha, int $id_usuario)
    {
        $this->numero = $numero;
        $this->estacionamiento = $estacionamiento;
        $this->fecha = $fecha;
        $this->id_usuario = $id_usuario;
        $verificar = "SELECT * FROM espacio WHERE id_estacionamiento = '$this->estacionamiento' AND nro_espacio = '$this->numero'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO espacio(nro_espacio, id_estacionamiento, fecha_creacion, usuario_creacion) VALUES (?,?,?,?)";
            $datos = array($this->numero, $this->estacionamiento, $this->fecha, $this->id_usuario);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        
        return $res;
    }
    public function editarEspacio(int $id)
    {
        $sql = "SELECT * FROM espacio WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarEspacio(string $numero, string $estacionamiento, string $fecha, int $id_usuario, int $id)
    {
        $this->numero = $numero;
        $this->estacionamiento = $estacionamiento;
        $this->fecha = $fecha;
        $this->id_usuario = $id_usuario;
        $this->id = $id;
        $sql = "UPDATE espacio SET nro_espacio = ?, id_estacionamiento = ?, fecha_modificacion = ?, usuario_modificacion = ? WHERE id = ?";
        $datos = array($this->numero, $this->estacionamiento, $this->fecha, $this->id_usuario,$this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function accionEspacio(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $this->id_usuario = $_SESSION['id_usuario'];

        $sql = "UPDATE espacio SET estado = ?, usuario_modificacion = ? WHERE id = ?";
        $datos = array($this->estado, $this->id_usuario, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
