<?php

    class Usuario{
        private $id;
        private $nombre;
        private $contraseña;
        private $fecha_registro;
        private $rol;
        
        
        public function __construct($id, $nombre, $contraseña, $fecha_registro, $rol) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->contraseña = $contraseña;
            $this->fecha_registro = $fecha_registro;
            $this->rol = $rol;
        }
        
        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getContraseña() {
            return $this->contraseña;
        }

        public function getFecha_registro() {
            return $this->fecha_registro;
        }

        public function getRol() {
            return $this->rol;
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setNombre($nombre): void {
            $this->nombre = $nombre;
        }

        public function setContraseña($contraseña): void {
            $this->contraseña = $contraseña;
        }

        public function setFecha_registro($fecha_registro): void {
            $this->fecha_registro = $fecha_registro;
        }

        public function setRol($rol): void {
            $this->rol = $rol;
        }



    }

