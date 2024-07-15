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
}
?>