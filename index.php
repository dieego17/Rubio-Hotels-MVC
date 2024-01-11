<?php

    // Incluye los archivos de modelo, vista y controlador
    include 'models/LoginModel.php';
    include 'views/LoginViews.php';
    include 'controllers/LoginControllers.php';
    
    // Crea una instancia del controlador de tareas
    $tareasController = new TareasController();

    // Ejecuta la acción de listar tareas
    $tareasController->mostrar();
    
?>