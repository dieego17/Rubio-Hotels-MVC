<?php

    // Clase que contiene la vista de inicio de sesión
    class LoginView {

        /**
         * Método para mostrar el formulario de inicio de sesión
         */
        public function mostrarFormulario() {
?>
            <!-- Contenedor principal del formulario de inicio de sesión -->
            <div class="container">
                <div class="container__form">
                    <!-- Sección para mostrar una imagen relacionada con el formulario -->
                    <section class="section__form">
                        <img class="img__form" src="./assets/images/hotel.jpeg" alt=""/>
                    </section>
                    
                    <!-- Sección central del formulario de inicio de sesión -->
                    <section class="section__form section__form--center">
                        <!-- Formulario de inicio de sesión con acción hacia el controlador correspondiente -->
                        <form class="form" action="index.php?controller=Login&action=comprobarUser" method="POST">
                            <!-- Campo para ingresar el nombre de usuario -->
                            <div class="container__input">
                                <label class="form__label">Usuario</label>
                                <input class="form__input" type="text" name="username">
                            </div>
                            
                            <!-- Campo para ingresar la contraseña -->
                            <div class="container__input">
                                <label class="form__label">Contraseña</label>
                                <input class="form__input" type="password" name="password"><br><br>
                            </div>
                            
                            <!-- Sección para mostrar mensajes de error, si los hay -->
                            <div class="container__input">
                                <?php
                                    if(isset($_GET['action'])){
                                        if($_GET['action'] === 'comprobarUser'){
                                            echo "<p class='register__error'>Error: usuario o contraseña incorrecta</p>";
                                        }
                                    }
                                ?>
                            </div>
                            
                            <!-- Botón para enviar el formulario de inicio de sesión -->
                            <button class="form__button" type="submit">Iniciar Sesión</button>
                        </form>
                    </section>
                </div>
            </div>
<?php
        }
    }
?>
