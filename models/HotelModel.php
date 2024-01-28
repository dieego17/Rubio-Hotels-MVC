<?php

    /**
     * Clase HotelModel que maneja la interacción con la base de datos para la información de hoteles.
     */
    class HotelModel {
        private $bd;
        private $pdo;

        /**
         * Constructor de la clase HotelModel.
         * Inicializa la conexión con la base de datos.
         */
        public function __construct() {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        }

        /**
         * Obtiene los detalles de todos los hoteles.
         * 
         * @return array|false - Devuelve un array asociativo con los detalles de los hoteles o false en caso de error.
         */
        public function detallesHoteles() {
            try {
                $hoteles = $this->pdo->prepare('SELECT * FROM hoteles');
                $hoteles->execute();
                return $hoteles->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar la excepción, registrarla o relanzarla si es necesario
                echo "Error al obtener los detalles de los hoteles: " . $e->getMessage();
                return false;
            }
        }
    }

