<?php

    class TareasController {
        // Obtiene una instancia del modelo y de la vista de tareas
        private $model;
        private $view;

        public function __construct() {
            $this->model = new TareasModel();
            $this->view = new TareasView();
        }

        // Muestra la lista de tareas
        public function mostrar() {
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);

                //comprobamos que los campos username y password no esten vacios
                if ($username != "" && $password != "") {
                    // Recupera la lista de tareas del modelo
                    $tareas = $this->model->consultarLogin($username, $password);

                    // Muestra la vista de la lista de tareas
                    $this->view->mostrarLogin($username, $password);
                }else{

                }
            } 
        }
    }
?>