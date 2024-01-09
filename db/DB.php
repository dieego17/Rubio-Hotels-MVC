<?php

    class DB{
        private $pdo;
        
        public function __construct() {
            require_once 'config/Config.php';
            try{
                //Creamos una instancia de PDO para conectarme a la base de datos
                $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pwd);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        
        public function getPDO() {
            return $this->pdo;
        }

    }
?>

