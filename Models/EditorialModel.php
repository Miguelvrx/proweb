<?php
class EditorialModel extends Query{

    public function __construct()
    {
        parent::__construct();
    }

    public function getEditorial()
    {
        $sql = "SELECT * FROM editorial";
        $res = $this->selectAll($sql);
        return $res;
    }

    public function insertarEditorial($editorial){
        $verificar = "SELECT * FROM editorial WHERE editorial = '$editorial' ";
        $existe = $this->select($verificar);
        if (empty($existe)) {
            $query = "INSERT INTO editorial(editorial) VALUES (?)";
            $datos = array($editorial);
            $data = $this->save($query, $datos);
            if ($data == 1) {
                $res = "ok";
            }else{
                $res = "error";
            }

        }else{
            $res = "existe";
        }
        return $res;
    }

    public function editEditorial($id){
        $sql = "SELECT * FROM editorial WHERE id = '$id'";
        $res = $this->select($sql);
        return $res;
    }
    
    
}

?>