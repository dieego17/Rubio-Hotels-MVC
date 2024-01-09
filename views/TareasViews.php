<?php

    class TareasView{
        public function mostrarHoteles($hoteles) {
            echo '<table>';
            echo '<tr>';
                echo '<th>NOMBRE</th>';
                echo '<th>DIRECCIÓN</th>';
                echo '<th>CIUDAD</th>';
                echo '<th>PAÍS</th>';
                echo '<th>HABITACIONES</th>';
                echo '<th>DESCRIPCIÓN</th>';
            echo '</tr>';
            foreach ($hoteles as $hotel) {
                echo '<tr>';
                    echo '<td>' . $hotel['nombre'] . '</td>';
                    echo '<td>' . $hotel['direccion'] . '</td>';
                    echo '<td>' . $hotel['ciudad'] . '</td>';
                    echo '<td>' . $hotel['pais'] . '</td>';
                    echo '<td>' . $hotel['num_habitaciones'] . '</td>';
                    echo '<td>' . $hotel['descripcion'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        
        public function mostrarHabitaciones($habitaciones) {
            echo '<table>';
            echo '<tr>';
                echo '<th>NÚMERO</th>';
                echo '<th>TIPO</th>';
                echo '<th>PRECIO</th>';
                echo '<th>DESCRIPCIÓN</th>';
            echo '</tr>';
            foreach ($habitaciones as $habitacion) {
                echo '<tr>';
                    echo '<td>' . $habitacion['num_habitacion'] . '</td>';
                    echo '<td>' . $habitacion['tipo'] . '€</td>';
                    echo '<td>' . $habitacion['precio'] . '</td>';
                    echo '<td>' . $habitacion['descripcion'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }
?>