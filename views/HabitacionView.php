<?php

    class HabitacionView{
        
        public function mostrarHabitacion($nuevasHabitaciones) {
            
            foreach ($nuevasHabitaciones as $habitacion) {
                echo $habitacion->getDescripcion();
            }
            
        }
    }
