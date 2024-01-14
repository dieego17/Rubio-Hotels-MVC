<?php
    //solo php se comunica entre modelo y view

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

        //funcion para mostrar el login creado
        public function mostrarLogin() {
            // Muestra la vista del formulario
            $this->view->mostrarFormulario();
        }
        
        //funcion que sirve para comprobar los datos enviados
        public function comprobarUser() {
            
            //recupero los datos del login
            $username = $_POST['username'];
            $pass = $_POST['password'];
            
            $password = hash("sha256", $pass);
            
            //comprueba el inicio de sesion con el usuario y contraseña proporcionado por parte del usuario
            $this->model->comprobarLogin($username, $password);
            
            $ultima_visita = date("d/m/Y | H:i:s");
            //Creamos la cookie par almacenar la fecha de la ultima visita del usuario que expira en 20 dias
            setcookie("ultimaVez", $ultima_visita, time() + 20 * 24 * 60 * 60);
        }
    }



    








