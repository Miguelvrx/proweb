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
}

?>