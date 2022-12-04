<?php
class AdministradorModel extends Query
{
    private $nombre, $codigo_saga, $ci, $id, $estado, $fecha;
    public function __construct()
    {
        parent::__construct();
    }
    public function getAdministradores()
    {
        $sql = "SELECT * FROM administrador";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getDatos(string $table){
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $data = $this->select($sql);
        return $data;
    }
    
    public function getEstadoEspacio(int $estado){
        $sql = "SELECT COUNT(*) AS total FROM espacio WHERE estado = $estado";
        $data = $this->select($sql);
        return $data;
    }

    public function registrarAdministrador(string $nombre, string $ci, string $codigo_saga, string $id_usuario, string $fecha)
    {
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->codigo_saga = $codigo_saga;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $verificar = "SELECT * FROM administrador WHERE ci = '$this->ci'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO administrador (nombre, ci, codigo_saga, id_usuario, fecha_creacion) VALUES (?,?,?,?,?)";
            $datos = array($this->nombre, $this->ci, $this->codigo_saga, $this->id_usuario, $this->fecha);
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
    public function editarAdministrador(int $id)
    {
        $sql = "SELECT * FROM administrador WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarAdministrador(string $nombre, string $ci, string $codigo_saga, string $id_usuario, string $fecha, int $id)
    {
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->codigo_saga = $codigo_saga;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->id = $id;
        $sql = "UPDATE administrador SET nombre = ?, ci = ?, codigo_saga = ?, id_usuario = ?, fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->nombre, $this->ci, $this->codigo_saga, $this->id_usuario, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function accionAdministrador(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE administrador SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
