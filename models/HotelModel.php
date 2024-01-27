<?php

    class HotelModel
    {
        private $bd;
        private $pdo;

        public function __construct()
        {
            try {
                $this->bd = new DB();
                $this->pdo = $this->bd->getPDO();
            } catch (Exception $e) {
                echo "Error initializing HotelModel: " . $e->getMessage();
            }
        }

        public function detallesHoteles()
        {
            try {
                $hoteles = $this->pdo->prepare('SELECT * FROM hoteles');
                $hoteles->execute();
                return $hoteles->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Error getting hotel details: " . $e->getMessage();
            }
        }
    }
?>

