<?php
class UsuariosModel extends Query{
    private $usuario, $nombre, $clave, $genero, $cargo, $id, $estado, $fecha;
    public function __construct(){
        parent::__construct();
    }
    public function getUsuario(string $usuario, string $clave){
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
        $data = $this->select($sql);
        return $data;
    }
    public function getGeneros(){
        $sql = "SELECT * FROM parametro WHERE grupo = 'Genero'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getCargos(){
        $sql = "SELECT * FROM parametro WHERE grupo = 'Cargo'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getUsuarios(){
        $sql = "SELECT u.*, p.nombre as genero, p2.nombre as cargo FROM usuario u INNER JOIN parametro p INNER JOIN parametro p2 WHERE u.genero = p.codigo AND u.cargo = p2.codigo";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function registrarUsuario(string $usuario, string $nombre, string $clave, string $genero, string $cargo, string $fecha){
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->genero = $genero;
        $this->cargo = $cargo;
        $this->fecha = $fecha;
        $verificar = "SELECT * FROM usuario WHERE usuario = '$this->usuario'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $sql = "INSERT INTO usuario(usuario, nombre, clave, genero, cargo, fecha_creacion) VALUES (?,?,?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->genero, $this->cargo, $this->fecha);
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
    public function editarUsuario(int $id){
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    public function modificarUsuario(string $usuario, string $nombre, string $genero, string $cargo, string $fecha, int $id){
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->cargo = $cargo;
        $this->fecha = $fecha;
        $this->id = $id;
        
        $sql = "UPDATE usuario SET usuario = ?, nombre = ?, genero = ?, cargo = ? , fecha_modificacion = ? WHERE id = ?";
        $datos = array($this->usuario, $this->nombre, $this->genero, $this->cargo, $this->fecha, $this->id);
        $data = $this->save($sql, $datos);
        if($data == 1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        
        return $res;
    }
    public function accionUser(int $estado, int $id){
        $this->id = $id;
        $this->estado = $estado;
        $sql = "UPDATE usuario SET estado = ? WHERE id = ?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }
}
?>