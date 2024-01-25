<?php


    class ReservaModel{        
        private $bd;
        private $pdo;

        public function __construct() {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        }
        
        public function getReservas($id_hotel){
            $sql = "SELECT * FROM reservas WHERE id_hotel = ?;";
            $reservas = $this->pdo->prepare($sql);
            $reservas->execute(array($id_hotel));
            return $todasReservas = $reservas->fetchAll();
        }
        
        public function reservaUser() {
            $sql = "SELECT * FROM reservas WHERE id_usuario = ?;";
            $reservas = $this->pdo->prepare($sql);
            $reservas->execute(array($_SESSION['id']));
            return $todasReservas = $reservas->fetchAll();

        }
        
    }

