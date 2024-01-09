<?php

    // Incluye los archivos de modelo, vista y controlador
    include 'models/TareasModel.php';
    include 'views/TareasViews.php';
    include 'controllers/TareasControllers.php';
    
    // Crea una instancia del controlador de tareas
    $tareasController = new TareasController();
    $tareasController1 = new TareasController();
    
    // Ejecuta la acción de listar hoteles
    $tareasController->listarHoteles();
    
    // Ejecuta la acción de listar habitaciones
    $tareasController1->listarHabitaciones();
?>