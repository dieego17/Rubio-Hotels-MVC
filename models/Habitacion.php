<?php

    class Habitacion{
        private $id;
        private $id_hotel;
        private $num_habitacion;
        private $tipo;
        private $precio;
        private $descripcion;
        
        /**
         * Método constructor
         * 
         * @param type $id
         * @param type $id_hotel
         * @param type $num_habitacion
         * @param type $tipo
         * @param type $precio
         * @param type $descripcion
         */
        public function __construct($id, $id_hotel, $num_habitacion, $tipo, $precio, $descripcion) {
            $this->id = $id;
            $this->id_hotel = $id_hotel;
            $this->num_habitacion = $num_habitacion;
            $this->tipo = $tipo;
            $this->precio = $precio;
            $this->descripcion = $descripcion;
        }
        
        //GETTERS Y SETTERS
        
        public function getId() {
            return $this->id;
        }

        public function getId_hotel() {
            return $this->id_hotel;
        }

        public function getNum_habitacion() {
            return $this->num_habitacion;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setId_hotel($id_hotel): void {
            $this->id_hotel = $id_hotel;
        }

        public function setNum_habitacion($num_habitacion): void {
            $this->num_habitacion = $num_habitacion;
        }

        public function setTipo($tipo): void {
            $this->tipo = $tipo;
        }

        public function setPrecio($precio): void {
            $this->precio = $precio;
        }

        public function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }



    }

