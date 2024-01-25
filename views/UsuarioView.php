<?php

    //solo html

    class UsuarioView{
        public function mostrarFormulario() {
?>
    
            <div class="container">
                <div class="container__form">
                    <section class="section__form">
                        <img class="img__form" src="./assets/images/hotel.jpeg" alt=""/>
                    </section>
                    <section class="section__form section__form--center">
                        <form class="form" action="index.php?controller=Usuario&action=comprobarUser" method="POST">
                        <div class="container__input">
                            <label class="form__label">Usuario</label>
                            <input class="form__input" type="text" name="username">
                        </div>
                        <div class="container__input">
                            <label class="form__label">Contraseña</label>
                            <input class="form__input" type="password" name="password"><br><br>
                        </div>
                        <div class="container__input">
                            <?php
                                if(isset($_GET['action'])){
                                    if($_GET['action'] === 'comprobarUser'){
                                        echo "<p class='register__error'>Error: usuario o contraseña incorrecta</p>";
                                    }
                                }

                            ?>
                        </div>    
                        <button class="form__button" type="submit">Iniciar Sesión</button>
                    </form>
                       
                    </section>
                </div>
            </div>
            

<?php
            
        }
    }
?>