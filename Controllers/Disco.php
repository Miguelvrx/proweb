<?php
class Disco extends Controller {
    public function __construct() {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }
        parent::__construct();
        $id_user = $_SESSION['id_usuario'];
        $perm = $this->model->verificarPermisos($id_user, "Disco");
        if (!$perm && $id_user != 1) {
            $this->views->getView($this, "permisos");
            exit;
        }
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function listar() {
        $data = $this->model->getDiscos();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['estado'] == 1) {
                $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarDisco(' . $data[$i]['id'] . ');"><i class="fa fa-pencil-square-o"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarDisco(' . $data[$i]['id'] . ');"><i class="fa fa-trash-o"></i></button>
                <div/>';
            } else {
                $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarDisco(' . $data[$i]['id'] . ');"><i class="fa fa-reply-all"></i></button>
                <div/>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar() {
        $titulo = strClean($_POST['titulo']);
        $artista = strClean($_POST['artista']);
        $genero = strClean($_POST['genero']);
        $anio_lanzamiento = strClean($_POST['anio_lanzamiento']);
        $precio = strClean($_POST['precio']);
        $cantidad = strClean($_POST['cantidad']);
        $id = strClean($_POST['id']);

        if (empty($titulo) || empty($artista) || empty($genero) || empty($anio_lanzamiento) || empty($precio) || empty($cantidad)) {
            $msg = array('msg' => '¡Todos los campos son obligatorios!', 'icono' => 'warning');
        } else {
            if ($id == "") {
                $data = $this->model->insertarDisco($titulo, $artista, $genero, $anio_lanzamiento, $precio, $cantidad);
                if ($data == "ok") {
                    $msg = array('msg' => '¡Disco registrado exitosamente!', 'icono' => 'success');
                } else if ($data == "existe") {
                    $msg = array('msg' => 'Este disco ya existe!', 'icono' => 'warning');
                } else {
                    $msg = array('msg' => 'Error al registrar el disco!', 'icono' => 'error');
                }
            } else {
                $data = $this->model->actualizarDisco($titulo, $artista, $genero, $anio_lanzamiento, $precio, $cantidad, $id);
                if ($data == "modificado") {
                    $msg = array('msg' => '¡Disco actualizado exitosamente!', 'icono' => 'success');
                } else {
                    $msg = array('msg' => 'Error al actualizar el disco!', 'icono' => 'error');
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id) {
        $data = $this->model->editDisco($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($id) {
        $data = $this->model->estadoDisco(0, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Disco dado de baja!', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al dar de baja el disco!', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar($id) {
        $data = $this->model->estadoDisco(1, $id);
        if ($data == 1) {
            $msg = array('msg' => 'Disco reingresado correctamente!', 'icono' => 'success');
        } else {
            $msg = array('msg' => 'Error al reingresar el disco!', 'icono' => 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function buscarDisco() {
        if (isset($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarDisco($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
}
?>
