<?php

    class HotelView{
        public function mostrarHoteles($nuevosHoteles) {
            
            foreach ($nuevosHoteles as $hotel) {
                
?>
                <div class="container__hoteles">
                    <table>
                        <thead>
                            <th class="hotel__texto">FOTO</th>
                            <th class="hotel__texto">NOMBRE</th>
                            <th class="hotel__texto">DIRECCIÓN</th>
                            <th class="hotel__texto">CIUDAD</th>
                            <th class="hotel__texto">PAÍS</th>
                            <th class="hotel__texto">NUM HABITACIONES</th>
                            <th class="hotel__texto">DESCRIPCIÓN</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="hotel__texto"><?php echo $hotel->getFoto();?></td>
                                <td class="hotel__texto"><?php echo $hotel->getNombre();?></td>
                                <td class="hotel__texto"><?php echo $hotel->getDireccion();?></td>
                                <td class="hotel__texto"><?php echo $hotel->getCiudad();?></td>
                                <td class="hotel__texto"><?php echo $hotel->getPais();?></td>
                                <td class="hotel__texto"><?php echo $hotel->getNum_habitaciones();?></td>
                                <td class="hotel__texto"><?php echo $hotel->getDescripcion();?></td>
                                <td class="hotel__texto"><a><a href="url" target="target">Ver detalles</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--<section class="section__hotel">
                        <p class="hotel__texto"><?php echo $hotel->getNombre();?></p>
                        <p class="hotel__texto"><?php echo $hotel->getDireccion();?></p>
                        <p class="hotel__texto"><?php echo $hotel->getCiudad();?></p>
                        <p class="hotel__texto"><?php echo $hotel->getPais();?></p>
                        <p class="hotel__texto"><?php echo $hotel->getNum_habitaciones();?></p>
                        <p class="hotel__texto"><?php echo $hotel->getDescripcion();?></p>
                        <p class="hotel__texto"><?php echo $hotel->getFoto();?></p>
                    </section>-->
                </div>
                
<?php
            }
        }
    }
?>

