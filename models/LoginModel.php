<?php

    include 'db/DB.php';

    class TareasModel {
        // Obtiene una instancia de PDO para conectarse a la base de datos
        private $bd;
        private $pdo;

        public function __construct() {
           // $this->pdo = new PDO('mysql:host=localhost;dbname=ejemplo10_tema6', 'root', '');
            $this->bd =new DB();
            $this->pdo = $this->bd->getPDO();
        }

        // Recupera la lista de tareas de la base de datos
        public function consultarLogin($username) {
            try{
                // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
                $stmt = $this->pdo->prepare('SELECT nombre, contraseña FROM usuarios WHERE nombre = ?');
                $stmt->execute([$username]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                echo "<p>Se ha producido un error al hacer la consulta</p>";
            }
            
        }
    }
    
?>

