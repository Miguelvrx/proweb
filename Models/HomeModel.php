<?php
class LibroModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLibros(){
        $sql = "SELECT l.*,m.materia, a.autor, e.ditorial FROM libro 1 INNER JOIN materia m ON l.id_materia =m.id INNER JOIN autor ON l.id_autor = a.id INNER JOIN editorial e ON l.editorial = e.ditorial ";
        $res = $this->selectAll($sql);
        return $res;
    }

    public function insertarLibros($titulo, $id_autor,$id_editorial,$id_materia,$cantidad,$num_pagina,$anio_edicion,$descripcion,$imgNombre){
        $verificar = "SELECT * FROM libros WHERE titulo = '$titulo'";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $query = "INSERT INTO libros(titulo, id_autor,id_editorial, id_materia,cantidad,num_pagina,anio_edicion,descripcion,imagen) VALUES (?,?,?,?,?,?,?,?,?)";
            $datos = array($titulo, $id_autor, $id_editorial,$id_materia,$cantidad,$num_pagina,$anio_edicion,$descripcion,$imgNombre);
            $data = $this->save($query, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }
        }else{
            $res = "existe";
        }

    }

    public function editLibros($id)
    {
        $sql = "SELECT * FROM libro WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }

    function actualizarLibro($titulo, $id_autor, $id_editorial, $id_materia, $cantidad, $num_pagina, $anio_edicion, $descripcion, $imgNombre){
        $query = "UPDATE libro SET titulo = ?, id_autor  = ?,id_editorial  = ?, id_materia  = ?,cantidad  = ?,num_pagina  = ?,anio_edicion  = ?,descripcion  = ?,imagen  = ? WHERE id = ?";
        $datos = array($titulo, $id_autor, $id_editorial, $id_materia, $cantidad, $num_pagina, $anio_edicion, $descripcion, $imgNombre);
        $data = $this->save($query,$datos);
        if ($data == 1) {
            $res = "Modificado";
        } else{
            $res = "error";
        }
        return $res;
    }

    public function buscarLibro($valor){
        $sql = "SELECT id, titulo AS text FROM libro WHERE titulo LIKE '%". $valor . "%' AND estado = LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function VerficarPermisos($id_user, $permiso){
        $tiene = false;
        $sql = "SELECT p.*,d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permisos WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'";
        $existe = $this->selectAll($sql);
        if ($existe != null) {
            $tiene = true;
        }
        return $tiene;
    }

}
?>