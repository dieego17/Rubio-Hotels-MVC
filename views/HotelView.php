<?php

    // Definición de la clase HotelView
    class HotelView {

        /**
         * Método para mostrar la lista de hoteles
         * @param array $nuevosHoteles - Array de objetos Hotel
         */
        public function mostrarHoteles($nuevosHoteles) {
?>
            <!-- Contenedor principal de la vista -->
            <div class="container__hoteles">
                <main class="container__main">
                    <div class="section__title">
                        <!-- Título de la sección de hoteles -->
                        <h2 class="h2__titulo">NUESTROS HOTELES</h2>

                        <!-- Enlace para cerrar sesión -->
                        <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                    </div>

                    <!-- Sección de visualización de hoteles -->
                    <div class="section__hotel row">
                        <!-- Tabla que muestra los hoteles -->
                        <table class="table__hoteles col-12">
                            <?php
                                // Cabecera de la tabla
                                echo '<thead class="thead__hoteles">';
                                    echo '<tr>';
                                        echo '<th class="th__hotel">FOTO</th>';
                                        echo '<th class="th__hotel">NOMBRE</th>';
                                        echo '<th class="th__hotel">DIRECCIÓN</th>';
                                        echo '<th class="th__hotel">CIUDAD</th>';
                                        echo '<th class="th__hotel">PAÍS</th>';
                                        echo '<th class="th__hotel">NUM HABITACIONES</th>';
                                        echo '<th class="th__hotel">DESCRIPCIÓN</th>';
                                        echo '<th class="th__hotel"></th>';

                                    echo '</tr>';
                                echo '</thead>';

                                // Bucle para mostrar cada hotel
                                foreach ($nuevosHoteles as $hotel) {
                                    echo '<tbody>';
                                        echo '<tr>';
                                            echo '<td class="td__hotel"><img class="imagen__hotel" alt="" src="data:image/jpeg;base64,'. base64_encode($hotel->getFoto()) .'"></td>';
                                            echo '<td class="td__hotel">'.$hotel->getNombre().'</td>';
                                            echo '<td class="td__hotel">'.$hotel->getDireccion().'</td>';
                                            echo '<td class="td__hotel">'.$hotel->getCiudad().'</td>';
                                            echo '<td class="td__hotel">'.$hotel->getPais().'</td>';
                                            echo '<td class="td__hotel">'.$hotel->getNum_habitaciones().'</td>';
                                            echo '<td class="td__hotel">'.$hotel->getDescripcion().'</td>';
                                            echo '<td class="td__hotel">';
                                                // Formulario para ver detalles de la habitación
                                                echo '<form action="index.php?controller=Habitacion&action=detallesHabitacion" method="POST">';
                                                    echo '<input type="hidden" name="id" value="'.$hotel->getId().'">';
                                                    echo '<button class="form__button--input" type="submit">VER DETALLES</button>';
                                                echo '</form>';
                                            echo '</td>';
                                        echo '</tr>';
                                    echo '</tbody>';
                                }
                            ?>
                        </table>
                    </div>
                </main>
            </div>
<?php
        }
    }

?>



