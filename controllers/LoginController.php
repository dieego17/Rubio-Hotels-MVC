<?php

    // Incluye el modelo y la vista correspondientes al inicio de sesión
    include_once 'models/LoginModel.php';
    include_once 'views/LoginView.php';

    class LoginController {
        private $model;
        private $view;

        /**
         * Constructor de la clase LoginController.
         * Inicializa las instancias del modelo (LoginModel) y la vista (LoginView).
         */
        public function __construct() {
            $this->model = new LoginModel();
            $this->view = new LoginView();
        }

        /**
         * Función para mostrar el formulario de inicio de sesión.
         * Muestra la vista del formulario.
         */
        public function mostrarLogin() {
            $this->view->mostrarFormulario();
        }

        /**
         * Función para comprobar los datos enviados en el formulario de inicio de sesión.
         * Recupera los datos del formulario y verifica el inicio de sesión con el usuario y contraseña proporcionados.
         * Si la autenticación es exitosa, se establece una cookie para almacenar la fecha de la última visita.
         * En caso de error, se vuelve a mostrar el formulario.
         */
        public function comprobarUser() {
            // Recupera los datos del formulario
            $username = $_POST['username'];
            $pass = $_POST['password'];

            if ($username != "" && $pass != "") {
                // Hash de la contraseña
                $password = hash("sha256", $pass);

                // Comprueba el inicio de sesión con el usuario y contraseña proporcionados
                $usuarioNuevo = $this->model->comprobarLogin($username, $password);

                if ($usuarioNuevo) {
                    // Si la autenticación es exitosa, se establece una cookie para almacenar la fecha de la última visita
                    $ultima_visita = date("d/m/Y | H:i:s");
                    setcookie("ultimaVez", $ultima_visita, time() + 20 * 24 * 60 * 60);
                    // Redirige a la página principal o realiza alguna acción adicional
                    // header("Location: index.php?controller=Hotel&action=mostrarHoteles");
                } else {
                    // En caso de error, vuelve a mostrar el formulario
                    $this->view->mostrarFormulario();
                }
            } else {
                // Si faltan datos en el formulario, vuelve a mostrar el formulario
                $this->view->mostrarFormulario();
            }
        }
    }
?>

