<?php
class ClientesModel extends Query
{
    private $usuario, $nombre, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct()
    {
        parent::__construct();
    }
    public function getClientes()
    {
        $sql = "SELECT c.*, u.usuario AS usuario FROM cliente c INNER JOIN usuario u WHERE c.id_usuario = u.id";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getUsuarios(){
        $sql = "SELECT * FROM usuario";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarCliente(string $nombre, string $ci, string $telefono, string $fecha)
    {
        $this->clave = hash("SHA256", $ci);
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->telefono = $telefono;
        $this->fecha = $fecha;

        // $registrar_usuario = "INSERT INTO usuario(usuario, nombre, clave, genero, cargo, id_estacionamiento, fecha_creacion) VALUES (?,?,?,?,?,?,?)";
        // $datos = array($this->ci, $this->nombre, $this->clave, $this->);
        // $data = $this->save($sql, $datos);

        $verificar = "SELECT * FROM cliente WHERE ci = '$this->ci'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO cliente(nombre, ci, telefono, fecha_creacion) VALUES (?,?,?,?)";
            $datos = array($this->nombre, $this->ci, $this->telefono, $this->fecha);
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
    public function editarCliente(int $id)
    {
        $sql = "SELECT * FROM cliente WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarCliente(string $nombre, string $ci, string $telefono, string $fecha, int $id)
    {
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
        $this->id = $id;
        $verificar = "SELECT * FROM cliente WHERE ci = '$this->ci'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "UPDATE cliente SET nombre = ?, ci = ?, telefono = ? , fecha_modificacion = ? WHERE id = ?";
            $datos = array($this->nombre, $this->ci, $this->telefono, $this->fecha, $this->id);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "modificado";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
        return $res;
    }
    public function accionCliente(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE cliente SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
