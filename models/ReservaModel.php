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
        
        public function comprobarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida) {
            $sql = "SELECT * FROM reservas WHERE id_habitacion = :id_habitacion AND id_hotel = :id_hotel AND (:fecha_entrada BETWEEN fecha_entrada AND fecha_salida OR :fecha_salida BETWEEN fecha_entrada AND fecha_salida);";
            $reservas = $this->pdo->prepare($sql);
            $reservas->execute(array('id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));
            return $reservas->rowCount() === 0;
        }
        
        public function insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida) {
            
            // Obtener el máximo ID de la tabla reservas
            $sqlMaxID = "SELECT MAX(id) 'idMax' FROM reservas";
            $MaxID = $this->pdo->prepare($sqlMaxID);
            $MaxID->execute();
            $maxIDResult = $MaxID->fetch(PDO::FETCH_ASSOC);
            $nuevoID = $maxIDResult['idMax'] + 1;
            
            //INSERT de la nueva reserva
            $sql = "INSERT INTO reservas (id, id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) "
                    . "VALUES(:id, :id_usuario, :id_hotel, :id_habitacion, :fecha_entrada, :fecha_salida);";
            $insertReserva = $this->pdo->prepare($sql);
            $insertReserva->execute(array('id' => $nuevoID, 'id_usuario' => $_SESSION['id'], 'id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));
            return $reservaRealizada = $insertReserva->fetchAll();
        }
        
    }

