<?php

    class ReservaView{
        
        public function mostrarReservas($nuevasReservas) {
            //solo visible por el admin
            if($_SESSION['rol'] == 1){
?>
                <div class="container__hoteles">
                    <main class="container__main">
                        <section class="section__title">
                            <h2 class="h2__titulo">RESERVAS REALIZADAS POR LOS CLIENTES</h2>
                            <div class="div__button">
                                <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                                <a class="link__sesion" href="index.php?controller=Hotel&action=mostrarHoteles">VOLVER A HOTELES</a>
                            </div>
                        </section>
                        <section class="section__hotel section__habitacion">
                            <table class="table__hoteles table__habitaciones">
                                <?php 

                                    foreach ($nuevasReservas as $reserva) {
                                        
                                            echo '<thead class="thead__hoteles">';
                                            echo '<th class="th__hotel th__habitacion">ID DE RESERVA</th>';
                                            echo '<th class="th__hotel th__habitacion">ID USUARIO</th>';
                                            echo '<th class="th__hotel th__habitacion">ID HOTEL</th>';
                                            echo '<th class="th__hotel th__habitacion">ID HABITACIÓN</th>';
                                            echo '<th class="th__hotel th__habitacion">FECHA ENTRADA</th>';
                                            echo '<th class="th__hotel th__habitacion">FECHA SALIDA</th>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                            echo '<tr>';
                                                echo '<td class="td__hotel">'.$reserva->getId().'</td>';
                                                echo '<td class="td__hotel">'.$reserva->getId_usuario().'</td>';
                                                echo '<td class="td__hotel">'.$reserva->getId_hotel().'</td>';
                                                echo '<td class="td__hotel">'.$reserva->getId_habitacion().'</td>';
                                                echo '<td class="td__hotel">'.$reserva->getFecha_entrada().'</td>';
                                                echo '<td class="td__hotel">'.$reserva->getFecha_salida().'</td>';
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
    }
?>

