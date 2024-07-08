<?php
class Configuracion extends Controller{

    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location:". base_url);
        }
        parent::__construct();
    }

    public function index(){
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user,"Configuracion");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this,"permisos");
            exit;
        }
        $data = $this->model->selectConfiguracion();
        $this->views;
    }
}
?>