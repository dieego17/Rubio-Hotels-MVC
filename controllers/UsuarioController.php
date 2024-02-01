<?php

    class UsuarioController {
        // Obtiene una instancia del modelo y de la vista de tareas
        private $model;
        private $view;

        /**
         * Constructor de la clase UsuarioController.
         * Inicializa las instancias del modelo (UsuarioModel) y la vista (UsuarioView).
         */
        public function __construct() {
            $this->model = new UsuarioModel();
            $this->view = new UsuarioView();
        }

        /**
         * Función para mostrar el formulario de inicio de sesión.
         * Muestra la vista del formulario.
         */
        public function mostrarLogin() {
            // Muestra la vista del formulario
            $this->view->mostrarFormulario();
        }

        /**
         * Función para comprobar los datos de inicio de sesión.
         * Recupera los datos del formulario, realiza la comprobación y gestiona el inicio de sesión.
         */
        public function comprobarUser() {
            //session_start();
            if(!$_SESSION['nombre']){
                header('Location: ./index.php');
            }

            // Recupera los datos del formulario
            $username = $_POST['username'];
            $pass = $_POST['password'];

            if ($username != "" && $pass != "") {
                $password = hash("sha256", $pass);

                // Comprueba el inicio de sesión con el usuario y contraseña proporcionados por el usuario
                $usuarioNuevo = $this->model->comprobarLogin($username, $password);
                if ($usuarioNuevo) {
                    $ultima_visita = date("d/m/Y | H:i:s");
                    // Crea la cookie para almacenar la fecha de la última visita del usuario que expira en 20 días
                    setcookie("ultimaVez", $ultima_visita, time() + 20 * 24 * 60 * 60);

                    //header("Location: index.php?controller=Hotel&action=mostrarHoteles");
                } else {
                    header("Location: ./index.php?error");
                }
            } else {
                header("Location: ./index.php?error");
            }
        }

        /**
         * Función para cerrar la sesión del usuario.
         * Cierra la sesión actual, destruye las variables de sesión y elimina las cookies relacionadas.
         */
        public function cerrarSesion() {
            session_start();

            $_SESSION = array();
            session_destroy();
            setcookie('ultimaVez', '', time() - 1);
            setcookie('guardarNombre', '', time() - 1);

            header('Location: ./index.php');
        }
    }

?>
