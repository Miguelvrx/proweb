<?php
class Editorial extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user, "Editorial");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
    }
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function listar()
    {
        $data = $this->model->getEditorial();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarEdi(' . $data[$i]['id'] . ');"><i class="fa fa-pencil-square-o"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarEdi(' . $data[$i]['id'] . ');"><i class="fa fa-trash-o"></i></button>
                <div/>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarEdi(' . $data[$i]['id'] . ');"><i class="fa fa-reply-all"></i></button>
                <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrar()
    {
        $editorial = strClean($_POST['editorial']);
        $id = strClean($_POST['id']);
        if (empty($editorial)) {
            $msg = array('msg' => '¡El nombre es un campo obligatorio!', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->insertarEditorial($editorial);
                if ($data == "ok") {
                    $msg = array('msg' => 'El editor se ha registrado correctamente!', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'Este editor ya existe!', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => '¡Error al registrar al editor!', 'icono' => 'error');
                }
            } else {
                $data = $this->model->actualizarEditorial($editorial, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => 'El editor cambió correctamente!', 'icono' => 'success');
                } else {
                    $msg = array('msg' => '¡Error al cambiar de editor!', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function editar($id)
    {
        $data = $this->model->editEditorial($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function eliminar($id)
    {
        $data = $this->model->estadoEditorial(0, $id);
        if ($data == 1) {
            $msg = array('msg' => '¡El editor se descargó correctamente!', 'icono' => 'success');
        } else {
            $msg = array('msg' => '¡Error al registrarse en la editorial!', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function reingresar($id)
    {
        $data = $this->model->estadoEditorial(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Editor restaurado correctamente!', 'icono' => 'success');
        } else {
            $msg = array('msg' => '¡Error al restaurar el editor!', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarEditorial()
    {
        if (isset($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarEditorial($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
