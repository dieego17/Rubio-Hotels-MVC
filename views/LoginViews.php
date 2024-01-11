<?php

    class TareasView{
        // Muestra la lista de tareas
        public function mostrarLogin($username, $password) {
?>

    <form class="formulario" action="" method="POST">
        <label class="form__label">Usuario</label>
        <input class="form__input" type="text" name="username">
        <label class="form__label">Contraseña</label>
        <input class="form__input" type="password" name="password">
        <button>Iniciar Sesión</button>
    </form>
<?php
        }
    }
?>