<?php

    class HabitacionView{
        
        public function mostrarHabitacion($nuevasHabitaciones) {
?>
                <div class="container__hoteles">
                    <main class="container__main">
                        <section class="section__title">
                            <h2 class="h2__titulo">HABITACIONES DISPONIBLES</h2>
                            <div class="div__button">
                                <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                                <a class="link__sesion" href="index.php?controller=Hotel&action=mostrarHoteles">VOLVER</a>
                            </div>
                        </section>
                        <section class="section__hotel">
                            <table class="table__hoteles">
                                <?php
                                    foreach ($nuevasHabitaciones as $habitacion) {
                                        echo '<thead class="thead__hoteles">';
                                            echo '<th class="th__hotel">NÚMERO DE HABITACIÓN</th>';
                                            echo '<th class="th__hotel">TIPO</th>';
                                            echo '<th class="th__hotel">PRECIO</th>';
                                            echo '<th class="th__hotel">DESCRIPCIÓN</th>';
                                            echo '<th class="th__hotel"></th>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                            echo '<tr>';
                                                echo '<td class="td__hotel">'.$habitacion->getNum_habitaciones().'</td>';
                                                echo '<td class="td__hotel">'.$habitacion->getTipo().'</td>';
                                                echo '<td class="td__hotel">'.$habitacion->getPrecio().'</td>';
                                                echo '<td class="td__hotel">'.$habitacion->getDescripcion().'</td>';
                                            echo '</tr>';
                                        echo '</tbody>';
                                    }
                                ?>
                            </table>
                        </section>
                    </main>
                </div>
<?php
        }
    }
?>
