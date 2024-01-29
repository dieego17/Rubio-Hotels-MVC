<?php
    // Definición de la clase UsuarioView
    class UsuarioView{
        /**
         * Método para mostrar el formulario de inicio de sesión.
         */
        public function mostrarFormulario() {
?>
            <!-- Inicio del contenedor principal -->
            <div class="container">
                <!-- Sección para el formulario de inicio de sesión -->
                <div class="container__form row">
                    <!-- Sección para la imagen -->
                    <div class="section__form col-md-6">
                        <img class="img__form" src="./assets/images/hotel.jpeg" alt="">
                    </div>
                    <!-- Sección para el formulario de inicio de sesión -->
                    <div class="section__form section__form--center col-md-6">
                        <!-- Formulario con acción y método especificados -->
                        <form class="form" action="index.php?controller=Usuario&action=comprobarUser" method="POST">
                            <!-- Contenedor para el campo de usuario -->
                            <div class="container__input">
                                <label class="form__label">Usuario</label>
                                <input class="form__input" type="text" name="username" required>
                            </div>
                            <!-- Contenedor para el campo de contraseña -->
                            <div class="container__input">
                                <label class="form__label">Contraseña</label>
                                <input class="form__input" type="password" name="password" required><br><br>
                            </div>
                            <!-- Contenedor para mensajes de error -->
                            <div class="container__input">
                                <?php
                                    // Verificar si hay un error y mostrar mensaje correspondiente
                                    if(isset($_GET['error'])){
                                        echo "<p class='register__error'>Error: usuario o contraseña incorrecta</p>";
                                    }
                                ?>
                            </div>
                            <!-- Botón para enviar el formulario -->
                            <button class="form__button login__button" type="submit">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
<?php
        }
    }
?>
