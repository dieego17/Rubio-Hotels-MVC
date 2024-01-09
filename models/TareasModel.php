<?php

    include 'db/DB.php';

    class TareasModel{
        private $bd;
        private $pdo;
        
        
        public function __construct() {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        }
        
        //ver lista de hoteles
        public function getHoteles() {
            //ejecuta una consulta para recuperar todos los hoteles de la tabla hoteles
            $stmt = $this->pdo->prepare('SELECT * FROM hoteles');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //ver lista de habitaciones disponibles
        public function getHabitaciones() {
            //ejecuta una consulta para recuperar todas las habitaciones disponibles
            $stmt = $this->pdo->prepare('SELECT * FROM habitaciones');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>

