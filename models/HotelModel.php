<?php


    class HotelModel{
        private $bd;
        private $pdo;

        public function __construct() {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        }
        
        public function mostrarHoteles() {
            $hoteles = $this->pdo->prepare('SELECT * FROM hoteles');
            $hoteles->execute();
            return $hoteles->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }

