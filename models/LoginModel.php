<?php

    //solo base de datos
    include 'db/DB.php';

    class LoginModel{
        
        private $bd;
        private $pdo;

        public function __construct() {
            $this->bd = new DB();
            $this->pdo = $this->bd->getPDO();
        }
        
        
        public function comprobarLogin($username, $password) {
            $consulta = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre=:nombre AND contraseña=:password');
            $consulta->execute(array('nombre' => $username, 'password' => $password));
            if ($consulta->rowCount() > 0) {
                session_start();
                foreach ($consulta as $user) {
                    $usuario = new Usuario($user['id'], $user['nombre'], $user['contraseña'], $user['fecha_registro'], $user['rol']);
                }
                
                $name = $usuario->getNombre();
                $hashed__password = $usuario->getContraseña();
                $rol = $usuario->getRol();
                
                $_SESSION['nombre'] = $usuario->getNombre();
                $_SESSION['rol'] = $usuario->getRol();
                
                //Crea la cookie para almacenar el nombre del usuario que expira en 20 dias
                setcookie("guardarNombre", $name, time() + 20 * 24 * 60 * 60);

                //echo "bien hecho";
                //header("Location: index.php?controller=Hotel&action=mostrarHoteles");
                return true;
            } else {
                //header("Location: index.php?controller=Login&action=comprobarUser");
                return false;
            }
        }
        
    }