<?php
// Definición de una clase para manejar la conexión a la base de datos
class Conexion {
    // Propiedad privada que almacenará el objeto de conexión PDO
    private $conect;

    // Constructor de la clase
    public function __construct() {
        // Creación del DSN (Data Source Name) para la conexión PDO a la base de datos MySQL
        $pdo = "mysql:host=".host.";dbname=".db.";.charset.";

        // Intento de conexión a la base de datos dentro de un bloque try-catch
        try {
            // Creación de una nueva instancia de PDO utilizando el DSN, el usuario y la contraseña
            $this->conect = new PDO($pdo, user, pass);
            // Establecer el modo de error de PDO a excepción, para lanzar errores como excepciones
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Captura de cualquier excepción que ocurra durante la conexión y muestra un mensaje de error
            echo "Error en la conexion: " . $e->getMessage();
        }
    }

    // Método público que retorna el objeto de conexión PDO
    public function conect() {
        return $this->conect;
    }
}
?>
