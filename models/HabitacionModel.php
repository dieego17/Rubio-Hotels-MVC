<?php

    class HabitacionModel
    {
        private $bd;
        private $pdo;

        public function __construct()
        {
            try {
                $this->bd = new DB();
                $this->pdo = $this->bd->getPDO();
            } catch (Exception $e) {
                echo "Error initializing HabitacionModel: " . $e->getMessage();
            }
        }

        public function getHabitacion($id_hotel)
        {
            try {
                $sql = "SELECT * FROM habitaciones ha JOIN hoteles h ON ha.id_hotel = h.id WHERE id_hotel = :id_hotel;";
                $habitaciones = $this->pdo->prepare($sql);
                $habitaciones->execute(array('id_hotel' => $id_hotel));
                return $todasHabitaciones = $habitaciones->fetchAll();
            } catch (Exception $e) {
                echo "Error getting hotel rooms: " . $e->getMessage();
            }
        }
    }
?>

