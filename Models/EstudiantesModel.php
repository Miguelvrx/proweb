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

}
?>