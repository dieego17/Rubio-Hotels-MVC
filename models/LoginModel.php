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
            $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre=:nombre AND contraseña=:password');
            $stmt->execute(array('nombre' => $username, 'password' => $password));
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
        
    }