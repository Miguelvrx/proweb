<?php
class Views{

    public function getView($controlador, $vista, $data="")
    {
        // Obtiene el nombre de la clase del controlador pasado como parámetro
        $controlador = get_class($controlador);

        // Verifica si el controlador es "Home"
        if ($controlador == "Home") {
            // Si es "Home", la vista se encuentra en la carpeta Views con el nombre dado
            $vista = "Views/".$vista.".php";
        }else{
            // Si no es "Home", la vista se encuentra en una subcarpeta del controlador dentro de Views
            $vista = "Views/".$controlador."/".$vista.".php";
        }

        // Requiere el archivo de la vista para ser mostrado
        require $vista;
    }
}

?>
