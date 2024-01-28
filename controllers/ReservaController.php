<?php

    class ReservaController{
        private $model;
        private $view;

        /**
         * Constructor de la clase ReservaController.
         * Inicializa las instancias del modelo (ReservaModel) y la vista (ReservaView).
         */
        public function __construct() {
            $this->model = new ReservaModel();
            $this->view = new ReservaView();
        }

        /**
         * Función para mostrar los detalles de las reservas (visible solo para el admin).
         * Recupera las reservas de un hotel y las muestra utilizando la vista correspondiente.
         */
        public function detallesReservas() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }

            // Recupera el ID del hotel desde el formulario
            $id_hotel = $_POST['id_hotel'];

            // Obtiene las reservas del hotel
            $reservas = $this->model->getReservas($id_hotel);

            $nuevasReservas = array();

            // Transforma los datos de las reservas en objetos Reserva
            foreach ($reservas as $reserva) {
                $reserva = new Reserva( $reserva['id'], $reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);

                array_push($nuevasReservas, $reserva);
            }

            // Muestra las reservas utilizando la vista correspondiente
            $this->view->mostrarReservas($nuevasReservas);
        }

        /**
         * Función para mostrar las reservas realizadas por un usuario.
         * Obtiene las reservas del usuario actual y las muestra utilizando la vista correspondiente.
         */
        public function usuarioReservas() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }

            // Obtiene las reservas del usuario
            $reservas = $this->model->reservaUser();

            $usuarioReservas = array();

            // Transforma los datos de las reservas en objetos Reserva
            foreach ($reservas as $reserva) {
                $reserva = new Reserva( $reserva['id'], $reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);

                array_push($usuarioReservas, $reserva);
            }

            // Muestra las reservas del usuario utilizando la vista correspondiente
            $this->view->userReservas($usuarioReservas);
        }

        /**
         * Función para comprobar y realizar una nueva reserva.
         * Comprueba la disponibilidad de una habitación en un hotel para las fechas seleccionadas
         * y realiza la reserva si es posible, redirigiendo al usuario según el resultado.
         */
        public function comprobarReserva() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }

            // Recupera los datos del formulario
            $id_habitacion = $_POST['id_habitacion'];
            $id_hotel = $_POST['id_hotel'];
            $fecha_entrada = $_POST['fecha_entrada'];
            $fecha_salida = $_POST['fecha_salida'];

            // Comprueba la disponibilidad de la habitación en las fechas seleccionadas
            $comprobarReserva = $this->model->comprobarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida);

            if ($comprobarReserva) {
                // Si las fechas son válidas, realiza la reserva
                if ($fecha_entrada > $fecha_salida) {
                    header('Location: index.php?controller=Reserva&action=usuarioReservas&error=2');
                } else {
                    $insertarReserva = $this->model->insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida);
                }
            } else {
                // Si no está disponible, redirige con un mensaje de error
                header('Location: index.php?controller=Reserva&action=usuarioReservas&error');
            }
        }

        /**
         * Función para mostrar los detalles de una reserva específica.
         * Recupera los detalles de la reserva y muestra la información utilizando la vista correspondiente.
         */
        public function reservaEspecifica() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }

            // Recupera el ID de la reserva desde el formulario
            $id_reserva = $_POST['id_reserva'];

            // Obtiene los detalles de la reserva
            $detallesReservas = $this->model->detallesReservas($id_reserva);

            // Muestra los detalles de la reserva utilizando la vista correspondiente
            $this->view->mostrarDetallesReser($detallesReservas);
        }
    }
?>

    

