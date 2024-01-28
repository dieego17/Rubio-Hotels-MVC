<?php

    /**
     * Clase ReservaModel que gestiona las operaciones relacionadas con las reservas.
     */
    class ReservaModel
    {
        private $bd;
        private $pdo;

        /**
         * Constructor de la clase ReservaModel.
         * Inicializa la instancia de la base de datos y el objeto PDO.
         */
        public function __construct(){
            try {
                $this->bd = new DB();
                $this->pdo = $this->bd->getPDO();
            } catch (Exception $e) {
                echo "Error para inicializar la ReservaModel: " . $e->getMessage();
            }
        }

        /**
         * Obtiene todas las reservas sin filtrar por hotel.
         * @param int $id_hotel - Identificador del hotel (no se utiliza en la consulta actual).
         * @return array - Arreglo asociativo con todas las reservas.
         */
        public function getReservas($id_hotel){
            try {
                $sql = "SELECT * FROM reservas;";
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute();
                return $todasReservas = $reservas->fetchAll();
            } catch (Exception $e) {
                echo "Error para conseguir las reservas: " . $e->getMessage();
            }
        }

        /**
         * Obtiene las reservas realizadas por un usuario específico.
         * @return array - Arreglo asociativo con todas las reservas del usuario actual.
         */
        public function reservaUser(){
            try {
                $sql = "SELECT * FROM reservas WHERE id_usuario = :id_usuario;";
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array('id_usuario' => $_SESSION['id']));
                return $todasReservas = $reservas->fetchAll();
            } catch (Exception $e) {
                echo "Error para conseguir la reserva de un usuario: " . $e->getMessage();
            }
        }

        /**
         * Comprueba si hay disponibilidad para realizar una reserva en una habitación y fechas específicas.
         * @param int $id_habitacion - Identificador de la habitación.
         * @param int $id_hotel - Identificador del hotel.
         * @param string $fecha_entrada - Fecha de entrada de la reserva.
         * @param string $fecha_salida - Fecha de salida de la reserva.
         * @return bool - Devuelve true si hay disponibilidad, false si no hay disponibilidad.
         */
        public function comprobarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida){
            try {
                $sql = 'SELECT COUNT(*) FROM reservas WHERE id_hotel = :id_hotel AND id_habitacion = :id_habitacion AND NOT (fecha_entrada >= :fecha_salida OR fecha_salida <= :fecha_entrada);';
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array('id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));

                $reserva = $reservas->fetchColumn();

                if ($reserva > 0) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                echo "Error para comprobar la reserva: " . $e->getMessage();
            }
        }

        /**
         * Inserta una nueva reserva en la base de datos.
         * @param int $id_habitacion - Identificador de la habitación.
         * @param int $id_hotel - Identificador del hotel.
         * @param string $fecha_entrada - Fecha de entrada de la reserva.
         * @param string $fecha_salida - Fecha de salida de la reserva.
         */
        public function insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida){
            try {
                // Obtener el máximo ID de la tabla reservas
                $sqlMaxID = "SELECT MAX(id) 'idMax' FROM reservas";
                $MaxID = $this->pdo->prepare($sqlMaxID);
                $MaxID->execute();
                $maxIDResult = $MaxID->fetch(PDO::FETCH_ASSOC);
                $nuevoID = $maxIDResult['idMax'] + 1;

                // INSERT de la nueva reserva
                $sql = "INSERT INTO reservas (id, id_usuario, id_hotel, id_habitacion, fecha_entrada, fecha_salida) "
                    . "VALUES(:id, :id_usuario, :id_hotel, :id_habitacion, :fecha_entrada, :fecha_salida);";
                $insertReserva = $this->pdo->prepare($sql);
                $insertReserva->execute(array('id' => $nuevoID, 'id_usuario' => $_SESSION['id'], 'id_hotel' => $id_hotel, 'id_habitacion' => $id_habitacion, 'fecha_entrada' => $fecha_entrada, 'fecha_salida' => $fecha_salida));

                header('Location: index.php?controller=Reserva&action=usuarioReservas&success');
            } catch (Exception $e) {
                echo "Error al insertar una reserva: " . $e->getMessage();
            }
        }

        /**
         * Obtiene los detalles de una reserva específica, incluyendo información del hotel y la habitación asociados.
         * @param int $id_reserva - Identificador de la reserva.
         * @return array - Arreglo asociativo con objetos Reserva, Hotel y Habitacion.
         */
        public function detallesReservas($id_reserva){
            try {
                $sql = 'SELECT * FROM reservas r JOIN hoteles h ON r.id_hotel = h.id JOIN habitaciones ha ON r.id_habitacion = ha.id WHERE r.id = :id_reserva';
                $reservas = $this->pdo->prepare($sql);
                $reservas->execute(array('id_reserva' => $id_reserva));

                while ($row = $reservas->fetch(PDO::FETCH_ASSOC)) {

                    $reserva = new Reserva($row['id'], $row['id_usuario'], $row['id_hotel'], $row['id_habitacion'], $row['fecha_entrada'], $row['fecha_salida']);
                    $hotel = new Hotel($row['id_hotel'], $row['nombre'], $row['direccion'], $row['ciudad'], $row['pais'], $row['num_habitaciones'], $row['descripcion'], $row['foto']);
                    $habitacion = new Habitacion($row['id_habitacion'], $row['id_hotel'], $row['num_habitacion'], $row['tipo'], $row['precio'], $row['descripcion']);
                }

                return array("reserva" => $reserva, "hotel" => $hotel, "habitacion" => $habitacion);
            } catch (Exception $e) {
                echo "Error para conseguir los detalles de la reserva: " . $e->getMessage();
            }
        }
    }
?>
