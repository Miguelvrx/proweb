<?php
class EstudianteModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getEstudiantes(){
        $sql = "SELECT * FROM estudiantes";
        $res = $this->selectAll($sql);
        return $res;
    }

    public function actualizarEstudiante($codigo, $dni, $nombre, $carrera, $direccion, $telefono, $id)
    {
        $query = "UPDATE estudiante SET codigo = ?, dni = ?, nombre = ?, carrera = ?, direccion = ?, telefono = ?  WHERE id = ?";
        $datos = array($codigo, $dni, $nombre, $carrera, $direccion, $telefono, $id);
        $data = $this->save($query, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function estadoEstudiante($estado, $id)
    {
        $query = "UPDATE estudiante SET estado = ? WHERE id = ?";
        $datos = array($estado, $id);
        $data = $this->save($query, $datos);
        return $data;
    }
    public function buscarEstudiante($valor)
    {
        $sql = "SELECT id, codigo, nombre AS text FROM estudiante WHERE codigo LIKE '%" . $valor . "%' AND estado = 1 OR nombre LIKE '%" . $valor . "%'  AND estado = 1 LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function verificarPermisos($id_user, $permiso)
    {
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