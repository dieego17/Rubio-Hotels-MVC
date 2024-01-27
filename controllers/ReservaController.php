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
        
        public function comprobarReserva() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }
            
            $id_habitacion = $_POST['id_habitacion'];
            $id_hotel = $_POST['id_hotel'];
            $fecha_entrada = $_POST['fecha_entrada'];
            $fecha_salida = $_POST['fecha_salida'];
            
            $comprobarReserva = $this->model->comprobarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida);
            
            if($comprobarReserva){
                echo "se puede hacer una reserva";
                $insertarReserva = $this->model->insertarReserva($id_habitacion, $id_hotel, $fecha_entrada, $fecha_salida);
                
                header('Location : index.php?controller=Habitacion&action=detallesHabitacion');
            }else{
                echo "no se puede reservar, ya existe una reserva";
            }
            
            
        }
        
        public function reservaEspecifica(){
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }
            
            $id_reserva = $_POST['id_reserva'];
            
            $detallesReservas = $this->model->detallesReservas($id_reserva);

            $this->view->mostrarDetallesReser($detallesReservas);
            
        }
        
        
    }
    

