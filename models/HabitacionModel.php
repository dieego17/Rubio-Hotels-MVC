<?php

    /**
     * Clase HabitacionModel que maneja la interacción con la base de datos para la información de habitaciones.
     */
    class HabitacionModel {
        private $bd;
        private $pdo;

        /**
         * Constructor de la clase HabitacionModel.
         * Inicializa la conexión con la base de datos.
         */
        public function __construct() {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        }

        /**
         * Obtiene las habitaciones de un hotel específico.
         * 
         * @param int $id_hotel - Identificador del hotel.
         * @return array|false - Devuelve un array con las habitaciones del hotel o false en caso de error.
         */
        public function getHabitacion($id_hotel) {
            try {
                $sql = "SELECT * FROM habitaciones ha JOIN hoteles h ON ha.id_hotel = h.id WHERE id_hotel = :id_hotel;";
                $habitaciones = $this->pdo->prepare($sql);
                $habitaciones->execute(array('id_hotel' => $id_hotel));
                return $todasHabitaciones = $habitaciones->fetchAll();
            } catch (PDOException $e) {
                // Manejar la excepción, registrarla o relanzarla si es necesario
                echo "Error al obtener las habitaciones: " . $e->getMessage();
                return false;
            }
        }
    }
