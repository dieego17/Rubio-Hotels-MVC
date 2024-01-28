<?php

    /**
     * Clase HabitacionController que gestiona las acciones relacionadas con las habitaciones.
     */
    class HabitacionController{
        private $model;
        private $view;

        /**
         * Constructor de la clase HabitacionController.
         * Inicializa las instancias del modelo (HabitacionModel) y la vista (HabitacionView).
         */
        public function __construct() {
            $this->model = new HabitacionModel();
            $this->view = new HabitacionView();
        }

        /**
         * Acción para mostrar los detalles de las habitaciones de un hotel.
         * Comprueba la sesión del usuario y redirige si no está autenticado.
         * Obtiene las habitaciones del modelo, crea instancias de la clase Habitacion y las muestra usando la vista.
         */
        public function detallesHabitacion() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }

            $id_hotel = $_POST['id'];
            $habitaciones = $this->model->getHabitacion($id_hotel);

            $nuevasHabitaciones = array();

            foreach ($habitaciones as $habitacion) {
                $nuevaHabi = new Habitacion($habitacion['id'], $habitacion['id_hotel'], $habitacion['num_habitacion'], $habitacion['tipo'], $habitacion['precio'], $habitacion['descripcion']);

                array_push($nuevasHabitaciones, $nuevaHabi);
            }

            $this->view->mostrarHabitacion($nuevasHabitaciones);
        }
    }

