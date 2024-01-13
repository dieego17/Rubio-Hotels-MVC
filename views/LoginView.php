<?php

    //solo html

    class LoginView{
        public function mostrarFormulario() {
?>

            <form action="index.php?controller=Login&action=comprobarLogin" method="POST">
                <label>Usuario</label>
                <input type="text" name="username"> <br><br>
                <label>Contraseña</label>
                <input type="password" name="password"><br><br>
                <button type="submit">Iniciar Sesión</button>
            </form>

<?php
            
        }
    }
?>