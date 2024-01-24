<?php

    class HabitacionController{
        private $model;
        private $view;
        
        public function __construct() {
            $this->model = new HabitacionModel();
            $this->view = new HabitacionView();
        }
        
        public function detallesHabitacion() {
            
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

