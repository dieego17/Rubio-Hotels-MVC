<?php

    /**
     * Clase DB que maneja la conexión a la base de datos mediante PDO.
     */
    class DB{
        private $pdo;

        /**
         * Constructor de la clase DB.
         * Intenta establecer la conexión con la base de datos usando la configuración proporcionada en Config.php.
         * En caso de error, redirige a una página de error de mantenimiento.
         */
        public function __construct() {
            require_once 'config/Config.php';
            try {
                // Creamos una instancia de PDO para conectarnos a la base de datos
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pwd);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (Exception $ex) {
                // En caso de error, redirigir a una página de error de mantenimiento
                header('Location: ./views/errorMantenimiento.php');
                exit;
            }
        }

        /**
         * Obtiene la instancia de PDO utilizada para la conexión a la base de datos.
         * 
         * @return PDO - Instancia de PDO.
         */
        public function getPDO() {
            return $this->pdo;
        }

    }
?>


