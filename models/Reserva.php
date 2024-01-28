<?php

    class Reserva{
        private $id;
        private $id_usuario;
        private $id_hotel;
        private $id_habitacion;
        private $fecha_entrada;
        private $fecha_salida;
        
        /**
         * Método constructor
         * 
         * @param type $id
         * @param type $id_usuario
         * @param type $id_hotel
         * @param type $id_habitacion
         * @param type $fecha_entrada
         * @param type $fecha_salida
         */
        public function __construct($id, $id_usuario, $id_hotel, $id_habitacion, $fecha_entrada, $fecha_salida) {
            $this->id = $id;
            $this->id_usuario = $id_usuario;
            $this->id_hotel = $id_hotel;
            $this->id_habitacion = $id_habitacion;
            $this->fecha_entrada = $fecha_entrada;
            $this->fecha_salida = $fecha_salida;
        }
        
        //GETTERS Y SETTERS
        public function getId() {
            return $this->id;
        }

        public function getId_usuario() {
            return $this->id_usuario;
        }

        public function getId_hotel() {
            return $this->id_hotel;
        }

        public function getId_habitacion() {
            return $this->id_habitacion;
        }

        public function getFecha_entrada() {
            return $this->fecha_entrada;
        }

        public function getFecha_salida() {
            return $this->fecha_salida;
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setId_usuario($id_usuario): void {
            $this->id_usuario = $id_usuario;
        }

        public function setId_hotel($id_hotel): void {
            $this->id_hotel = $id_hotel;
        }

        public function setId_habitacion($id_habitacion): void {
            $this->id_habitacion = $id_habitacion;
        }

        public function setFecha_entrada($fecha_entrada): void {
            $this->fecha_entrada = $fecha_entrada;
        }

        public function setFecha_salida($fecha_salida): void {
            $this->fecha_salida = $fecha_salida;
        }



    }

