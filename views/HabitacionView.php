<?php

    // Definición de la clase HabitacionView
    class HabitacionView {

        /**
         * Método para mostrar las habitaciones
         * @param array $nuevasHabitaciones - Array de objetos Habitacion
         */
        public function mostrarHabitacion($nuevasHabitaciones) {
?>
            <!-- Contenedor principal de la vista -->
            <div class="container__hoteles">
                <main class="container__main">
                    <div class="section__title">
                        <!-- Título de las habitaciones disponibles -->
                        <h2 class="h2__titulo">HABITACIONES DISPONIBLES EN HOTEL <?php echo $nuevasHabitaciones[0]->getId_hotel() ?></h2>

                        <!-- Sección de botones y enlaces -->
                        <div class="div__button div__button--reserva">
                            <!-- Enlace para cerrar sesión -->
                            <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>

                            <?php
                                // Verificación del rol del usuario para mostrar opciones adicionales
                                if($_SESSION['rol'] == 1){
                                    // Formulario para ver las reservas (visible para el rol 1 - administrador)
                                    echo '<form action="index.php?controller=Reserva&action=detallesReservas" method="POST">';
                                        echo '<input type="hidden" name="id_hotel" value="'.$nuevasHabitaciones[0]->getId_hotel(). '">';
                                        echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VER RESERVAS</button>';
                                    echo '</form>';
                                } else if($_SESSION['rol'] == 0){
                                    // Formulario para ver las reservas del usuario (visible para el rol 0 - cliente)
                                    echo '<form action="index.php?controller=Reserva&action=usuarioReservas" method="POST">';
                                        echo '<input type="hidden" name="id_hotel" value="'.$nuevasHabitaciones[0]->getId_hotel().'">';
                                        echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VER MIS RESERVAS</button>';
                                    echo '</form>';
                                }
                            ?>

                            <!-- Enlace para volver a la lista de hoteles -->
                            <a class="link__sesion" href="index.php?controller=Hotel&action=mostrarHoteles">VOLVER</a>
                        </div>
                    </div>

                    <!-- Sección de visualización de habitaciones -->
                    <div class="section__hotel section__habitacion row">
                        <!-- Tabla que muestra las habitaciones -->
                        <table class="table__hoteles table__habitaciones col-12">
                            <?php 
                                // Obtención de la fecha actual
                                $fechaActual = date("Y-m-d");

                                // Cabecera de la tabla
                                echo '<thead class="thead__hoteles">';
                                    echo '<tr>';
                                        echo '<th class="th__hotel th__habitacion">NÚMERO DE HABITACIÓN</th>';
                                        echo '<th class="th__hotel th__habitacion">TIPO</th>';
                                        echo '<th class="th__hotel th__habitacion">PRECIO</th>';
                                        echo '<th class="th__hotel th__habitacion">DESCRIPCIÓN</th>';

                                        // Columnas adicionales visibles para el usuario (rol 0 - cliente)
                                        if($_SESSION['rol'] == 0){
                                            echo '<th class="th__hotel th__habitacion">RESERVAR HABITACIÓN</th>';
                                        }
                                    echo '</tr>';
                                echo '</thead>';

                                // Bucle para mostrar cada habitación
                                foreach ($nuevasHabitaciones as $habitacion) {
                                    echo '<tbody>';
                                        echo '<tr>';
                                            echo '<td class="td__hotel">'.$habitacion->getNum_habitacion().'</td>';
                                            echo '<td class="td__hotel">'.$habitacion->getTipo().'</td>';
                                            echo '<td class="td__hotel">'.$habitacion->getPrecio().'€</td>';
                                            echo '<td class="td__hotel">'.$habitacion->getDescripcion().'</td>';

                                            // Columnas adicionales visibles para el usuario (rol 0 - cliente)
                                            if($_SESSION['rol'] == 0){
                                                echo '<td class="td__hotel">';
                                                    echo '<form class="form__reserva" action="index.php?controller=Reserva&action=comprobarReserva" method="POST">';
                                                        echo '<div class="div__input">';
                                                            echo '<label class="label__form">Fecha de Entrada:</label>';
                                                            echo '<input type="hidden" name="id_hotel" value="'.$habitacion->getId_hotel().'">';
                                                            echo '<input type="hidden" name="id_habitacion" value="'.$habitacion->getId().'">';
                                                            echo '<input class="input__date" min="'.$fechaActual.'" type="date" name="fecha_entrada" required>';
                                                        echo '</div>';

                                                        echo '<div class="div__input">';
                                                            echo '<label class="label__form">Fecha de Salida:</label>';
                                                            echo '<input type="hidden" name="id_hotel" value="'.$habitacion->getId_hotel().'">';
                                                            echo '<input type="hidden" name="id_habitacion" value="'.$habitacion->getId().'">';
                                                            echo '<input class="input__date" min="'.$fechaActual.'" type="date" name="fecha_salida" required>';
                                                        echo '</div>';

                                                        echo '<button class="form__button form__reserva--detalle form__button--input button__reserva" type="submit">RESERVAR</button>';
                                                    echo '</form>';
                                                echo '</td>';
                                            } 
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
