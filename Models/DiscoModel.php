<?php
class DiscoModel extends Query {
    public function __construct() {
        parent::__construct();
    }

    public function getDiscos() {
        $sql = "SELECT * FROM disco";
        $res = $this->selectAll($sql);
        return $res;
    }

    public function insertarDisco($titulo, $artista, $genero, $anio_lanzamiento, $precio, $cantidad) {
        $verificar = "SELECT * FROM disco WHERE titulo = '$titulo'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $query = "INSERT INTO disco(titulo, artista, genero, anio_lanzamiento, precio, cantidad) VALUES (?, ?, ?, ?, ?, ?)";
            $datos = array($titulo, $artista, $genero, $anio_lanzamiento, $precio, $cantidad);
            $data = $this->save($query, $datos);
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

    public function editDisco($id) {
        $sql = "SELECT * FROM disco WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

    public function actualizarDisco($titulo, $artista, $genero, $anio_lanzamiento, $precio, $cantidad, $id) {
        $query = "UPDATE disco SET titulo = ?, artista = ?, genero = ?, anio_lanzamiento = ?, precio = ?, cantidad = ? WHERE id = ?";
        $datos = array($titulo, $artista, $genero, $anio_lanzamiento, $precio, $cantidad, $id);
        $data = $this->save($query, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function estadoDisco($estado, $id) {
        $query = "UPDATE disco SET estado = ? WHERE id = ?";
        $datos = array($estado, $id);
        $data = $this->save($query, $datos);
        return $data;
    }

    public function buscarDisco($valor) {
        $sql = "SELECT id, titulo AS text FROM disco WHERE titulo LIKE '%" . $valor . "%' AND estado = 1 LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function verificarPermisos($id_user, $permiso) {
        $tiene = false;
        $sql = "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'";
        $existe = $this->select($sql);
        if ($existe != null || $existe != "") {
            $tiene = true;
        }
        return $tiene;
    }
}
?>
