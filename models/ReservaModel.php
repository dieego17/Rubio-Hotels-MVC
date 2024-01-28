<?php

    class ReservaModel
    {
        private $bd;
        private $pdo;

        public function __construct()
        {
            try {
                $this->bd = new DB();
                $this->pdo = $this->bd->getPDO();
            } catch (Exception $e) {
                echo "Error initializing ReservaModel: " . $e->getMessage();
            }
        }

        public function getReservas($id_hotel)
        {
            try {
                $sql = "SELECT * FROM reservas WHERE id_hotel = ?;";
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array($id_hotel));
                return $todasReservas = $reservas->fetchAll();
            } catch (Exception $e) {
                echo "Error getting reservations: " . $e->getMessage();
            }
        }

        public function reservaUser()
        {
            try {
                $sql = "SELECT * FROM reservas WHERE id_usuario = ?;";
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array($_SESSION['id']));
                return $todasReservas = $reservas->fetchAll();
            } catch (Exception $e) {
                echo "Error getting user reservations: " . $e->getMessage();
            }
        }

        public function comprobarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida)
        {
            try {
                $sql = 'SELECT * FROM reservas WHERE id_habitacion = :id_habitacion AND id_hotel = :id_hotel AND '
                        . '(:fecha_entrada BETWEEN fecha_entrada AND fecha_salida OR :fecha_salida BETWEEN fecha_entrada AND fecha_salida);';
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array('id_hotel' => $id_hotel, 'id_usuario' => $_SESSION['id'] , 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));

                // Obtener el resultado del conteo directamente
                $count = $reservas->fetchColumn();

                // Verificar si el resultado del conteo es igual a 0
                return $count === 0;
            } catch (Exception $e) {
                echo "Error checking reservation: " . $e->getMessage();
            }
        }


        public function insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida)
        {
            try {
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
            } catch (Exception $e) {
                echo "Error inserting reservation: " . $e->getMessage();
            }
        }

        public function detallesReservas($id_reserva)
        {
            try {
                $sql = 'SELECT * FROM reservas r JOIN hoteles h ON r.id_habitacion = h.id JOIN habitaciones ha ON r.id_habitacion = ha.id WHERE r.id = :id_reserva';
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array('id_reserva' => $id_reserva));

                while ($row = $reservas->fetch(PDO::FETCH_ASSOC)) {

                    $reserva = new Reserva($row['id'], $row['id_usuario'], $row['id_hotel'], $row['id_habitacion'], $row['fecha_entrada'], $row['fecha_salida']);
                    $hotel = new Hotel($row['id_hotel'], $row['nombre'], $row['direccion'], $row['ciudad'], $row['pais'], $row['num_habitaciones'], $row['descripcion'], $row['foto']);
                    $habitacion = new Habitacion($row['id_habitacion'], $row['id_hotel'], $row['num_habitacion'], $row['tipo'], $row['precio'], $row['descripcion']);
                }

                return array("reserva" => $reserva, "hotel" => $hotel, "habitacion" => $habitacion);
            } catch (Exception $e) {
                echo "Error getting reservation details: " . $e->getMessage();
            }
        }
    }
?>