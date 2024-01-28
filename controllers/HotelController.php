<?php

    /**
     * Clase HotelController encargada de gestionar las operaciones relacionadas con los hoteles.
     */
    class HotelController
    {
        private $model;
        private $view;

        /**
         * Constructor de la clase HotelController.
         * Inicializa las instancias del modelo (HotelModel) y la vista (HotelView).
         */
        public function __construct(){
            $this->model = new HotelModel();
            $this->view = new HotelView();
        }

        /**
         * Método para mostrar la vista con el diseño que presenta todos los datos de los hoteles.
         * Llama al modelo para recuperar todos los datos de los hoteles.
         */
        public function mostrarHoteles(){
            session_start();
            if (!$_SESSION['nombre']) {
                header('Location: ./index.php');
            }

            // Obtener detalles de los hoteles desde el modelo
            $hoteles = $this->model->detallesHoteles();

            $nuevosHoteles = array();

            // Crear objetos Hotel a partir de los datos obtenidos
            foreach ($hoteles as $hotel) {
                $nuevoHotel = new Hotel($hotel['id'], $hotel['nombre'], $hotel['direccion'], $hotel['ciudad'], $hotel['pais'], $hotel['num_habitaciones'], $hotel['descripcion'], $hotel['foto']);
                array_push($nuevosHoteles, $nuevoHotel);
            }

            // Mostrar la vista con los datos de los hoteles
            $this->view->mostrarHoteles($nuevosHoteles);
        }
    }
?>

