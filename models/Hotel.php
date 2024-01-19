<?php

    class Hotel{
        private $id;
        private $nombre;
        private $direccion;
        private $ciudad;
        private $pais;
        private $num_habitaciones;
        private $descripcion;
        private $foto;
        
        public function __construct($id, $nombre, $direccion, $ciudad, $pais, $num_habitaciones, $descripcion, $foto) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->ciudad = $ciudad;
            $this->pais = $pais;
            $this->num_habitaciones = $num_habitaciones;
            $this->descripcion = $descripcion;
            $this->foto = $foto;
        }
        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function getCiudad() {
            return $this->ciudad;
        }

        public function getPais() {
            return $this->pais;
        }

        public function getNum_habitaciones() {
            return $this->num_habitaciones;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setNombre($nombre): void {
            $this->nombre = $nombre;
        }

        public function setDireccion($direccion): void {
            $this->direccion = $direccion;
        }

        public function setCiudad($ciudad): void {
            $this->ciudad = $ciudad;
        }

        public function setPais($pais): void {
            $this->pais = $pais;
        }

        public function setNum_habitaciones($num_habitaciones): void {
            $this->num_habitaciones = $num_habitaciones;
        }

        public function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }

        public function setFoto($foto): void {
            $this->foto = $foto;
        }

    }

