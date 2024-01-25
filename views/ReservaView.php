<?php

class ReservaView{
    
    public function mostrarReservas($nuevasReservas) {
        // solo visible por el admin
        if ($_SESSION['rol'] == 1) {
?>
            <div class="container__hoteles">
                <main class="container__main">
                    <section class="section__title">
                        <h2 class="h2__titulo">RESERVAS REALIZADAS POR LOS CLIENTES</h2>
                        <div class="div__button div__button--reserva">
                            <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                            <form action="index.php?controller=Habitacion&action=detallesHabitacion" method="POST">
                                <input type="hidden" name="id" value="<?php echo $nuevasReservas[0]->getId_hotel(); ?>">
                                <button class="form__button form__reserva--detalle form__button--input" type="submit">VOLVER</button>
                            </form>
                        </div>
                    </section>
                    <section class="section__hotel section__habitacion">
                        <table class="table__hoteles table__habitaciones">
                            <?php 
                                echo '<thead class="thead__hoteles">';
                                echo '<th class="th__hotel th__habitacion">ID DE RESERVA</th>';
                                echo '<th class="th__hotel th__habitacion">USUARIO</th>';
                                echo '<th class="th__hotel th__habitacion">HOTEL</th>';
                                echo '<th class="th__hotel th__habitacion">HABITACIÓN</th>';
                                echo '<th class="th__hotel th__habitacion">FECHA ENTRADA</th>';
                                echo '<th class="th__hotel th__habitacion">FECHA SALIDA</th>';
                                echo '<th class="th__hotel th__habitacion"></th>';
                                echo '</thead>';
                                echo '<tbody>';

                                foreach ($nuevasReservas as $reserva) {
                                    echo '<tr>';
                                    echo '<td class="td__hotel">'.$reserva->getId().'</td>';
                                    echo '<td class="td__hotel">'.$reserva->getId_usuario().'</td>';
                                    echo '<td class="td__hotel">'.$reserva->getId_hotel().'</td>';
                                    echo '<td class="td__hotel">'.$reserva->getId_habitacion().'</td>';
                                    echo '<td class="td__hotel">'.$reserva->getFecha_entrada().'</td>';
                                    echo '<td class="td__hotel">'.$reserva->getFecha_salida().'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
<?php
        }
    }
}
?>
