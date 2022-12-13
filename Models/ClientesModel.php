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
    public function getGeneros()
    {
        $sql = "SELECT * FROM parametro WHERE grupo = 'Genero'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCargos()
    {
        $sql = "SELECT * FROM parametro WHERE grupo = 'Cargo'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarUsuario(string $usuario, string $nombre, string $clave, string $genero, string $cargo, string $fecha, int $usuario_interaccion)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->genero = $genero;
        $this->cargo = $cargo;
        // $this->id_estacionamiento = $id_estacionamiento;
        $this->fecha = $fecha;
        $this->usuario_interaccion = $usuario_interaccion;

        $verificar = "SELECT * FROM usuario WHERE usuario = '$this->usuario'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO usuario(usuario, nombre, clave, genero, cargo, fecha_creacion, usuario_creacion) VALUES (?,?,?,?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->genero, $this->cargo, $this->fecha, $this->usuario_interaccion);
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
    public function getIdUsuario()
    {
        $sql = "SELECT COUNT(*) AS id_usuario FROM usuario";
        $data = $this->select($sql);
        return $data;
    }
    public function getUsuarioCliente(int $id)
    {
        $sql = "SELECT c.id_usuario FROM cliente c INNER JOIN usuario u WHERE c.id_usuario = u.id AND c.id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function registrarCliente(string $nombre, string $ci, string $telefono, string $fecha, int $id_usuario, int $usuario_interaccion)
    {
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
        $this->id_usuario = $id_usuario;
        $this->usuario_interaccion = $usuario_interaccion;

        $verificar = "SELECT * FROM cliente WHERE ci = '$this->ci'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO cliente(nombre, ci, telefono, fecha_creacion, id_usuario, usuario_creacion) VALUES (?,?,?,?,?,?)";
            $datos = array($this->nombre, $this->ci, $this->telefono, $this->fecha, $this->id_usuario, $this->usuario_interaccion);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "error";
        }

        return $res;
    }
    public function editarCliente(int $id)
    {
        $sql = "SELECT c.*, u.usuario AS usuario, u.cargo, u.genero FROM cliente c INNER JOIN usuario u WHERE c.id_usuario = u.id AND c.id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarCliente(string $nombre, string $ci, string $telefono, string $fecha, int $usuario_interaccion, int $id)
    {
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
        $this->id = $id;
        $this->usuario_interaccion = $usuario_interaccion;

        // $verificar = "SELECT * FROM cliente WHERE ci = '$this->ci'";
        // $existe = $this->select($verificar);
        // if (empty($existe)) {
            $sql = "UPDATE cliente SET nombre = ?, ci = ?, telefono = ? , fecha_modificacion = ?, usuario_modificacion = ? WHERE id = ?";
            $datos = array($this->nombre, $this->ci, $this->telefono, $this->fecha, $this->usuario_interaccion, $this->id);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "modificado";
            } else {
                $res = "error";
            }
        // } else {
        //     $res = "existe";
        // }
        return $res;
    }
    public function modificarUsuario(string $usuario, string $nombre, string $fecha, int $usuario_interaccion, int $id)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->id = $id;
        $this->usuario_interaccion = $usuario_interaccion;

        $sql = "UPDATE usuario SET usuario = ?, nombre = ?, fecha_modificacion = ?, usuario_modificacion = ? WHERE id = ?";
        $datos = array($this->usuario, $this->nombre, $this->fecha, $this->usuario_interaccion, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
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
