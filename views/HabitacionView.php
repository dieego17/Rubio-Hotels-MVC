<?php

    class HabitacionView{
        
        public function mostrarHabitacion($nuevasHabitaciones) {
?>
                <div class="container__hoteles">
                    <main class="container__main">
                        <section class="section__title">
                            <h2 class="h2__titulo">HABITACIONES DISPONIBLES</h2>
                            <div class="div__button div__button--reserva">
                                <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                                <?php
                                    if($_SESSION['rol'] == 1){
                                        echo '<form action="index.php?controller=Reserva&action=detallesReservas" method="POST">';
                                            echo '<input type="hidden" name="id_hotel" value="'.$nuevasHabitaciones[0]->getId_hotel(). '">';
                                            echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VER RESERVAS</button>';
                                        echo '</form>';
                                    }else if($_SESSION['rol'] == 0){
                                        echo '<form action="index.php?controller=Reserva&action=usuarioReservas" method="POST">';
                                            echo '<input type="hidden" name="id_hotel" value="'.$nuevasHabitaciones[0]->getId_hotel().'">';
                                            echo '<button class="form__button form__reserva--detalle form__button--input" type="submit">VER MIS RESERVAS</button>';
                                        echo '</form>';
                                    }
                                    
                                ?>
                                <a class="link__sesion" href="index.php?controller=Hotel&action=mostrarHoteles">VOLVER</a>
                            </div>
                        </section>
                        <section class="section__hotel section__habitacion row">
                            <table class="table__hoteles table__habitaciones col-12">
                                <?php 
                                    $fechaActual = date("Y-m-d");
                                    
                                    echo '<thead class="thead__hoteles">';
                                        echo '<th class="th__hotel th__habitacion">NÚMERO DE HABITACIÓN</th>';
                                        echo '<th class="th__hotel th__habitacion">TIPO</th>';
                                        echo '<th class="th__hotel th__habitacion">PRECIO</th>';
                                        echo '<th class="th__hotel th__habitacion">DESCRIPCIÓN</th>';
                                        //visible para el usuario
                                        if($_SESSION['rol'] == 0){
                                            echo '<th class="th__hotel th__habitacion">RESERVAR HABITACIÓN</th>';
                                            echo '<th class="th__hotel th__habitacion"></th>';
                                        }
                                    echo '</thead>';

                                    foreach ($nuevasHabitaciones as $habitacion) {
                                        echo '<tbody>';
                                            echo '<tr>';
                                                echo '<td class="td__hotel">'.$habitacion->getNum_habitaciones().'</td>';
                                                echo '<td class="td__hotel">'.$habitacion->getTipo().'</td>';
                                                echo '<td class="td__hotel">'.$habitacion->getPrecio().'€</td>';
                                                echo '<td class="td__hotel">'.$habitacion->getDescripcion().'</td>';
                                                //visible para el usuario
                                                if($_SESSION['rol'] == 0){
                                                    echo '<td class="td__hotel">';
                                                        echo '<form class="form__reserva" action="index.php?controller=Reserva&action=comprobarReserva" method="POST">';
                                                            echo '<div class="div__input">';
                                                                echo '<label class="label__form" for="">Fecha de Entrada:</label>';
                                                                echo '<input type="hidden" name="id_hotel" value="'.$habitacion->getId_hotel().'">';
                                                                echo '<input type="hidden" name="id_habitacion" value="'.$habitacion->getId().'">';
                                                                echo '<input class="input__date" min="'.$fechaActual.'" type="date" name="fecha_entrada" id="" required>';
                                                            echo '</div>';
                                                            echo '<div class="div__input">';
                                                                echo '<label class="label__form" for="">Fecha de Salida:</label>';
                                                                echo '<input type="hidden" name="id_hotel" value="'.$habitacion->getId_hotel().'">';
                                                                echo '<input type="hidden" name="id_habitacion" value="'.$habitacion->getId().'">';
                                                                echo '<input class="input__date" min="'.$fechaActual.'" type="date" name="fecha_salida" id="" required>';
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
                        </section>
                    </main>
                </div>
<?php
        }
    }
?>
