<?php

class HotelModel {
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB();
        $this->pdo = $this->bd->getPDO();
    }

    public function detallesHoteles() {
        try {
            $hoteles = $this->pdo->prepare('SELECT * FROM hoteles');
            $hoteles->execute();
            return $hoteles->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the exception, log it, or rethrow if necessary
            echo "Error para consguir los detalles de los hoteles: " . $e->getMessage();
        }
    }
}
