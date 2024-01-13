<?php
    //solo php

    // Incluye el archivo TareasView.php
    //include_once 'views/TareasView.php';

    class LoginController {
        // Obtiene una instancia del modelo y de la vista de tareas
        private $model;
        private $view;

        public function __construct() {
            $this->model = new LoginModel();
            $this->view = new LoginView();
        }

        public function mostrarLogin() {
            // Muestra la vista del formulario
            $this->view->mostrarFormulario();
        }
    }



    








