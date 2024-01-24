<?php

    class HotelView{
        public function mostrarHoteles($nuevosHoteles) {               
?>
                <div class="container__hoteles">
                    <main class="container__main">
                        <section class="section__title">
                            <h2 class="h2__titulo">NUESTROS HOTELES</h2>
                            <a class="link__sesion" href="index.php?controller=Usuario&action=cerrarSesion">CERRAR SESIÓN</a>
                        </section>
                        <section class="section__hotel">
                            <table class="table__hoteles">
                                <?php
                                    foreach ($nuevosHoteles as $hotel) {
                                        echo '<thead class="thead__hoteles">';
                                            echo '<th class="th__hotel">FOTO</th>';
                                            echo '<th class="th__hotel">NOMBRE</th>';
                                            echo '<th class="th__hotel">DIRECCIÓN</th>';
                                            echo '<th class="th__hotel">CIUDAD</th>';
                                            echo '<th class="th__hotel">PAÍS</th>';
                                            echo '<th class="th__hotel">NUM HABITACIONES</th>';
                                            echo '<th class="th__hotel">DESCRIPCIÓN</th>';
                                            echo '<th class="th__hotel"></th>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                            echo '<tr>';
                                              
                                                echo '<td class="td__hotel"><img class="imagen__hotel" src = "data:image/jpeg;base64,'. base64_encode($hotel->getFoto()) .'"></td>';
                                                echo '<td class="td__hotel">'.$hotel->getNombre().'</td>';
                                                echo '<td class="td__hotel">'.$hotel->getDireccion().'</td>';
                                                echo '<td class="td__hotel">'.$hotel->getCiudad().'</td>';
                                                echo '<td class="td__hotel">'.$hotel->getPais().'</td>';
                                                echo '<td class="td__hotel">'.$hotel->getNum_habitaciones().'</td>';
                                                echo '<td class="td__hotel">'.$hotel->getDescripcion().'</td>';
                                                echo '<form action="index.php?controller=Habitacion&action=detallesHabitacion" method="POST">';
                                                    echo '<td class="td__hotel"><input type="hidden" name="id" value="'.$hotel->getId().'"></td>';
                                                    echo '<td class="td__hotel td__link"><button class="form__button form__button--input" type="submit">Ver detalles</button></td>';
                                                echo '</form>';
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



