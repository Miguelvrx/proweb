<?php
class Controller{
    protected $views, $model;

    // Constructor de la clase
    public function __construct()
    {
        // Inicializa una instancia de la clase Views
        $this->views = new Views();
        
        // Carga el modelo correspondiente al controlador
        $this->cargarModel();
    }

    // Método para cargar el modelo
    public function cargarModel()
    {
        // Obtiene el nombre del modelo basado en el nombre de la clase del controlador
        $model = get_class($this)."Model";
        
        // Define la ruta del archivo del modelo
        $ruta = "Models/".$model.".php";
        
        // Verifica si el archivo del modelo existe
        if (file_exists($ruta)) {
            // Incluye el archivo del modelo
            require_once $ruta;
            
            // Crea una instancia del modelo
            $this->model = new $model();
        }
    }
}
?>  
