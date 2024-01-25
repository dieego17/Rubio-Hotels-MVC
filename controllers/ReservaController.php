<?php

    class ReservaController{
        private $model;
        private $view;
        
        public function __construct() {
            $this->model = new ReservaModel();
            $this->view = new ReservaView();
        }
        
        public function detallesReservas(){
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }


            $id_hotel = $_POST['id_hotel'];
            $reservas = $this->model->getReservas($id_hotel);

            $nuevasReservas = array();
            
            foreach ($reservas as $reserva) {
                $reserva = new Reserva($reserva['id'], $reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);
                
                array_push($nuevasReservas, $reserva);
            }
            
            $this->view->mostrarReservas($nuevasReservas);
        }
        
        public function usuarioReservas() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }
            
            $reservas = $this->model->reservaUser();
            
            $usuarioReservas = array();
            
            foreach ($reservas as $reserva) {
                $reserva = new Reserva($reserva['id'], $reserva['id_usuario'], $reserva['id_hotel'], $reserva['id_habitacion'], $reserva['fecha_entrada'], $reserva['fecha_salida']);
                
                array_push($usuarioReservas, $reserva);
            }
            
            $this->view->userReservas($usuarioReservas);
            
            
        }
        
        
        
    }
    

