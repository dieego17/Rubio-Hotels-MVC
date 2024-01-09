<?php

    class TareasController{
        private $model;
        private $view;
        
        public function __construct() {
            $this->model = new TareasModel();
            $this->view = new TareasView();
        }
        
        public function listarHoteles() {
            $hoteles = $this->model->getHoteles();
            
            $this->view->mostrarHoteles($hoteles);
            
        }
        
        public function listarHabitaciones() {
            $habitaciones = $this->model->getHabitaciones();
           
            $this->view->mostrarHabitaciones($habitaciones);
            
        }

        
    }
?>