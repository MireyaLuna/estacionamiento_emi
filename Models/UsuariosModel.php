<?php
class UsuariosModel extends Query
{
    private $usuario, $nombre, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct()
    {
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave)
    {
        // $sql = "SELECT u.*, e.nombre AS estacionamiento, p.codigo AS cargo_usuario FROM usuario u INNER JOIN estacionamiento e INNER JOIN parametro p WHERE u.usuario = '$usuario' AND u.clave = '$clave' AND u.id_estacionamiento = e.id AND p.codigo = u.cargo";
        $sql = "SELECT u.*, p.codigo AS cargo_usuario FROM usuario u INNER JOIN parametro p 
        WHERE u.usuario = '$usuario' AND u.clave = '$clave' AND p.codigo = u.cargo";
        $data = $this->select($sql);
        return $data;
    }
    public function getDatosUsuario(int $id_usuario)
    {
        $sql = "SELECT c.*, u.usuario FROM usuario u INNER JOIN cliente c WHERE u.id = $id_usuario AND c.id_usuario = u.id";
        $data = $this->select($sql);
        return $data;
    }
    public function getVehiculosUsuario(int $id_usuario)
    {
        $sql = "SELECT v.*, p.nombre AS tipo_vehiculo FROM usuario u INNER JOIN vehiculo v INNER JOIN cliente c INNER JOIN parametro p WHERE u.id = $id_usuario AND u.usuario = c.ci AND c.id = v.id_cliente AND p.codigo = v.tipo";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getTicketsUsuario(int $id_usuario)
    {
        $sql = "SELECT t.*, v.placa, e.nro_espacio AS espacio_ocupado FROM usuario u INNER JOIN vehiculo v INNER JOIN cliente c INNER JOIN ticket t INNER JOIN espacio e WHERE u.id = $id_usuario AND u.usuario = c.ci AND c.id = v.id_cliente AND t.id_vehiculo = v.id AND t.id_espacio = e.id;";
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
    public function getEstacionamientos()
    {
        $sql = "SELECT * FROM estacionamiento WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getUsuarios()
    {
        // $sql = "SELECT u.*, p.nombre AS genero, p2.nombre AS cargo, e.nombre AS estacionamiento FROM usuario u INNER JOIN parametro p INNER JOIN parametro p2 INNER JOIN estacionamiento e WHERE u.genero = p.codigo AND u.cargo = p2.codigo AND e.id = u.id_estacionamiento";
        $sql = "SELECT u.*, p.nombre AS genero, p2.nombre AS cargo FROM usuario u INNER JOIN parametro p INNER JOIN parametro p2 WHERE u.genero = p.codigo AND u.cargo = p2.codigo";
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
    public function editarUsuario(int $id)
    {
        // $sql = "SELECT u.*, e.nombre AS estacionamiento FROM usuario u INNER JOIN estacionamiento e WHERE e.id = u.id_estacionamiento AND u.id = $id";
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarUsuario(string $usuario, string $nombre, string $genero, string $cargo, string $fecha, int $usuario_interaccion, int $id)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->cargo = $cargo;
        $this->fecha = $fecha;
        $this->id = $id;
        $this->usuario_interaccion = $_SESSION['id_usuario'];

        $sql = "UPDATE usuario SET usuario = ?, nombre = ?, genero = ?, cargo = ?, fecha_modificacion = ?, usuario_modificacion = ? WHERE id = ?";
        $datos = array($this->usuario, $this->nombre, $this->genero, $this->cargo, $this->fecha, $this->usuario_interaccion, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function getPass(string $clave, int $id)
    {
        $sql = "SELECT * FROM usuario WHERE clave = '$clave' AND id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarPass(string $clave, int $id)
    {
        $sql = "UPDATE usuario SET clave = ? WHERE id = ?";
        $datos = array($clave, $id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    public function accionUser(int $estado, int $id)
    {
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE usuario SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
