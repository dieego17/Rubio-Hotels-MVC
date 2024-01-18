<?php

    class Habitacion{
        private $id;
        private $id_hotel;
        private $num_habitaciones;
        private $tipo;
        private $precio;
        private $descripcion;
        
        public function __construct($id, $id_hotel, $num_habitaciones, $tipo, $precio, $descripcion) {
            $this->id = $id;
            $this->id_hotel = $id_hotel;
            $this->num_habitaciones = $num_habitaciones;
            $this->tipo = $tipo;
            $this->precio = $precio;
            $this->descripcion = $descripcion;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getId_hotel() {
            return $this->id_hotel;
        }

        public function getNum_habitaciones() {
            return $this->num_habitaciones;
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

        public function setNum_habitaciones($num_habitaciones): void {
            $this->num_habitaciones = $num_habitaciones;
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

