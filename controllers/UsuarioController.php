<?php
    //solo php se comunica entre modelo y view

    // Incluye el archivo TareasView.php
    //include_once 'views/TareasView.php';

    class UsuarioController {
        // Obtiene una instancia del modelo y de la vista de tareas
        private $model;
        private $view;

        public function __construct() {
            $this->model = new UsuarioModel();
            $this->view = new UsuarioView();
        }

        //funcion para mostrar el login creado
        public function mostrarLogin() {
            // Muestra la vista del formulario
            $this->view->mostrarFormulario();
        }
        
        //funcion que sirve para comprobar los datos enviados
        public function comprobarUser() {
            session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }
            
            //recupero los datos del login
            $username = $_POST['username'];
            $pass = $_POST['password'];
            
            if($username != "" && $pass != ""){
                $password = hash("sha256", $pass);
            
                //comprueba el inicio de sesion con el usuario y contraseña proporcionado por parte del usuario
                $usuarioNuevo = $this->model->comprobarLogin($username, $password);
                if($usuarioNuevo){
                    $ultima_visita = date("d/m/Y | H:i:s");
                    //Creamos la cookie par almacenar la fecha de la ultima visita del usuario que expira en 20 dias
                    setcookie("ultimaVez", $ultima_visita, time() + 20 * 24 * 60 * 60);
                    
                    //header("Location: index.php?controller=Hotel&action=mostrarHoteles");
                    
                }else{
                    $this->view->mostrarFormulario();
                }
            }else{
                $this->view->mostrarFormulario();
            }
        }
        
        //funcion para poder cerrar sesion
        public function cerrarSesion() {
            session_start();
            
            $_SESSION = array();
            session_destroy();
            setcookie('ultimaVez', '', time() - 1);
            setcookie('guardarNombre', '', time() - 1);
            
            header('Location: ./index.php');
            
        }
    }



    








