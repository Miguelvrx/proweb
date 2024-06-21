<?php
// Registramos una función de autocarga utilizando spl_autoload_register
spl_autoload_register(function($class){
    
    // Construimos la ruta del archivo donde se espera que esté definida la clase
    $file = "Config/App/" . $class . ".php";
    
    // Comprobamos si el archivo existe el php
    if (file_exists($file)) {
        
        // Si el archivo existe, lo incluimos una sola vez
        require_once $file;
    }
});
?>
