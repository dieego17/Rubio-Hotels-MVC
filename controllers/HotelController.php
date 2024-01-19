<?php

    class HotelController{
        private $model;
        private $view;
        
        public function __construct() {
            $this->model = new HotelModel();
            $this->view = new HotelView();
        }
        
        //llamo a la vista para mostrar el diseño todos los datos de los hoteles
        //llamo a la consulta para recuperar todos los datos de los hoteles
        function mostrarHoteles() {
            $hoteles = $this->model->detallesHoteles();
            
            $nuevosHoteles = array();
            foreach ($hoteles as $hotel) {
                $nuevosHotel = new Hotel($hotel['id'], $hotel['nombre'], $hotel['direccion'], $hotel['ciudad'], $hotel['pais'], $hotel['num_habitaciones'], $hotel['descripcion'], $hotel['foto']);
            
                array_push($nuevosHoteles, $nuevosHotel);
            }
            
            
            $this->view->mostrarHoteles($nuevosHoteles);
            
        }
    }

