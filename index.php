<?php
    // Se incluyen archivos necesarios para la configuración y funciones auxiliaress
    require_once "Config/Config.php";
    require_once "Config/Helpers.php";
    
    // Se obtiene la ruta desde la URL, si no está definida se usa "Home/index" por defecto
    $ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
    
    // Se divide la ruta en partes usando "/" como delimitador
    $array = explode("/", $ruta);
    
    // Se asigna el primer segmento como el controlador
    $controller = $array[0];
    
    // Se define el método por defecto como "index"
    $metodo = "index";
    
    // Se inicializa la variable para los parámetros
    $parametro = "";
    
    // Si existe un segundo segmento en la ruta, se asigna como el método
    if (!empty($array[1])) {
        if (!empty($array[1] != "")) {
            $metodo = $array[1];
        }
    }
    
    // Si existe un tercer segmento en la ruta, se toma como parámetro
    if (!empty($array[2])) {
        if (!empty($array[2] != "")) {
            // Se concatenan todos los segmentos a partir del tercero como parámetros, separados por comas
            for ($i=2; $i < count($array); $i++) { 
                $parametro .= $array[$i] . ",";
            }
            // Se elimina la coma al final de la cadena de parámetros
            $parametro = trim($parametro, ",");
        }
    }
    
    // Se incluye el archivo de autoload para cargar las clases automáticamente
    require_once "Config/App/Autoload.php";
    
    // Se construye la ruta del archivo del controlador
    $dirControllers = "Controllers/" . $controller . ".php";
    
    // Se verifica si el archivo del controlador existe
    if (file_exists($dirControllers)) {
        // Se incluye el archivo del controlador
        require_once $dirControllers;
        // Se instancia el controlador
        $controller = new $controller();
        // Se verifica si el método existe en el controlador
        if (method_exists($controller, $metodo)) {
            // Se llama al método del controlador, pasando los parámetros si existen
            $controller->$metodo($parametro);
        } else {
            // Si el método no existe, se redirige a una página de error
            header('Location:' . base_url . 'Configuracion/Error');
        }
    } else {
        // Si el archivo del controlador no existe, se redirige a una página de error
        header('Location:' . base_url . 'Configuracion/Error');
    }
?>
